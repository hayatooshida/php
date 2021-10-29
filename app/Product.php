<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function carts(){
        return $this->hasMany(Cart::class);
    }
    
    public function order_details(){
        return $this->hasMany(OrderDetail::class);
    }
    
   
    public function favorites(){
        return $this->belongsToMany(User::class,'favorites','user_id','product_id');
    }
    
    
    
    public function loadRelationshipCounts(){
        $this->loadCount('favorites');
    }
   
    
    
    
}
