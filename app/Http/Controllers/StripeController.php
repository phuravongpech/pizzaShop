<?php

namespace App\Http\Controllers;

use Filament\Forms\Components\Card;
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
    public function handleWebhook(Request $request){
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
