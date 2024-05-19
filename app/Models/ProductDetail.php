<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['unit_price_formatted'];

    public function getUnitPriceFormattedAttribute()
    {
        if ($this->unit_price) {
            return amountFormatter($this->unit_price);
        } else {
            return amountFormatter(0);
        }
    }
}
