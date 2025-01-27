<?php

namespace App\Listeners;

use App\Models\Transaction;
use Illuminate\Support\Facades\Log;
use RedberryProducts\LaravelBogPayment\Events\TransactionStatusUpdated;

class TransactionStatusUpdateListener
{
    /**
     * Handle the event.
     */
    public function handle(TransactionStatusUpdated $event): void
    {
        Log::info('TransactionStatusUpdated event fired', ['event' => $event]);
        $providerTransaction = $event->transaction;
        $transaction = Transaction::with('model')
            ->whereId($providerTransaction['external_order_id'])
            ->firstOrFail();

        $transaction->update([
            'status' => $providerTransaction['order_status']['key'],
            'final_amount' => $providerTransaction['purchase_units']['request_amount'],
            'currency' => $providerTransaction['purchase_units']['currency_code'],
            'transaction_id' => $providerTransaction['order_id'],
            'log' => $event,
            'is_paid' => $providerTransaction['order_status']['key'] === 'completed',
            'is_completed' => $providerTransaction['order_status']['key'] === 'completed',
        ]);
    }
}
