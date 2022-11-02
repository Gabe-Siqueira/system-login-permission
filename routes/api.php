<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MenuApiController;
use App\Http\Controllers\Api\PermissionApiController;
use App\Http\Controllers\Api\UserApiController;
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


Route::post('login/user', [AuthController::class, 'login']);
Route::group(['middleware' => ['jwt.auth']], function(){
    // AuthController
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

    // UserApiController
    Route::get('user', [UserApiController::class, 'index']);
    Route::get('userProfile', [UserApiController::class, 'indexProfile']);
    Route::post('user', [UserApiController::class, 'store']);
    Route::get('user/{id}', [UserApiController::class, 'show']);
    Route::put('user/{id}', [UserApiController::class, 'update']);
    Route::delete('user/{id}', [UserApiController::class, 'destroy']);

    // PermissionApiController
    Route::get('permission', [PermissionApiController::class, 'index']);
    Route::post('permission', [PermissionApiController::class, 'store']);
    Route::get('permission/{id}', [PermissionApiController::class, 'show']);
    Route::put('permission/{id}', [PermissionApiController::class, 'update']);
    Route::delete('permission/{id}', [PermissionApiController::class, 'destroy']);

    // MenuApiController
    Route::get('menu', [MenuApiController::class, 'index']);
    Route::post('menu', [MenuApiController::class, 'store']);
    Route::get('menu/{id}', [MenuApiController::class, 'show']);
    Route::put('menu/{id}', [MenuApiController::class, 'update']);
    Route::delete('menu/{id}', [MenuApiController::class, 'destroy']);

});
