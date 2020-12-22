<?php

use App\Http\Controllers\ItemController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/show-todos', [ItemController::class,'showTodos']);
// Route::get('/items', [ItemController::class,'index']);


// Route::post('item/store', [ItemController::class,'store']);
// Route::post('item/{id}', [ItemController::class,'destroy']);
Route::resource('/items', ItemController::class);

