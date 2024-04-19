<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodsController extends Controller
{
    public function index(){
        $foods = Food::all();
        return view('cart.foods',compact('foods'));
    }
    public function cart(){
        return view('cart.cart');
    }
    public function addToCart($id){
        $food = Food::findOrFail($id);
        $cart = session()->get('cart',[]);
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }
        else{
            $cart[$id]=[
                "food_name" => $food->food_name,
                "photo" => $food->photo,
                "price" => $food->price,
                "quantity" => 1,
            ];
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('success','Food add to cart!!');
    }
    public function update(Request $request){
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart',$cart);
            session()->flash('success','Cart updated!!');
        }
    }
    public function remove(Request $request){
        if($request->id){
            $cart = session()->get('cart');
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart',$cart);
            }
            session()->flash('success','Food have been remove!!');
        }
    }
}
