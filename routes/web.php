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
    Route::post("chats",[FrontController::class,"chats"]);
    Route::post("user_post",[FrontController::class,"user_post"]);
    Route::get("post_ai",[FrontController::class,"post_ai"]);
    Route::get("user_profile/{id?}",[FrontController::class,"user_profile"]);
    Route::get("makeFolder",[FrontController::class,"makeFolder"]);
    Route::get("addfriend/{id}",[FrontController::class,"addfriend"]);
    Route::get("user_profile_connections/{id?}",[FrontController::class,"user_profile_connections"]);
    Route::get("user_profile_about/{id?}",[FrontController::class,"user_about"]);
    Route::get("user_profile_Video/{id?}",[FrontController::class,"user_videos"]);
    Route::get("user_profile_event/{id?}",[FrontController::class,"user_profile_event"]);
    Route::get("unfriend/{id}",[FrontController::class,"unfriend"]);
    Route::view('settings', 'authenticate.settings');
    Route::post('settings', [FrontController::class,"settings"]);
    Route::post("userphoto",[FrontController::class,"userphoto"]);
    Route::post("change_password",[FrontController::class,"change_password"]);
    Route::post("user_video",[FrontController::class,"user_video"]);
    Route::post("user_event",[FrontController::class,"user_event"]);
    Route::post("userpage",[FrontController::class,"userpage"]);
    Route::get("deleteaccount",[FrontController::class,"deleteaccount"]);
    Route::post("chatsload",[FrontController::class,"chatsload"]);
    Route::post("postcomment",[FrontController::class,"postcomment"]);
});
Route::get('login', function () {
    return view('authenticate.signin');
})->name("login");
Route::get('signup', function () {
    return view('authenticate.signup');
});