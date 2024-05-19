<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{

    public function all()
    {
        return response()->json([
            'status' => true,
            'data' => Tag::latest()->get()
        ]);
    }

    public function index()
    {
        $this->data['product_tags'] = Tag::latest()->get();
        return view('tags.list', $this->data);
    }

    public function create()
    {
        return view('tags.create');
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

        $Tag = new Tag();
        $Tag->fill([
            'name' => $request->name,
            'notes' => $request->notes
        ]);
        $Tag->save();

        return response()->json([
            'status' => true,
            'message' => 'Record Saved successfully'
        ]);
    }

    public function edit(Request $request)
    {
        $this->data['product_tag'] = Tag::find($request->id);
        return view('tags.edit', $this->data);
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

        $Tag = Tag::find($request->id);
        $Tag->fill([
            'name' => $request->name,
            'notes' => $request->notes
        ]);
        $Tag->save();

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
        $Tag = Tag::find($request->id);
        if (!$Tag) {
            return response()->json([
                'status' => false,
                'message' => 'Record not found'
            ]);
        }
        $Tag->delete();

        return response()->json([
            'status' => true,
            'message' => 'Record deleted successfully'
        ]);

    }
}
