<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    
    protected $guraded = [];


    function category(){
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    
}
