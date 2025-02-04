<?php

use App\Http\Controllers\InitiatePaymentController;
use App\Http\Controllers\SaveCardController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\TransactionStatusController;
use Illuminate\Support\Facades\Route;

Route::any('/initiate', InitiatePaymentController::class)->name('initiate');
Route::any('/save-card', SaveCardController::class)->name('save-card');
Route::any('/subscribe', SubscribeController::class)->name('subscribe');
Route::any('/status/{transaction_id}', TransactionStatusController::class)->name('status');
