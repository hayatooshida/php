<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;

class ProductController extends Controller
{
   public function index(Request $request)
    {
        if($request->has("keyword")){
            $products = Product::where('name','like','%'.$request->get("keyword").'%')->paginate(3);
        }
        else{
            $products = Product::orderBy('created_at','desc')->paginate(9);
        }
        return view('product.index', ['products' => $products]);
    }
    
  
    public function show($id)
     {
         if(\Auth::check()){
         $products = Product::findOrFail($id);
        
         return view('product.show', [
             'products' => $products,
             
             
         ]);
         
         }
         else{
             return redirect('login');
         }
     }
     
     public function favorites($id){
        $product = Product::findOrFail($id);
        $product->loadRelationshipCounts();
        $favorites = $product->favorites()->paginate(10);
        return view('product.show',[
            'favorites' => $favorites,

        ]);
    }
    
    
}