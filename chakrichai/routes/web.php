<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\ForgotPasswordManager;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\UserRoleMiddleware;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\LikesController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home route


// Verification route
Auth::routes(['verify'=>true]);
Route::get('/', function () {return view('home');});


// Route::get('/chatify', function (){return view('vendor/Chatify/pages/app');})->name('chatify');

Route::group(['middleware' => ['guest']], function () {
    //only guests can access these routes
    Route::get('/', [HomeController::class, 'index'])->name('home');
});

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
    //Complain routes
    Route::get('/complain', [ComplainController::class, 'index'])
         ->name('complain.index');
    Route::delete('/complain/{post}', [ComplainController::class, 'destroy'])
         ->name('complain.destroy');

});

// Route User
Route::middleware(['auth','user-role:buyer'])->group(function(){
    Route::get("/buyer/home",[HomeController::class, 'buyerHome'])
        ->name("buyer.home")->middleware(['auth', 'verified']);
});

// Route Seller
Route::middleware(['auth','user-role:seller'])->group(function(){
    Route::get("/seller/home",[HomeController::class, 'sellerHome'])
        ->name("seller.home")->middleware(['auth', 'verified']);
});


Route::middleware(['auth'])->group(function(){
    // Search user routes
    Route::get("/search",[UserController::class, 'searchUsers'])
        ->name("search")->middleware(['auth', 'verified']);
    Route::get("/search/{num}",[UserController::class, 'filterUsers'])
        ->name("search.filter");
    Route::post('/rating', [UserController::class, 'rating'])
        ->name('rating');

    // Send complaints
    Route::post('/complain', [ComplainController::class, 'store'])
        ->name('complain.store');
});

// Profile routes
Route::middleware(['auth'])->group(function () {

    Route::get('/profile/{slug}', [ProfileController::class, 'show'])
        ->name('profile.show');

    Route::get('/profile/edit/{slug}', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::post('/profile/update', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::get('/profile/edit_bio/{slug}', [ProfileController::class, 'edit_bio'])
        ->name('profile.edit_bio');
    Route::post('/profile/update_bio', [ProfileController::class, 'update_bio'])
        ->name('profile.update_bio');

    Route::get('/profile/edit_social/{slug}', [ProfileController::class, 'edit_social'])
        ->name('profile.edit_social');
    Route::post('/profile/update_social', [ProfileController::class, 'update_social'])
        ->name('profile.update_social');

    Route::get('/profile/edit_active_status/{slug}', [ProfileController::class, 'edit_active_status'])
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
Route::get('auth/google/create', [GoogleAuthController::class, 'google_create'])
    ->name('googlecreate');

// Job Post routes
Route::middleware(['auth'])->group(function () {
    Route::get('/posts', [PostController::class, 'index'])
        ->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])
        ->name('posts.create');
    Route::get("/posts/searchposts",[PostController::class, 'searchPosts'])
        ->name("posts.searchposts");
        Route::get("/posts/{filter}",[PostController::class, 'tagFilter'])
        ->name("posts.filter");
    Route::post('/posts', [PostController::class, 'store'])
        ->name('posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])
        ->name('posts.show');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
        ->name('posts.edit');
    Route::post('/posts/{post}', [PostController::class, 'update'])
        ->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])
        ->name('posts.destroy');
    Route::get('/posts/resume/{photo_path}',  [PostController::class, 'getpostimg'])
       ->name('posts.getpostimg');

});

// Job Application routes
Route::middleware(['auth'])->group(function () {
    Route::get('/applications/create', [ApplicationController::class, 'create'])
        ->name('applications.create');
    Route::post('/applications', [ApplicationController::class, 'store'])
        ->name('applications.store');
    Route::get('/applications/{application}', [ApplicationController::class, 'show'])
        ->name('applications.show');
    Route::post('/applications/{application}', [ApplicationController::class, 'updatestatus'])
        ->name('applications.updatestatus');
    Route::delete('/applications/{post}', [ApplicationController::class, 'destroy'])
        ->name('applications.destroy');
    Route::get('/applications/resume/{resume}',  [ApplicationController::class, 'getresume'])
    ->name('applications.getresume');
});
        
// Comment routes

Route::middleware(['auth'])->group(function () {
    Route::get('/comments', [CommentsController::class, 'store'])
        ->name('comments.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/likes', [LikesController::class, 'control'])
        ->name('likes.controller');
});

