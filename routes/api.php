<?php

use App\Http\Controllers\StatePostcodeController;
use App\Models\Postcode;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/all-state', [StatePostcodeController::class, 'allState']);
Route::get('/state/{id}', [StatePostcodeController::class, 'stateById']);
Route::get('/all-postcode', [StatePostcodeController::class, 'allPostcode']);
Route::get('/state-postcode/{id}', [StatePostcodeController::class, 'postcodeByState']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
