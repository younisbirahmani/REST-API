<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiProductController;

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
Route::get('contact', [App\Http\Controllers\API\ContactController::class, 'index']);
Route::post('contact', [App\Http\Controllers\API\ContactController::class, 'store']);
Route::get('contact/{id}', [App\Http\Controllers\API\ContactController::class, 'show']);
Route::put('contact/{id}', [App\Http\Controllers\API\ContactController::class, 'update']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});