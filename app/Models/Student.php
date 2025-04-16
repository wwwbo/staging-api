<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'religion',
        'place_of_birth',
        'date_of_birth',
        'gender',
        'address',
        'phone_number',
        'photo'
    ];
}
