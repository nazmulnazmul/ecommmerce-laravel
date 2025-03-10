<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
 
    public function subCategories(){
        return $this->hasMany(SubCategory::class, 'cat_id', 'id')->where('subCat_status', 1);
     }
}
