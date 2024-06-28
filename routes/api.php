<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login',[AuthController::class,'login']);

Route::group(["middleware" => ["auth:sanctum"]], function () {

    //Role Controller
    Route::put('role-archived/{id}',[RoleController::class,'archived']);
    Route::resource("role", RoleController::class);

    //Users Controller
    Route::put('user-archived/{id}',[UserController::class,'archived']);
    Route::resource("users", UserController::class);

    //Auth Controller
    Route::post('logout',[AuthController::class,'logout']);

});