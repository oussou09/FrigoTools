<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'productName',
        'imageUrl',
        'price',
    ];

    public function likesByAny() {
        return $this->belongsToMany(User::class,'likes');
    }

    public function category() {
        return $this->belongsToMany(Category::class,'category_product');
    }
}
