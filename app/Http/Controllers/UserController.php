<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPw;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use App\Models\OrderDetail;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; 

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        return view('user.profile', [ 'user' => $user ]);
    }

    public function address()
    {
        $user = auth()->user();

        $addresses = Address::where('customer_id', $user->id)->get();

        return view('user.address', [ 'addresses' => $addresses , 'user' => $user]);

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    { 
        $user = User::findOrFail($id);
    
        $request->validate([
            'name' => 'required',
            'phone_num' => 'required',
            'description' => 'required',
        ]);
    
        $user->update([
            'name' => $request->name,
            'email' => $user->email,
            'phone_num' => $request->phone_num,
            'description' => $request->description,
        ]);
    
        return redirect()->route('profile')
            ->with('success', 'User updated successfully');
    }

    public function storeAddress(Request $request)
    {
        $request->validate([
            'address_type' => 'required',
            'address_detail' => 'required',
            'address_no' => 'required',
            'street' => 'required',
            'city' => 'required',
            'extra_instructions' => 'nullable',
        ]);

        Address::create([
            'customer_id' => auth()->user()->id,
            'address_type' => $request->address_type,
            'address_detail' => $request->address_detail,
            'address_no' => $request->address_no,
            'street' => $request->street,
            'city' => $request->city,
            'extra_instructions' => $request->extra_instructions,
        ]);

        return redirect()->route('address')
            ->with('success', 'Address added successfully');
    }
    
    public function editAddress($id)
    {
        $address = Address::findOrFail($id);

        return view('user.addressEdit', [ 'address' => $address ]);
    }
    public function updateAddress(Request $request, $id)
    {
        $address = Address::findOrFail($id);

        $request->validate([
            'address_type' => 'required',
            'address_detail' => 'required',
            'address_no' => 'required',
            'street' => 'required',
            'city' => 'required',
            'extra_instructions' => 'nullable',
        ]);

        $address->update([
            'customer_id' => auth()->user()->id,
            'address_type' => $request->address_type,
            'address_detail' => $request->address_detail,
            'address_no' => $request->address_no,
            'street' => $request->street,
            'city' => $request->city,
            'extra_instructions' => $request->extra_instructions,
        ]);

        return redirect()->route('address')
            ->with('success', 'Address updated successfully');
    }

    public function deleteAddress($id)
    {
        $address = Address::findOrFail($id);

        $address->delete();

        return redirect()->route('address')
            ->with('success', 'Address deleted successfully');
    }

    public function password(){
        $user = auth()->user();

        return view('user.password', [ 'user' => $user ]);
    }

        // Function to handle the change password request
        // Function to handle the change password request
        public function changePassword(Request $request, $id)
        {
            // Validate the request data
            $request->validate([
                'old_password' => ['required', 'string', new MatchOldPw],
                'new_password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            // Get the authenticated user
            $user = User::findOrFail($id);
            // If the passwords match, update the user's password
            $user->password = Hash::make($request->new_password);
            $user->save();
            Auth::logout();
            // Redirect the user to the home page with a success message
            return redirect()->route('login')->with('success', 'Password changed successfully!');
        }

        // Redirect the user to the home page with a success message
    

public function order()
{
    // Fetch orders with their related order details, food, size, and crust data
    $orders = Order::with('orderDetails.food', 'orderDetails.size', 'orderDetails.crust')
        ->where('customer_id', auth()->user()->id)
        ->get();

    return view('user.order', ['orders' => $orders]);
}

        

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    
}
