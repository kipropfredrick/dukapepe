<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Product;
use Sub_Category;
class Category extends Model
{
    use HasFactory;
    
    public function subcategories(){
        return $this->hasMany(Sub_Category::class,'category_id');
    }

    public function products(){
        return $this->hasMany(Product::class,'category_id');
    }
}
