<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Helpers\SiteHelper;
use App\Models\Attachment;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductDetail;
use App\Models\ProductGroup;
use App\Models\ProductTag;
use App\Models\PurchaseDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class ProductController extends Controller
{
    public function all()
    {
        return response()->json([
            'status' => true,
            'data' => Product::latest()->get()
        ]);
    }

    public function search(Request $request)
    {
        $name = $request->name;
        $Products = Product::with('product_group', 'product_tag')->where('main_barcode', 'LIKE', "%{$name}%")
            ->orWhere('item_code', 'LIKE', "%{$name}%")
            ->orWhere('gtin_code', 'LIKE', "%{$name}%")
            ->orWhere('item_description', 'LIKE', "%{$name}%")
            ->limit(10)
            ->get();
        return response()->json([
            'status' => true,
            'data' => $Products
        ]);
    }

    public function searchByCode(Request $request)
    {
        $search_string = $request->search_string;
        $Products = Product::where('main_barcode', 'LIKE', "$search_string")
            ->orWhere('item_code', '=', "$search_string")
            ->orWhere('gtin_code', '=', "$search_string")
            ->orWhere('item_description', '=', "$search_string")
            ->first();
        if (empty($Products)) {
            return response()->json([
                'status' => false,
                'message' => 'No matching product found'
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $Products
        ]);
    }

    public function index(Request $request)
    {
        $Product = Product::with(['product_attributes', 'unit_measure', 'category', 'product_tags', 'details']);
        $searchIndexes = ['unit_measure_id', 'category_id'];
        foreach ($searchIndexes as $searchIndex) {
            if ($request->$searchIndex)
                $Product->where($searchIndex, $request->$searchIndex);
        }
        $this->data['products'] = $Product->latest()->get();
        return view('products.list', $this->data);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        $Product = new Product();
        $Product->fill([
            'name' => $request->product_name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'unit_measure_id' => $request->unit_measure_id,
        ]);
        $Product->save();

        if ($request->attributes) {
            foreach ($request["attributes"] as $attribute) {
                if (!empty($attribute))
                    ProductAttribute::create([
                        'product_id' => $Product->id,
                        'title' => $attribute
                    ]);
            }
        }

        if ($request->product_tags) {
            foreach ($request->product_tags as $product_tag) {
                if (!empty($product_tag)) {
                    ProductTag::create([
                        'product_id' => $Product->id,
                        'tag_id' => $product_tag
                    ]);
                }
            }
        }

        if ($request->quantity) {
            foreach ($request->quantity as $key => $qty) {
                if ($qty) {
                    ProductDetail::create([
                        'product_id' => $Product->id,
                        'unit_price' => $request->price[$key],
                        'quantity' => $qty
                    ]);
                }
            }
        }

        if ($request->product_images) {
            foreach ($request->product_images as $image) {
                $this->storeAttachment($image, $Product->id);
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Record Saved successfully'
        ]);
    }

    private function storeAttachment($file_name, $product_id)
    {
        $file = $file_name;
        $extension = $file->extension();
        $full_filename = $file->getClientOriginalName();
        $filename = pathinfo($full_filename, PATHINFO_FILENAME);
        $fileName = $filename . '_' . uniqid() . '.' . $extension;

        $file->move(public_path() . '/uploads/products', $fileName);

        Attachment::create([
            'name' => $fileName,
            'file_name' => $fileName,
            'type' => '',
            'object' => 'Product',
            'object_id' => $product_id,
            'context' => 'product-image'
        ]);
    }

    public function edit(Request $request)
    {

        $this->data['product'] = Product::with('attachments')->find($request->id);
        return view('products.edit', $this->data);
    }

    public function usingPagination(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get('start');
        $length = $request->get('length');
        $Products = Product::with(['product_attributes', 'unit_measure', 'category', 'product_tags', 'details']);
        $totalRecords = $Products->count();
        $Products = $Products->skip($start)->latest()->take(10)->get();
        return response()->json([
            'status' => true,
            'draw' => $draw,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $Products,
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'description' => 'required'

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        $Product = Product::find($request->id);
        $Product->fill([
            'name' => $request->product_name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'unit_measure_id' => $request->unit_measure_id,
        ]);
        $Product->save();

        if ($request->attributes) {
            ProductAttribute::where('product_id', $Product->id)->delete();
            foreach ($request["attributes"] as $attribute) {
                if (!empty($attribute))
                    ProductAttribute::create([
                        'product_id' => $Product->id,
                        'title' => $attribute
                    ]);
            }
        }

        if ($request->product_tags) {
            ProductTag::where('product_id', $Product->id)->delete();
            foreach ($request->product_tags as $product_tag) {
                if (!empty($product_tag)) {
                    ProductTag::create([
                        'product_id' => $Product->id,
                        'tag_id' => $product_tag
                    ]);
                }
            }
        }

        if ($request->quantity) {
            ProductDetail::where('product_id', $Product->id)->delete();
            foreach ($request->quantity as $key => $qty) {
                if ($qty) {
                    ProductDetail::create([
                        'product_id' => $Product->id,
                        'unit_price' => $request->price[$key],
                        'quantity' => $qty
                    ]);
                }
            }
        }

        if ($request->product_images) {
            foreach ($request->product_images as $image) {
                $this->storeAttachment($image, $Product->id);
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Record saved successfully'
        ]);
    }

    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }
        $Product = Product::find($request->id);
        if (!$Product) {
            return response()->json([
                'status' => false,
                'message' => 'Record not found'
            ]);
        }
        $Product->delete();

        return response()->json([
            'status' => true,
            'message' => 'Record deleted successfully'
        ]);

    }

    public function downloadExcel()
    {

        return Excel::download(new ProductExport, 'Products.xlsx');

    }

    public function downloadCsv()
    {


        $Products = Product::with(['product_type', 'product_origin', 'department', 'category', 'sub_category', 'brand', 'product_tag', 'product_group',
            'manufacturer', 'vendor', 'unit_measure', 'price_source', 'profit_type', 'vat', 'currency', 'drug_direction', 'delivery_period', 'location_type', 'location'])->get();

        $filename = 'Products.csv';
        $fp = fopen($filename, 'w');
        $headerRow = ['ID', 'Item Code', 'Product Group', 'Product', 'Strength', 'Pack Size', 'Product Type', 'notes', 'Product Origin', 'Department', 'Category', 'Sub Category', 'Brand',
            'Manufacturer', 'Vendor', 'Unit Measure', 'Price Source', 'Profit Type', 'Vat', 'Currency', 'Drug Direction',
            'Delivery Period', 'Location', 'Location Type', 'Main Barcode', 'Gtin Code', 'Presentation'
            , 'Product Reg No', 'Active Ingredients', 'Fridge Item Note', 'Avg Net Price', 'Commodity Code'
            , 'Stock Size', 'Misc Item', 'Weight', 'System Record', 'Allow Discount', 'Block Sale', 'Block Order'
            , 'Block Goods In', 'Control Drug', 'Cold Chain', 'Dispense Label', 'Web Order', 'Trade Price', 'Trade Disc'
            , 'Net Price', 'Sell Price', 'Profit Amount', 'Profit Percentage', 'Vat Amount', 'Sell Price Inc Vat', 'Stock In Hand'
            , 'Price Per Psize Type', 'Psize Type', 'Manf Notes', 'Formulation', 'Special Container', 'Ma Holder', 'Case Size'
        ];
        fputcsv($fp, $headerRow);
        $count = 0;
        foreach ($Products as $Product) {
            $count++;
            $productArray = [
                $count,
                SiteHelper::removeSpecialCharacter($Product->item_code),
                SiteHelper::removeSpecialCharacter($Product->product_group ? $Product->product_group->name : ''),
                SiteHelper::removeSpecialCharacter($Product->item_description) . ($Product->product_tag ? (' (' . $Product->product_tag->name . ")") : ''),
                SiteHelper::removeSpecialCharacter($Product->strength),
                SiteHelper::removeSpecialCharacter($Product->pack_size),
                SiteHelper::removeSpecialCharacter($Product->product_type ? $Product->product_type->name : ''),
                SiteHelper::removeSpecialCharacter($Product->notes),
                SiteHelper::removeSpecialCharacter($Product->product_origin ? $Product->product_origin->name : ''),
                SiteHelper::removeSpecialCharacter($Product->department ? $Product->department->name : ''),
                SiteHelper::removeSpecialCharacter($Product->category ? $Product->category->name : ''),
                SiteHelper::removeSpecialCharacter($Product->sub_category ? $Product->sub_category->name : ''),
                SiteHelper::removeSpecialCharacter($Product->brand ? $Product->brand->name : ''),
                SiteHelper::removeSpecialCharacter($Product->manufacturer ? $Product->manufacturer->name : ''),
                SiteHelper::removeSpecialCharacter($Product->vendor ? $Product->vendor->name : ''),
                SiteHelper::removeSpecialCharacter($Product->unit_measure ? $Product->unit_measure->name : ''),
                SiteHelper::removeSpecialCharacter($Product->price_source ? $Product->price_source->name : ''),
                SiteHelper::removeSpecialCharacter($Product->profit_type ? $Product->profit_type->name : ''),
                SiteHelper::removeSpecialCharacter($Product->vat ? $Product->vat->name : ''),
                SiteHelper::removeSpecialCharacter($Product->currency ? $Product->currency->name : ''),
                SiteHelper::removeSpecialCharacter($Product->drug_direction ? $Product->drug_direction->name : ''),
                SiteHelper::removeSpecialCharacter($Product->delivery_period ? $Product->delivery_period->name : ''),
                SiteHelper::removeSpecialCharacter($Product->location ? $Product->location->name : ''),
                SiteHelper::removeSpecialCharacter($Product->location_type ? $Product->location_type->name : ''),
                SiteHelper::removeSpecialCharacter($Product->main_barcode),
                SiteHelper::removeSpecialCharacter($Product->gtin_code),
                SiteHelper::removeSpecialCharacter($Product->presentation),
                SiteHelper::removeSpecialCharacter($Product->product_reg_no),
                SiteHelper::removeSpecialCharacter($Product->active_ingredients),
                SiteHelper::removeSpecialCharacter($Product->fridge_item_note),
                SiteHelper::removeSpecialCharacter($Product->avg_net_price),
                SiteHelper::removeSpecialCharacter($Product->commodity_code),
                SiteHelper::removeSpecialCharacter($Product->stock_size),
                SiteHelper::isActive($Product->misc_item),
                SiteHelper::isActive($Product->weight),
                SiteHelper::isActive($Product->system_record),
                SiteHelper::isActive($Product->allow_discount),
                SiteHelper::isActive($Product->block_sale),
                SiteHelper::isActive($Product->block_order),
                SiteHelper::isActive($Product->block_goods_in),
                SiteHelper::isActive($Product->control_drug),
                SiteHelper::isActive($Product->cold_chain),
                SiteHelper::isActive($Product->dispense_label),
                SiteHelper::isActive($Product->web_order),
                SiteHelper::removeSpecialCharacter($Product->trade_price),
                SiteHelper::removeSpecialCharacter($Product->trade_disc),
                SiteHelper::removeSpecialCharacter($Product->net_price),
                SiteHelper::removeSpecialCharacter($Product->sell_price),
                SiteHelper::removeSpecialCharacter($Product->profit_amount),
                SiteHelper::removeSpecialCharacter($Product->profit_percentage),
                SiteHelper::removeSpecialCharacter($Product->vat_amount),
                SiteHelper::removeSpecialCharacter($Product->sell_price_inc_vat),
                SiteHelper::removeSpecialCharacter($Product->stock_in_hand),
                SiteHelper::removeSpecialCharacter($Product->price_per_psize_type),
                SiteHelper::removeSpecialCharacter($Product->psize_type),
                SiteHelper::removeSpecialCharacter($Product->manf_notes),
                SiteHelper::removeSpecialCharacter($Product->formulation),
                SiteHelper::removeSpecialCharacter($Product->special_container),
                SiteHelper::removeSpecialCharacter($Product->ma_holder),
                SiteHelper::removeSpecialCharacter($Product->case_size),


            ];
            fputcsv($fp, $productArray);
        }

        fclose($fp);

        header('Content-type: text/csv');
        header('Content-disposition: attachment; filename="' . $filename . '"');
        readfile($filename);

    }

    public function downloadPdf()
    {
        $Products = Product::with(['product_group', 'product_tag', 'product_type', 'product_origin', 'department', 'category', 'sub_category', 'brand',
            'manufacturer', 'vendor', 'unit_measure', 'price_source', 'profit_type', 'vat', 'currency', 'drug_direction',
            'delivery_period', 'location_type', 'location'])->get();
        if (empty($Products)) {
            return redirect('home');
        }
        foreach ($Products as $product) {
            $product->getStock();
        }

        $pdf = PDF::loadView('products.pdf', ['Products' => $Products]);
        return $pdf->download('products.pdf');
    }

    public function stockReport(Request $request)
    {
        $start_date = SiteHelper::reformatDbDate($request->start_date);
        $end_date = SiteHelper::reformatDbDate($request->end_date);
        $SortedDetails = PurchaseDetail::with('purchase', 'product.vendor', 'product.product_group', 'product.product_tag')
            ->whereDate('min_expiry_at', '>=', $start_date)
            ->whereDate('min_expiry_at', '<=', $end_date)
            ->get();

        if (!empty($SortedDetails)) {
            $filename = 'stockReport.csv';
            $fp = fopen($filename, 'w');
            $headerRow = ['sr', 'Item Code', 'Product Group', 'Item Description', 'Main Barcode ', 'Gtin code', 'Expiry Date', 'Vendor', 'Instruction', 'Unit Price', 'Quantity', 'Purchase Date', 'sell price', 'Net Profit', 'total stock'];
            fputcsv($fp, $headerRow);
            $count = 0;
            foreach ($SortedDetails as $detail) {
                $productArray = [
                    ++$count,
                    SiteHelper::removeSpecialCharacter($detail->Product ? $detail->Product->item_code : ''),
                    SiteHelper::removeSpecialCharacter($detail->Product ? ($detail->Product->product_group ? $detail->Product->product_group->name : "") : ''),
                    SiteHelper::removeSpecialCharacter(($detail->Product ? $detail->Product->item_description : '') . "(" . ($detail->Product->product_tag ? $detail->Product->product_tag->name : "") . ")"),
                    SiteHelper::removeSpecialCharacter($detail->Product ? $detail->Product->main_barcode : ''),
                    SiteHelper::removeSpecialCharacter($detail->Product ? $detail->Product->gtin_code : ''),
                    SiteHelper::reformatReadableDate($detail->min_expiry_at),
                    SiteHelper::removeSpecialCharacter($detail->Product ? ($detail->Product->vendor ? $detail->Product->vendor->name : "") : ''),
                    SiteHelper::removeSpecialCharacter($detail->qty_instructions),
                    SiteHelper::removeSpecialCharacter($detail->buying_price),
                    SiteHelper::removeSpecialCharacter($detail->qty),
                    SiteHelper::reformatReadableDate($detail->purchase ? $detail->purchase->purchase_at : ""),
                    "",
                    "",
                    ""
                ];
                fputcsv($fp, $productArray);
            }
            fclose($fp);

            header('Content-type: text/csv');
            header('Content-disposition: attachment; filename="' . $filename . '"');
            readfile($filename);

        }

    }

    public function importProducts()
    {
        $product_group_id = NULL;

        if (($handle = fopen("medicines.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $item_code = $data[0];
                $item_description = trim($data[1]);
                $strength = $data[2];
                $pack = $data[3];
                $product_group_id = $this->getProductGroup($data, $product_group_id);
                if (!empty($item_description) && $item_description != 'Product Description') {
                    $a = explode('(', $item_description);
                    $tag = '(' . end($a);
                    $tag_name = str_replace(['(', ')'], '', $tag);
                    $product_tag_id = $this->getProductTag($tag_name);
                    $item_name = str_replace($tag, '', $item_description);
                    Product::create([
                        'item_code' => $item_code,
                        'item_description' => $item_name,
                        'pack_size' => $pack,
                        'strength' => $strength,
                        'product_group_id' => $product_group_id,
                        'product_tag_id' => $product_tag_id
                    ]);
                }
            }
            fclose($handle);
        }
    }

    private function getProductTag($tag_name)
    {
        $tag_name = trim($tag_name);
        return ProductTag::updateOrCreate(['name' => $tag_name], ['name' => $tag_name])->id;
    }

    private function getProductGroup($data, $product_group_id)
    {
        $item_code = $data[0];
        $item_description = $data[1];
        if (empty($item_description)) {
            return ProductGroup::updateOrCreate([
                'name' => $item_code
            ], [
                'name' => $item_code
            ])->id;
        }
        return $product_group_id;
    }

    public function attachmentDelete(Request $request)
    {
        Attachment::where('id', $request->id)->where('object', 'Product')->delete();

        return response()->json([
            'status' => true,
            'message' => 'Image deleted successfully'
        ]);
    }
}
