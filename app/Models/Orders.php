<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Customers;
use Product;
class Orders extends Model
{
    use HasFactory;
    protected $fillable['prod_id',
    'prod_name',
    'cust_id',
    'total'];
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function customer(){
      return $this->belongsTo(Customers::class,'customer_id');
  }
}
