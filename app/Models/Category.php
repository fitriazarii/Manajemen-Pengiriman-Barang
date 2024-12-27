<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'product_count',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
