<?php

use App\Http\Controllers\CustomerController;
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

Route::post('customer',[CustomerController::class,'store']);
Route::get("abs", function (){
    return response()->json("ok found");
});

Route::get('/customers',[CustomerController::class,'all']);
Route::get('/customer_one',[CustomerController::class,'customer_one']);
//for cron job type---  php artisan cCron

