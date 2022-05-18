<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

$namespace = "App\Http\Controllers\Api\\";

Route::post('hotels',$namespace."DataController@index");

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
