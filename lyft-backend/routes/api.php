<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\Ride\RideController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Donation\DonationController;
use App\Http\Controllers\ShortcutsController;
use App\Http\Controllers\InviteHistoryController;

Route::post('/login', LoginController::class);
Route::post('/register', [RegisterController::class, 'register']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('users', [UserController::class, 'index']);
    Route::post('donations', [DonationController::class, 'store']);
    Route::put('donations', [DonationController::class, 'update']);
    Route::delete('donations', [DonationController::class, 'destroy']);
    Route::post('/promos', [PromoController::class, 'store']);
    Route::put('/promos/{promo}', [PromoController::class, 'update']);
    Route::delete('/promos/{promo}', [PromoController::class, 'destroy']);
    Route::get('rides', [RideController::class, 'index']);
    Route::post('uploadavatar', 'UserController@uploadAvatar');
    Route::post('shortcuts', [ShortcutsController::class, 'store']);
    Route::get('shortcuts', [ShortcutsController::class, 'index']);


    Route::post('/invite-history', [InviteHistoryController::class, 'store']);
    Route::get('/invite-history', [InviteHistoryController::class, 'index']);
});

