<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodsController extends Controller
{
    public function index(){
        $foods = Food::all();
        return view('menu',compact('foods'));
    }
    public function cart(){
        return view('cart.cart');
    }
    public function addToCart($id){
        $food = Food::findOrFail($id);

        // Retrieve the cart from the session
        $cart = session()->get('cart', []);

        // Calculate the price based on the selected size and crust
        $price = $food->price;

        if ($request->has('size') && $request->has('crust')) {
            $size = Size::findOrFail($request->size);
            $crust = Crust::findOrFail($request->crust);
            $price *= $size->price_modifier;
            $price += $crust->priceAdd;
        } else {
            $size = null;
            $crust = null;
        }
        // Unique key for each item in the cart
        $key = $id . '-' . $request->input('crust', null) . '-' . $request->input('size', null);

        // Check if the item is already in the cart
        if (isset($cart[$key])) {
            $cart[$key]['quantity']++;
        } else {
            // Add the item to the cart
            $cart[$key] = [
                "food_name" => $food->name,
                "food_image" => $food->image,
                "food_desc" => $food->desc,
                "price" => $price,
                "crust" => $crust ? $crust->name : 'N/A',
                "size" => $size ? $size->name : 'N/A',
                "quantity" => $request->quantity,
            ];
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('success','Food add to cart!!');
    }

public function update(Request $request)
{
    if ($request->key && $request->quantity) {
        $cart = session()->get('cart');

        $cart[$request->key]["quantity"] = $request->quantity;

        session()->put('cart', $cart);

        $subTotal = 0;
        $total = 0;
        foreach ($cart as $details) {
            $subTotal += $details['price'] * $details['quantity'];
            $total += $details['price'] * $details['quantity'];
        }

        return response()->json([
            'status' => 'Cart updated!',
            'subTotal' => $subTotal,
            'total' => $total
        ]);
    }

    return response()->json(['status' => 'Failed to update cart'], 400);
}



    public function remove(Request $request)
    {
        if($request->key){
            $cart = session()->get('cart');
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart',$cart);
            }
            session()->flash('success','Food have been remove!!');
        }
    }
}
