<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerAbroad extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['partner'];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getPartnerAttribute()
    {
        return $this->user->name;
    }
}
