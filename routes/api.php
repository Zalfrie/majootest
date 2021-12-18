<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('majoo', function () {
    return response()->json(['data' => 'hai']);
});

// Auth Endpoints
Route::group([
    'prefix' => 'v1/auth'
], function () {
    Route::post('login', [LoginController::class, 'login']);
});
