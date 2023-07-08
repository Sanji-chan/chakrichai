<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordManager;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\UserRoleMiddleware;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home route


// Verification route
Auth::routes(['verify'=>true]);
Route::get('/', function () {return view('home');});

// 2FA
Route::middleware(['2fa'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/2fa', function () {
        return redirect(route('home'));
    })->name('2fa');
});
  
Route::get('/complete-registration', [RegisterController::class, 'completeRegistration'])
    ->name('complete.registration');

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

// Profile routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])
        ->name('profile.show');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::get('/profile/edit_bio', [ProfileController::class, 'edit_bio'])
        ->name('profile.edit_bio');
    Route::post('/profile/update_bio', [ProfileController::class, 'update_bio'])
        ->name('profile.update_bio');

    Route::get('/profile/edit_social', [ProfileController::class, 'edit_social'])
        ->name('profile.edit_social');
    Route::post('/profile/update_social', [ProfileController::class, 'update_social'])
        ->name('profile.update_social');

    Route::get('/profile/edit_active_status', [ProfileController::class, 'edit_active_status'])
        ->name('profile.edit_active_status');
    Route::post('/profile/update_active_status', [ProfileController::class, 'update_active_status'])
        ->name('profile.update_active_status');
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
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])
    ->name('googleAuth');
Route::get('auth/google/callback', [GoogleAuthController::class, 'callbackgoogle'])
    ->name('callbackGoogle');

