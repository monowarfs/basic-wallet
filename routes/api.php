<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/wallets/{page?}/{limit?}', [\App\Http\Controllers\WalletController::class, 'index']);
Route::post('/insert', [\App\Http\Controllers\WalletController::class, 'insert']);
Route::post('/substruct', [\App\Http\Controllers\WalletController::class, 'substruct']);
Route::get('/fetch/{id}', [\App\Http\Controllers\WalletController::class, 'fetch']);
