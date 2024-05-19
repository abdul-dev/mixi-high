<?php

namespace App\Http\Controllers;

use App\Helpers\SiteHelper;
use App\Models\Attachment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function all()
    {
        return response()->json([
            'status' => true,
            'data' => Category::with('products')->latest()->get()
        ]);
    }

    public function index()
    {
        $this->data['categories'] = Category::latest()->get();
        return view('categories.list', $this->data);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        $Category = new Category();
        $Category->fill([
            'name' => $request->name,
            'notes' => $request->notes
        ]);
        $Category->save();

        //Save image
        if ($request->image) {
            $image_name = SiteHelper::do_upload_image($request, 'image', $Category, 'categories');

            Attachment::create([
                'name' => $image_name,
                'file_name' => $image_name,
                'type' => '',
                'object' => 'Category',
                'object_id' => $Category->id,
                'context' => 'category-image'
            ]);
        }


        return response()->json([
            'status' => true,
            'message' => 'Record Saved successfully'
        ]);
    }

    public function edit(Request $request)
    {
        $this->data['category'] = Category::find($request->id);
        return view('categories.edit', $this->data);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        $Category = Category::find($request->id);
        $Category->fill([
            'name' => $request->name,
            'notes' => $request->notes
        ]);
        $Category->save();

        //Save image
        if ($request->image) {
            Attachment::where('object', 'Category')->where('object_id', $Category->id)->delete();
            $image_name = SiteHelper::do_upload_image($request, 'image', $Category, 'categories');

            Attachment::create([
                'name' => $image_name,
                'file_name' => $image_name,
                'type' => '',
                'object' => 'Category',
                'object_id' => $Category->id,
                'context' => 'category-image'
            ]);
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
        $Category = Category::find($request->id);
        if (!$Category) {
            return response()->json([
                'status' => false,
                'message' => 'Record not found'
            ]);
        }
        $Category->delete();

        return response()->json([
            'status' => true,
            'message' => 'Record deleted successfully'
        ]);

    }
}
