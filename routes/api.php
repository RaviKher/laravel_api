<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('contacts',[App\Http\Controllers\ContactController::class, 'contacts']);
Route::post('saveContact',[App\Http\Controllers\ContactController::class, 'saveContact']);
Route::get('getContact/{id}',[App\Http\Controllers\ContactController::class, 'getContactByID']);
Route::post('updateContact/{id}',[App\Http\Controllers\ContactController::class, 'updateContact']);
Route::delete('deleteContact/{id}',[App\Http\Controllers\ContactController::class, 'deleteContact']);