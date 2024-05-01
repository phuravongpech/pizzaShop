<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\User;
use App\Models\Crust;
use App\Models\Size;

class CartController extends Controller
{
    public function index(){
        $user = auth()->user();
        
        $addresses = Address::where('customer_id', $user->id)->get();

        $crust = Crust::all();
        $size = Size::all();


        return view('viewcart', [
            'addresses'=> $addresses,
            'crust'=>$crust,
            'size'=> $size,
        ]);
        
    }
}
