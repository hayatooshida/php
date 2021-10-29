<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Orders;
use App\OrderDetail;

class OrderDetailController extends Controller
{
    
    
    public function show($id){
    
        $details = OrderDetail::select('order_details.*', 'products.name', 'products.price','products.image','products.description','products.id')
            ->where('order_id',$id)
            ->join('products', 'products.id','=','order_details.product_id')
            ->get();
     return view('order_detail.show',[
         'detail' => $details,
     ]);
    }
    
}
