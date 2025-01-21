<?php

namespace App\Http\Controllers;

use Jorjika\BogPayment\Facades\Transaction;

class TransactionStatusController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $transaction_id)
    {
        // Take transaction details from the payment gateway
        return Transaction::get($transaction_id);
    }
}
