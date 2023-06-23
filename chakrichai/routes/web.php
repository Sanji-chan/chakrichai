<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordManager;
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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("/email", [ForgotPasswordManager::class, "forgotPassword"])
    ->name("forgot.password");
Route::post("/email", [ForgotPasswordManager::class, "forgotPasswordPost"])
    ->name("forgot.password.post");
Route::get("/reset/{token}", [ForgotPasswordManager::class, "resetPassword"])
    ->name("reset.password");
Route::post("/reset", [ForgotPasswordManager::class, "resetPasswordPost"]) 
    ->name("reset.password.post");