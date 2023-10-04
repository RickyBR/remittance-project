<?php

use App\Http\Controllers\Api\HealthController;
use App\Http\Controllers\Api\User\UserController;
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
Route::get('health', [HealthController::class, 'index']);

Route::post('sign-up',[UserController::class, 'signUp']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
