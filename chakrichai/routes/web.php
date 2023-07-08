<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordManager;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\UserRoleMiddleware;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
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
Route::get('/', function () {return view('home');});

// Verification route
Auth::routes(['verify'=>true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

// Login home
// Route::get('/home', function () {
//     return view('dashboard');   
// } )->middleware(['auth', 'verified']);

// Route Admin
Route::middleware(['auth','user-role:admin'])->group(function(){
    Route::get("/admin/home",[HomeController::class, 'adminHome'])
    ->name("admin.home")->middleware(['auth', 'verified']);
});
// Route User
Route::middleware(['auth','user-role:buyer'])->group(function(){
    Route::get("/buyer/home",[HomeController::class, 'buyerHome'])
    ->name("buyer.home")->middleware(['auth', 'verified']);
});
// Route Editor
Route::middleware(['auth','user-role:seller'])->group(function(){
    Route::get("/seller/home",[HomeController::class, 'sellerHome'])
    ->name("seller.home")->middleware(['auth', 'verified']);
    
});
Route::middleware(['auth'])->group(function(){
    Route::get("/search",[UserController::class, 'searchUsers'])
    ->name("search")->middleware(['auth', 'verified']); 
});


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/update_social', [ProfileController::class, 'update_social'])->name('profile.update_social');
});




// Forgot password and Reset password routes
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

