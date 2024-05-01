<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Crust;
use App\Models\Size;
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
    public function addToCart($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|integer|min:1',
            'size' => 'required|exists:sizes,id',
            'crust' => 'required|exists:crusts,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $food = Food::findOrFail($id);
        $size = Size::findOrFail($request->size);
        $crust = Crust::findOrFail($request->crust);

        $cart = session()->get('cart', []);

        $price = $food->price;

        if($crust && $size){
            $price *= $size->price_modifier;
            $price += $crust->priceAdd;
        }

        $key = $id . '-' . $request->crust . '-' . $request->size;

        if (isset($cart[$key])) {
            $cart[$key]['quantity']++;
        } else {
            $cart[$key] = [
                "food_name" => $food->name,
                "food_image" => $food->image,
                "food_desc" => $food->desc,
                "price" => $price,
                "crust" => $crust->name,
                "size" => $size->name,
                "quantity" => $request->quantity,
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
