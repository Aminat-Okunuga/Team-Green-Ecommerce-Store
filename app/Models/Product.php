<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    function gallery()
    {
        return $this->hasMany(ProductsGellery::class);
    }

    function category()
    {
        return $this->belongsTo(Category::class);
    }
}
