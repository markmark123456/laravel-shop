<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Указываем, какие поля можно массово заполнять
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
}
