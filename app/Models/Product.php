<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'code',
        'description',
        'image',
        'price',
        'in_stock',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPriceForQuantity()
    {
        if (!is_null($this->pivot)) {
            return $this->pivot->quantity * $this->price;
        }

        return  $this->price;
    }
}

