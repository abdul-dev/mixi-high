<?php

namespace App\Http\Controllers\App;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all()
    {
        return response()->json([
            'status' => true,
            'data' => Product::with('attachments')->latest()->get()
        ]);
    }

    public function getRandomProducts()
    {
        return response()->json([
            'status' => true,
            'data' => Product::with('attachments')->inRandomOrder()->limit(5)->get()
        ]);

    }

    public function detail(Request $request)
    {
        return response()->json([
            'status' => true,
            'data' => Product::with(['product_attributes', 'unit_measure', 'category', 'product_tags', 'details', 'reviews', 'attachments'])->latest()->find($request->product_id)
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

    public function getByCategoryId(Request $request)
    {
        return response()->json([
            'status' => true,
            'data' => Product::with(['product_attributes', 'unit_measure', 'category', 'product_tags', 'details', 'attachments'])->where('category_id', $request->category_id)->get()
        ]);
    }

}
