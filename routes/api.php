<?php

use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\PostController;
use App\Http\Controllers\Api\V1\HelpController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - V1
|--------------------------------------------------------------------------
*/

Route::prefix('v1')->group(function () {
    
    // Public Routes
    Route::post('/auth/login', [AuthController::class, 'login']);
    Route::get('/posts', [PostController::class, 'index']); // جعل عرض المفقودات عاماً لمزامنته مع الموقع
    Route::post('/posts', [PostController::class, 'store']);
    Route::post('/helps', [HelpController::class, 'store']);

    // Protected Routes (Sanctum)
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/auth/me', [AuthController::class, 'me']);
        Route::post('/auth/logout', [AuthController::class, 'logout']);
        
        // Admin-like Routes (Listing & Actions)
        Route::post('/posts/{id}/toggle-delivery', [PostController::class, 'toggleDelivery']);
        Route::delete('/posts/{id}', [PostController::class, 'destroy']); // حذف مفقود
        
        Route::get('/helps', [HelpController::class, 'index']);
        Route::post('/helps/{id}/toggle-delivery', [HelpController::class, 'toggleDelivery']); // تغيير حالة المحصول
        Route::delete('/helps/{id}', [HelpController::class, 'destroy']); // حذف محصول
    });
});
