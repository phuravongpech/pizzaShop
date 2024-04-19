<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function session(Request $request){
        $user = auth()->user();
        $foodItems = [];
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        foreach(session('cart') as $id => $details){
            $food_name = $details['food_name'];
            $total = $details['price'];
            $quantity = $details['quantity'];

            $two0 = "00";
            $unit_amount = "$total$two0";

            $foodItems[] = [
                'price_data'=>[
                    'food_data' => [
                        'food_name' => $food_name,
                    ],
                    'currency'=>'USD',
                    'unit_amount' => $unit_amount,
                ],
                'quantity' => $quantity
            ];
        }
        $checkoutSession = \Stripe\Checkout\Session::create([
            'line_items' => [$foodItems],
            'mode'       => 'payment',
            'allow_promotion_codes' => true,
            'metadata'   =>[
                'user_id' => $user->id
            ],
            'customer_email'=>$user->email,
            'success_url'=>route('success'),
            'cancel_url' =>route('cancel'),
        ]);
        return redirect()->away($checkoutSession->url);
    }
    public function success()
    {
        return "Thanks for you order You have just completed your payment. The seeler will reach out to you as soon as possible";
    }
 
    public function cancel()
    {
        return view('cancel');
    }
}
