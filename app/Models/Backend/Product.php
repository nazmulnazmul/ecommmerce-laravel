<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'cat_id',
        'sub_cat_id',
        'brand_id',
        'name',
        'product_slug',
        'qty',
        'regular_price',
        'selling_price',
        'product_code',
        'product_model',
        'product_short_des',
        'product_long_des',
        'is_popular',
        'is_featured',
        'is_new',
        'product_status',
        'image',
    ];


    public function cat(){
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    public function subCat(){
        return $this->belongsTo(SubCategory::class, 'sub_cat_id', 'id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}
