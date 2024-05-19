<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $appends = [
        'full_name',
        'student_age',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->middle_name . " " . $this->family_name;
    }

    public function getStudentAgeAttribute()
    {
        return Carbon::parse($this->dob)->age;
    }
}
