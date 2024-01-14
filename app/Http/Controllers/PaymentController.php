<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Stripe\Stripe;
use Stripe\PaymentIntent;

use Stripe\Charge;
class PaymentController extends Controller
{


    public function showPaymentForm()
    {
        return view('payment');
    }


    public function makePayment(Request $request)
{
    Stripe::setApiKey(config('services.stripe.secret'));

    try {
        $intent = PaymentIntent::create([
            'amount' => 1000, // Amount in paisa (INR 10.00)
            'currency' => 'inr',
        ]);

        // You can add your success message here
        $success = 'Payment was successful.';

        return view('payment', compact('intent', 'success'));
    } catch (\Exception $e) {
        return redirect()->route('payment.form')->with('error', $e->getMessage());
    }
}
}
