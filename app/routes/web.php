<?php

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'start']);
Route::post('/get',function (Request $request) {
    return response()->json([MainController::get($request->toArray())]);
});
