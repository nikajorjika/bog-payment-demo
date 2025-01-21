<?php

namespace App\Listeners;

use App\Models\Transaction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Nikajorjika\BogPayment\Events\TransactionStatusUpdated;

class TransactionStatusUpdateListener
{
    /**
     * Handle the event.
     */
    public function handle(TransactionStatusUpdated $event): void
    {
        $transaction = Transaction::withUser()
            ->whereId($event['external_order_id'])
            ->firstOrFail();

        $transaction->update([
            'status' => $event['transaction']['order_status']['key'],
            'final_amount' => $event['transaction']['purchase_units']['request_amount'],
            'currency' => $event['transaction']['purchase_units']['currency_code'],
            'transaction_id' => $event['transaction']['payment_detail']['transaction_id'] ?? $transaction->transaction_id,
            'log' => $event,
            'is_paid' => $event['transaction']['order_status']['key'] === 'completed',
            'is_completed' => $event['transaction']['order_status']['key'] === 'completed',
        ]);

        // After this you can update user balance or do any other actions ex: Notify user of failed or successful transaction
    }
}
