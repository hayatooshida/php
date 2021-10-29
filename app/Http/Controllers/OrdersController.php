<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\User;

class OrdersController extends Controller
{
    public function index(){
      
      $orders = Orders::select('orders.*')->where('user_id', \Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
    
        return view('orders.index', [
           'order' => $orders,
        ]);
    
        
    }
 
}
