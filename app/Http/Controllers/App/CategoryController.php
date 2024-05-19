<?php

namespace App\Http\Controllers\App;

use App\Models\Category;

class CategoryController extends Controller
{
    public function all()
    {
        return response()->json([
            'status' => true,
            'data' => Category::with('attachment')->latest()->get()
        ]);
    }

}
