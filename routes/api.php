<?php

use App\Http\Controllers\ConfirmSettingController;
use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;



Route::post('/send-code', [UserController::class, 'sendConfirmCode']);
Route::post('/confirm-code', [ConfirmSettingController::class, 'confirmCode']);
