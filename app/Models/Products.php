<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Categories;
use Sub_Category;
class Products extends Model
{
    use HasFactory;
    protected $fillable=['cat_id',
    'sub_categot_id',
    'name',
    'brand_id',
    'price'];
    
    public function category(){
        return $this->belongsTo(Categories::class,'category_id');
    }
 
    public function subcategory(){
     return $this->belongsTo(Sub_Category::class,'sub_category_id');
 }
}
