<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Cart;
use App\User;
use App\Product;
use App\Orders;
use App\OrderDetail;
use Illuminate\Support\Facades\Auth; 
use App\Mail\Buy;
use Illuminata\Support\Facades\Mail;

class CartController extends Controller
{
    public function store(Request $request)
    {
     
        Cart::create(
            [
                'user_id' => \Auth::user()->id,
                'product_id' => $request->post('product_id'),
                 'quantity' => $request->post('quantity'),
            ]);
        
        
        return redirect('/');
    }
    
    public function index()
    {
        $cartitems = Cart::select('carts.*', 'products.name', 'products.price','products.image','products.description')
            ->where('user_id', \Auth::user()->id)
            ->join('products', 'products.id','=','carts.product_id')
            ->get();
        $subtotal = 0;
        foreach($cartitems as $cartitem){
            $subtotal += $cartitem->price * $cartitem->quantity;
        }
        return view('cart/index', ['cartitems' => $cartitems, 'subtotal' => $subtotal]);
        
    }
    
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect('/cartitem');
    }
   
    
    public function checkout(){
        $cartitems = Cart::select('carts.*', 'products.name', 'products.price','products.image','products.description','products.id')
            ->where('user_id', \Auth::user()->id)
            ->join('products', 'products.id','=','carts.product_id')
            ->get();
        
         $subtotal = 0;
        foreach($cartitems as $cartitem){
            $subtotal += $cartitem->price * $cartitem->quantity;
        }
        
       $order =  Orders::create([
            'user_id' => \Auth::user()->id,
            'total_price' => $subtotal,
        ]);
     
         $line_items = [];
         foreach ($cartitems as $product) {
             OrderDetail::create([
                 'product_id' => $product->product->id,
                 'order_id' => $order->id,
                 'price' => $product->price,
                 'quantity' => $product->quantity,
             ]);
             
             
             $line_item = [
                 'name'        => $product->name,
                 'description' => $product->description,
                 'amount'      => $product->price,
                 'currency'    => 'jpy',
                 'quantity'    => $product->quantity,
             ];
             array_push($line_items, $line_item);
         }
 
         \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
 
         $session = \Stripe\Checkout\Session::create([
             'payment_method_types' => ['card'],
             'line_items'           => [$line_items],
             'success_url'          => route('cart.success'),
             'cancel_url'           => route('login'),
         ]);
 
         return view('cart.checkout', [
             'session' => $session,
             'publicKey' => env('STRIPE_PUBLIC_KEY')
         ]);
     
    }
    
    public function success(){
        $carts = Cart::all();
      
        foreach($carts as $cart){
            if($cart->user->id === \Auth::user()->id){
            $cart->delete();
            }
            
        }
        return redirect('/');
    }
    

    
}
