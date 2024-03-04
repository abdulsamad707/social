<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authenticate\authenticate;
use App\Http\Controllers\FrontController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::post("userregister",[authenticate::class,"register"]);
Route::post("sendlink",[authenticate::class,"sendlink"]);
Route::get("reset_password/{token}",[authenticate::class,"reset_password"]);
Route::post("reset_password",[authenticate::class,"change_password"]);
Route::view("forgotpassword","authenticate.sendlink");
Route::post("login",[authenticate::class,"logined"]);
Route::get("signout",[authenticate::class,"signout"]);
Route::middleware(['isuserlogin'])->group(function () {
    Route::get("/",[FrontController::class,"index"]);
    Route::get("user_profile/{id?}",[FrontController::class,"user_profile"]);
});
Route::get('login', function () {
    return view('authenticate.signin');
})->name("login");
Route::get('signup', function () {
    return view('authenticate.signup');
});