<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    // The attributes that are mass assignable
    protected $fillable = [
        'type',
        'title',
        'description',
        'price',
        'discount',
        'image',
    ];
}
