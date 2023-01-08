<?php

use App\Http\Controllers\API\dosenController;
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
Route::get('dosen', [dosenController::class, 'index']);
Route::post('dosen/store', [dosenController::class, 'store']);
Route::get('dosen/show/{id}', [dosenController::class, 'show']);
Route::post('dosen/update/{id}', [dosenController::class, 'update']);
Route::get('dosen/destroy/{id}', [dosenController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
