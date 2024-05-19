<?php

namespace App\Http\Controllers\App;

use App\Models\Product;
use App\Models\ProductReview;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductReviewController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        $User = User::find(Auth::id());

        ProductReview::create([
            'product_id' => $request->product_id,
            'user_id' => $User->id,
            'title' => $request->title,
            'username' => $User->full_name,
            'email' => $User->email,
            'review_description' => $request->review_description,
            'rating' => $request->rating,
            'enjoyment_level' => $request->enjoyment_level,
        ]);

        $Product = Product::find($request->product_id);

        return response()->json([
            'status' => true,
            'message' => 'Review saved successfully',
            'total_reviews_count' => $Product->total_reviews_count,
            'total_rating' => round($Product->total_rating, 2),
        ]);
    }

    public function reviewsByProductId(Request $request)
    {
        return response()->json([
            'status' => true,
            'data' => ProductReview::where('product_id', $request->product_id)->get()
        ]);
    }
}
