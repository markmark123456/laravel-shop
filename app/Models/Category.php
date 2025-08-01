<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'description', 'image'];
    
    // Связь: категория имеет много продуктов
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
