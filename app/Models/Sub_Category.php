<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Categories;
class Sub_Category extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo(Categories::class,'category_id');
    }
}
