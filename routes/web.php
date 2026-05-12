<?php
// use App\Http\Controllers;
// use App\Http\Controllers\usercontroller;
// use Illuminate\Auth\Events\Login;

use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\HelpController;
use Illuminate\Support\Facades\Route;



Route::get('/', function (\App\Services\PostService $postService) {
    $posts = $postService->getAllPosts();
    return view('index', compact('posts'));
})->name('index');;

Route::get('/about', function () {
    return view('about');
});



Route::get('/contact',[PostController::class, 'create']);
Route::post('/contact',[PostController::class, 'store']);

// Help Routes
Route::get('/help', [HelpController::class, 'create']);
Route::post('/help', [HelpController::class, 'store']);

Route::get('/dashboard', [usercontroller::class,'dash'])->name('dashboard');

Route::get('/layout-static', [PostController::class,'desblay'])->name('layout-static');

// Delivery Status Route
Route::post('/admin/posts/{id}/toggle-delivery', [PostController::class, 'toggleDelivery'])->name('posts.toggle-delivery');

Route::get('/layout-sidenav-light', [HelpController::class,'gaza'])->name('layout-sidenav-light');
Route::post('/admin/helps/{id}/toggle-delivery', [HelpController::class, 'toggleDelivery'])->name('helps.toggle-delivery');

// Authentication Routes (Placeholder - typically handled by Laravel Breeze/Jetstream or custom auth)
Route::get('/login', [LoginController::class,'create'])->name('login');
Route::post('/login',[LoginController::class, 'authenticate']);
Route::get('/accountlogin', [usercontroller::class,'create'])->name('accountlogin');
Route::post('/accountlogin', [usercontroller::class,'store']);


Route::get('/password/reset', function () {
    return view('auth.password');
})->name('password.reset');

Route::post('/password/email', function () {
    // Handle password reset email logic here, for now just redirect
    return redirect()->route('login')->with('status', 'We have emailed your password reset link!');
})->name('password.email');

// Tables Route


// Logout Route (Placeholder)
Route::post('/logout', function () {
    // Handle logout logic here, for now just redirect
    return redirect()->route('login');
})->name('logout');



Route::fallback(function(){
return "not fond page";

});



