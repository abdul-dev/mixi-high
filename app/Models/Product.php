<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['total_reviews_count', 'total_rating', 'labeled_bg_color', 'main_product_tag', 'product_labeled', 'start_from_price'];

    public function product_attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function details()
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function unit_measure()
    {
        return $this->belongsTo(UnitMeasure::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function product_tags()
    {
        return $this->hasMany(ProductTag::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'object_id', 'id')->where('object', 'Product');
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id', 'id');
    }

    public function getTotalReviewsCountAttribute()
    {
        return formatNumber($this->reviews->count());
    }

    public function getTotalRatingAttribute()
    {
        if ($this->reviews && $this->reviews->count() > 0) {
            $count = $this->reviews->count();
            $ratings = $this->reviews->sum('rating');

            // Calculate the average rating and round to one digit
            $averageRating = round($ratings / $count, 1);

            return $averageRating;
        } else {
            // Handle the case when there are no reviews (avoid division by zero)
            return 0.0;
        }
    }

    public function getLabeledBgColorAttribute()
    {
        // Generate random RGB values (0-255)
        $red = mt_rand(0, 255);
        $green = mt_rand(0, 255);
        $blue = mt_rand(0, 255);

        // Convert RGB to hexadecimal format
        $hexColor = sprintf("#%02x%02x%02x", $red, $green, $blue);

        return $hexColor;
    }

    public function getMainProductTagAttribute()
    {
        return 'High';
    }

    public function getProductLabeledAttribute()
    {
        if ($this->category) {
            return $this->category->name;
        } else {
            return '';
        }
    }

    public function getStartFromPriceAttribute()
    {
        if ($this->details) {
            return amountFormatter($this->details()->min('unit_price') ?? 0);
        } else {
            return amountFormatter(0);
        }
    }
}
