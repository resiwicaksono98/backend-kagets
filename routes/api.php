<?php

use App\Models\Complaint;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\MeController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\ProblemController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ComplaintController;
use App\Http\Controllers\API\DashboardController;
use App\Http\Controllers\API\UserController;

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/me', [MeController::class, '__invoke']);
    Route::post('/me/{user:id}', [MeController::class, 'update']);
    Route::post('/me/{user:id}/update-image-profile', [MeController::class, 'uploadImage']);
    Route::get('/problem', [ProblemController::class, 'index']);
    // Route::get('/user', [UserController::class, 'index']);

});
Route::apiResource('/complaint', \App\Http\Controllers\API\ComplaintController::class);    

Route::post('/complaint/{complaint:slug}/upload-image', [ComplaintController::class, 'uploadImage']);
Route::get('/dashboard/{complaint:user_id}',  [DashboardController::class, 'index']);
Route::get('/dashboard/detail/{complaint:slug}',  [DashboardController::class, 'show']);

Route::prefix('news')->group(function() {
    Route::get('', [NewsController::class, 'index']);
    Route::get('{news:slug}', [NewsController::class, 'show']);
    
});
Route::get('/category', [CategoryController::class, 'index']);
