<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Product;
class Brands extends Model
{
    use HasFactory;
    protected $fillabel=['name','image'];
    public function products(){
        return $this->hasMany(Product::class,'brand_id');
    }
}
