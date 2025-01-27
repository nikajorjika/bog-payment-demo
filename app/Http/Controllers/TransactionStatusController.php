<?php

namespace App\Http\Controllers;



use App\Models\Transaction as LocalTransactionModel;
use RedberryProducts\LaravelBogPayment\Facades\Transaction;

class TransactionStatusController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $id)
    {
        $transaction = LocalTransactionModel::findOrFail($id);

        return Transaction::get($transaction->transaction_id);
    }
}
