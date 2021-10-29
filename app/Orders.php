<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = ['total_price', 'user_id'];
  
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function order_details(){
        return $this->hasMany(OrderDetail::class);
    }
}
