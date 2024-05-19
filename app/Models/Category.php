<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function attachment()
    {
        return $this->hasOne(Attachment::class, 'object_id')->where('object', 'Category');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
