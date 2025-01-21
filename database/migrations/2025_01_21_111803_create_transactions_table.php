<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model_id');
            $table->string('model_type');
            $table->string('method'); // e.g., card, bank transfer
            $table->string('status')->default('pending'); // pending, completed, failed, refunded
            $table->boolean('is_paid')->default(false);
            $table->boolean('is_completed')->default(false);
            $table->string('transaction_id')->unique()->nullable(); // BOG transaction reference
            $table->decimal('amount', 15, 2);
            $table->decimal('final_amount', 15, 2)->nullable();
            $table->decimal('refunded', 15, 2)->default(0);
            $table->decimal('commission', 15, 2)->nullable();
            $table->decimal('refundable', 15, 2)->default(0);
            $table->string('currency', 3)->default('GEL');
            $table->string('lang', 2)->default('EN');
            $table->json('split')->nullable();
            $table->boolean('can_be_committed')->default(false);
            $table->string('result_code')->nullable();
            $table->string('card_mask')->nullable();
            $table->json('log')->nullable(); // Logs of processing stages
            $table->timestamps();

            $table->index(['model_id', 'model_type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
