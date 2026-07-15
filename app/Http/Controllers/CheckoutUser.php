<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IntaSend\IntaSendPHP\Checkout;
use IntaSend\IntaSendPHP\Customer;

class CheckoutUser extends Controller
{
   
    public function checkout(Request $request)
    {
      $input_values = $request->validate([
        'first_name'=>['required', 'string','max:255'],
        'last_name'=>['required','string','max:255'],
        'email'=>['required','email'],
        'country'=>['required','string'],
        'amount'=>['required','numeric', 'min:1']
      ]);


       $credentials=[
        'token'=> config('services.intasend.secret_key'),
        'publishable_key' => config('services.intasend.publishable_key')
       ];

       $customer=new Customer();
       $customer->first_name = $input_values['first_name'];
       $customer->last_name = $input_values['last_name'];
       $customer->email = $input_values['email'];
       $customer->country = $input_values['country'];

       $amount = $input_values['amount'];
       $currency='KES';

       $host = config('app.url');
       $redirect_url = config('app.url') . '/booking/confirmation';
       $ref_order_number = "test-order-10";

       $card_tarrif = "BUSINESS-PAYS";
       $mobile_tarrif = "BUSINESS-PAYS";
       $wallet_id=null;

       $checkout = new Checkout();
       $checkout->init($credentials);

       $resp = $checkout->create($amount = $amount, $currency = $currency, $customer = $customer, $host=$host, $redirect_url = $redirect_url, $api_ref = $ref_order_number, $comment = null, $method = null, $card_tarrif=$card_tarrif, $mobile_tarrif=$mobile_tarrif, $wallet_id=$wallet_id);
       
       if (!$resp || !isset($resp->url)) {
          return response()->json([
              'message' => 'Failed to initialize payment'
          ], 500);
      }

      return response()->json([
    'url' => $resp->url
     ]);
    }
}
