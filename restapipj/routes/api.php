<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestController;

use App\Http\Controllers\AuthController;

Route::group([
'middleware' => ['auth:api'],
'prefix' => 'auth'
], function ($router) {
Route::post('register', [AuthController::class, 'register'])->withoutMiddleware(['auth:api']);
Route::post('login', [AuthController::class, 'login'])->withoutMiddleware(['auth:api']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::get('user', [AuthController::class, 'me']);
});

Route::apiResource('/v1/rest', RestController::class);

Route::get('/hello', function () {
    return response()->json([
      'message' => 'Hello'
    ], 200);
});