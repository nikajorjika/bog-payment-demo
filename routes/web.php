<?php

use App\Http\Controllers\InitiatePaymentController;
use App\Http\Controllers\TransactionStatusController;
use Illuminate\Support\Facades\Route;

Route::any('/initiate', InitiatePaymentController::class)->name('initiate');
Route::any('/status/{transaction_id}', TransactionStatusController::class)->name('status');
