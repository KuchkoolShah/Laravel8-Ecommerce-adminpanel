<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrder;
use Session;
use DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItem = \Cart::getContent();
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51Js8LLCvJh510Wa3DEi5Rfa7qeTEiutHZNrQM3uITiGwlHZ7hLfvm58pGIKV1JdHQhhlu4FukKwUnurwpYJiZ6gh001CtsaTsi');
                
        $amount = 100;
        $amount *= 100;
        $amount = (int) $amount;
        
        $payment_intent = \Stripe\PaymentIntent::create([
            'description' => 'Stripe Test Payment',
            'amount' => $amount,
            'currency' => 'INR',
            'description' => 'Payment From Codehunger',
            'payment_method_types' => ['card'],
        ]);
        $intent = $payment_intent->client_secret;

       
      
        return view('customer.checkout' , compact('cartItem' , 'intent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       dd($request->all());


        //  $cart = [];
        // if (Session::has('cart')) {
        //     $cart = Session::get('cart');
        // }
        //          $data = json_encode($request->product_id, true);
        //     $customer=Customer::create([
            
        //             "billing_firstName" => $request->billing_firstName,
        //             "billing_lastName" => $request->billing_lastName,
        //             "username" => $request->username,
        //             "email" => $request->email,
        //             "billing_address1" => $request->billing_address1,
        //             "billing_address2" => $request->billing_address2,
        //             "billing_country" => $request->billing_country,
        //             "billing_state" => $request->billing_state,
        //             "billing_zip" => $request->billing_zip,
        //             "shipping_firstName" => $request->shipping_firstName,
        //             "shipping_lastName" => $request->shippin_lastName,
        //             "shipping_address1" => $request->shipping_address1,
        //             "shipping_address2" => $request->shipping_address2,
        //             "shipping_country" => $request->shipping_country,
        //             "shipping_state" => $request->shipping_state,
        //             "shipping_zip" => $request->shipping_zip,
        //        ]);
            
            
        

       

        //     if ($customer) {
        //     $intent = Order::create([
           
                
        //         'user_id' =>$request->user_id,
        //       'product_id'=> $data, 
        //         'qty' => $request->qty,
        //         'status' => 'Pending',
        //         'price' => $request->price,
               
            
        //  ]);
        // }
        // if ($customer && $intent) {
           
        //    return back()->with('message', 'Error Inserting new User');
        // } else {
            
        //     return back()->with('message', 'Error Inserting new User');
        // }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
