<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jorjika\BogPayment\Facades\Pay;

class InitiatePaymentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Log in with first user for testing purposes
        // !!!IMPORTANT!!!: Remove this line in production
        auth()->loginUsingId(1);

        // Validate incoming data
        $data = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'method' => 'required|string',
        ]);

        // Create new transaction for authorized user
        $transaction = auth()->user()->transactions()->create([
            'method' => $data['method'],
            'status' => 'pending',
            'amount' => $data['amount'],
        ]);

        // Initiate payment
        $paymentDetails = Pay::orderId($transaction->id)
            ->redirectUrl(route('status', ['transaction_id' => $transaction->id]))
            ->amount($data['amount'])
            ->process();

        // Update transaction id with the one from the payment gateway
        $transaction->update([
            'transaction_id' => $paymentDetails['id'],
        ]);

        // Redirect user to payment gateway
        return redirect()->away($paymentDetails['redirect_url']);
    }
}
