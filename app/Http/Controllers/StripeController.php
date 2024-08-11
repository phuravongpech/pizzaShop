<?php

namespace App\Http\Controllers;

use Filament\Forms\Components\Card;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Food;
use App\Models\Size;
use App\Models\Crust;
use Illuminate\Support\Facades\Validator;

class StripeController extends Controller
{
    
    public function createSession(Request $request){
        $user = auth()->user();
        $foodItems = [];
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
    
        foreach(session('cart') as $id => $details){
            $food_name = $details['food_name'];
            $total = $details['price'];
            $quantity = $details['quantity'];
            $crust = $details['crust'];
            $size = $details['size'];

            

            $unit_amount = intval($total * 100);

            $description = "Crust: $crust, Size: $size"; // Description including crust and size

            $foodItems[] = [
                'price_data'=>[
                    'currency'=>'USD',
                    'product_data' => [
                        'name' => $food_name,
                        'description' => $description,
                    ],
                    'unit_amount' => $unit_amount,
                ],
                'quantity' => $quantity
            ];
        }
        $checkoutSession = \Stripe\Checkout\Session::create([
            'line_items' => $foodItems,
            'mode'       => 'payment',
            'allow_promotion_codes' => true,
            'metadata'   =>[
                'user_id' => $user->id,
                'size' => $request->size,
                'crust' => $request->crust,
            ],
            'customer_email'=>$user->email,
            'success_url'=>route('success'),
            'cancel_url' =>route('cancel'),
        ]);
        return redirect()->away($checkoutSession->url);
    }
    
    
    
    public function success(Request $request)
    {
        // Handle successful payment
        // You can access the session ID from the request
        // $sessionId = $request->query('session_id');

        // Update your database
        $cart = session()->get('cart');

        $order = new Order();
        $order->customer_id = auth()->id();
        $order->order_date = now();
        $order->save();

        foreach($cart as $id => $item){
            //In your loop, $id is a composite key generated in the addToCart method as a 
            //combination of food_id, size_id, and crust_id. You need to parse this key to 
            //retrieve the food_id.
            // Explode the $id to get the food_id
            $ids = explode('-', $id); // function splits the string $id into an array using '-' as the separator.
            $food_id = $ids[0]; //extracts the food_id from the exploded array.

            $size_id = Size::where('name', $item['size'])->first()->id;
            $crust_id = Crust::where('name', $item['crust'])->first()->id;

            $crust_id = $crust_id == 'null' ? null : $crust_id;
            $size_id = $size_id == 'null' ? null : $size_id;

            if($size_id && $crust_id){

                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->food_id = $food_id;
                $orderDetail->size_id = $size_id;
                $orderDetail->crust_id = $crust_id;
                $orderDetail->quantity = $item['quantity'];
                $orderDetail->save();
            }else{

                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->food_id = $food_id;
                $orderDetail->size_id = null;
                $orderDetail->crust_id = null;
                $orderDetail->quantity = $item['quantity'];
                $orderDetail->save();
            }
        }

        // Clear the cart
        session()->forget('cart');

        // Redirect the user to a thank you page
        return redirect()->route('viewcart')->with('success', 'Payment successful! Thank you for your order.');
    }

// 
    public function cancel()
    {
        return view('viewcart');
    }
    public function handleWebhook(Request $request)
    {
        $endpointSecret = config('stripe.wh_secrect');

        $sigHeader = $request ->header('Stripe-Signature');
        $payload = $request->getContent();
        $event = null;
        try{
            $event = \Stripe\Webhook::constructEvent(
                $payload,
                $sigHeader,
                $endpointSecret
            );
        }
        catch(\UnexpectedValueException $e){
            return response('Invalid payload', 400);
        }
        catch(\Stripe\Exception\SignatureVerificationException $e){
            return response('Invalid payload', 400);
        }
        if($event->type == 'checkout.session.completed'){
            $session = $event->data->object;
            
            $order = new \App\Models\Order();
            $order->customer_id = $session->metadata->user_id;
            $order->order_date = now();
            $order->save(); 
            //line_items from checkout session
            foreach($session->line_items as $item){
                $orderDetail = new \App\Models\OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->food_id = $item->food_id;
                $orderDetail->size_id = $item->size_id;
                $orderDetail->crust_id = $item->crust_id;
                $orderDetail->quantity = $item->quantity;
                $orderDetail->save();
            }
            return response('Webhook Hadle',200);
        }
        return response('Event not hadle');
    }
}
