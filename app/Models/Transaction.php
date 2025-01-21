<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_id',
        'model_type',
        'method',
        'status',
        'is_paid',
        'is_completed',
        'transaction_id',
        'amount',
        'final_amount',
        'refunded',
        'commission',
        'refundable',
        'currency',
        'lang',
        'split',
        'can_be_committed',
        'result_code',
        'card_mask',
        'log',
    ];

    protected $casts = [
        'is_paid' => 'boolean',
        'is_completed' => 'boolean',
        'amount' => 'decimal:2',
        'final_amount' => 'decimal:2',
        'refunded' => 'decimal:2',
        'commission' => 'decimal:2',
        'refundable' => 'decimal:2',
        'split' => 'array',
        'log' => 'array',
        'can_be_committed' => 'boolean',
    ];

    public function model(): MorphTo
    {
        return $this->morphTo();
    }
}
