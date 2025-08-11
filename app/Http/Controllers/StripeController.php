<?php

namespace App\Http\Controllers;

use App\Models\Stripe;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;

class StripeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('/payment.payment');
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
    public function show(Stripe $stripe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stripe $stripe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stripe $stripe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stripe $stripe)
    {
        //
    }


    public function checkout()
    {
        Stripe::setApiKey(config('stripe.sk'));

        $session = Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            "name" => "spotify subscription",
                            "description" => "to listent to our music please pay for that"
                        ],
                        // 'unit_amount' => 100000,
                    ],
                    // 'quantity' => 3,
                ],

            ],
            'mode' => 'payment', // the mode  of payment
            'success_url' => route('dashboard'), // route when success 
            'cancel_url' => route('/payement.payement'), // route when  failed or canceled
        ]);

        return redirect()->away($session->url);
    }
}
