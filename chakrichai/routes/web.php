<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordManager;
use App\Http\Controllers\GoogleAuthController;
// use App\Http\Controllers\Auth;
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

// Home route
Route::get('/', function () {
    return view('home');
});

// Verification route
Auth::routes(
    ['verify'=>true]
);

// Login home
Route::get('/home', function () {
    return view('dashboard');   
} )->middleware(['auth', 'verified']);

// Forgot password and Reset password routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Route::get("/email", [ForgotPasswordManager::class, "forgotPassword"])
    ->name("forgot.password");
Route::post("/email", [ForgotPasswordManager::class, "forgotPasswordPost"])
    ->name("forgot.password.post");
Route::get("/reset/{token}", [ForgotPasswordManager::class, "resetPassword"])
    ->name("reset.password");
Route::post("/reset", [ForgotPasswordManager::class, "resetPasswordPost"]) 
    ->name("reset.password.post");

// Google Auth routes
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('googleAuth');
Route::get('auth/google/callback', [GoogleAuthController::class, 'callbackgoogle'])->name('callbackGoogle');



// Profile route
// Route::get('home/profile')