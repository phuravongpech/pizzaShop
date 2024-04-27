<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FoodsController extends Controller
{
    public function index(){
        $foods = Food::all();
        return view('menu',compact('foods'));
    }
    public function cart(){
        return view('viewcart');
    }
    public function addToCart($id)
    {
        $validator = Validator::make(['id' => $id], [ // Validate request data
            'id' => 'required|integer|exists:food,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $food = Food::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "food_name" => $food->name,
                "food_image" => $food->image,
                "food_desc" => $food->desc,
                "price" => $food->price,
                "quantity" => 1,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Food added to cart!!');
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
