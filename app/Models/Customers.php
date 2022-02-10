<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orders;
use User;
class Customers extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','phone'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function bookings(){
        return $this->hasMany(Orders::class,'customer_id');
    }
}
