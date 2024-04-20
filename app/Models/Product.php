<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en',
        'name_ar',
        'image',
        'price',
        'quantity',
        'description_name_ar',
        'description_name_en',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
