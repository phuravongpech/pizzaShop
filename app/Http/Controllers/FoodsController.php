<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Crust;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class FoodsController extends Controller
{
    public function index()
    {
        $pizzas = Food::where('category_id', 1)->get();
        $appetizers = Food::where('category_id', 2)->get();
        $drinks = Food::where('category_id', 3)->get();
        
        return view('menu', compact('pizzas', 'drinks', 'appetizers'));
    }
    public function cart(){
        return view('viewcart');
    }
    public function addToCart($id, Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Fetch the food item by ID
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

        // Put the updated cart back into the session
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Food added to cart!!');
    }


    // public function checkout(){
    //     $cart = session()->get('cart');

    //     $order = new Order();
    //     $order->customer_id = auth()->id();
    //     $order->order_date = now();
    //     $order->save();

    //     foreach($cart as $item){
    //         $orderDetail = new OrderDetail();
    //         $orderDetail->order_id = $order->id;
    //         $orderDetail->food_id = $item['id'];
    //         $orderDetail->size_id = $item['size_id'];
    //         $orderDetail->crust_id = $item['crust_id'];
    //         $orderDetail->quantity = $item['quantity'];
    //         $orderDetail->save();
    //     }

    //     session()->forget('cart');

    //     return redirect()->route('success')->with('success','Order placed successfully!!');

    // }


    public function update(Request $request){
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart',$cart);
            session()->flash('success','Cart updated!!');
        }
    }
    public function remove(Request $request)
    {
        if($request->key){
            $cart = session()->get('cart');
            if(isset($cart[$request->key])){
                unset($cart[$request->key]);
                session()->put('cart',$cart);
            }
            session()->flash('success','Food has been removed!!');
        }

        return redirect()->back();
    }

}
