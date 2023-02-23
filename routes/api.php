<?php

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

Route::get('/all-state', function () {
    $data = State::all();
    return $data;
});

Route::get('/state/{id}', function ($id) {
    $data = State::find($id);
    return $data;
});

Route::get('/all-postcode', function () {
    $data = Postcode::with('states')->get();
    return $data;
});

Route::get('/state-postcode/{id}', function ($id) {
    $data = Postcode::with('states')->where('state_id',$id)->get();
    return $data;
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
