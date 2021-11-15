<?php

use App\Http\Controllers\Kagets\CategoryController;
use App\Http\Controllers\Kagets\ChatController;
use App\Http\Controllers\Kagets\ComplaintController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kagets\NewsController;
use App\Http\Controllers\Kagets\DashboardController;
use App\Http\Controllers\Kagets\ProblemController;
use App\Http\Controllers\Kagets\UserController;

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware('auth')->group(function(){
  Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

  // News
  Route::prefix('news')->middleware(['permission:create news'])->group(function(){
    Route::get('create', [NewsController::class,'create'])->name('news.create');
    Route::post('create', [NewsController::class,'store']);

    Route::get('table', [NewsController::class,'table'])->name('news.table');

    Route::get('{news:slug}/edit', [NewsController::class,'edit'])->name('news.edit');
    Route::put('{news:slug}/edit', [NewsController::class,'update']);

    Route::delete('{news:slug}/delete', [NewsController::class,'destroy'])->name('news.delete');

  });

  // Category
  Route::prefix('category')->middleware(['permission:create news'])->group(function(){
    Route::get('create', [CategoryController::class,'create'])->name('category.create');
    Route::post('create', [CategoryController::class,'store']);

    Route::get('table', [CategoryController::class,'table'])->name('category.table');

    Route::get('{category:slug}/edit', [CategoryController::class,'edit'])->name('category.edit');
    Route::put('{category:slug}/edit', [CategoryController::class,'update']);

    Route::delete('{category:slug}/delete', [CategoryController::class,'destroy'])->name('category.delete');

  });

  // Complaint
  Route::prefix('complaint')->middleware(['permission:create complaint'])->group(function(){
    Route::get('create', [ComplaintController::class,'create'])->name('complaint.create');
    Route::post('create', [ComplaintController::class,'store']);

    Route::get('table', [ComplaintController::class,'table'])->name('complaint.table');
    Route::get('{complaint:slug}/show', [ComplaintController::class,'show'])->name('complaint.show');
    Route::post('files/{complaint:slug}', [ComplaintController::class,'files'])->name('complaint.files');

    Route::get('{complaint:slug}/edit', [ComplaintController::class,'edit'])->name('complaint.edit');
    Route::put('{complaint:slug}/edit', [ComplaintController::class,'update']);


    Route::delete('{complaint:slug}/delete', [ComplaintController::class,'destroy'])->name('complaint.delete');

    // Send Message
    Route::get('chat/{complaint:slug}', [ChatController::class, 'create'])->name('chats.create');
    Route::post('chat/{complaint:slug}', [ChatController::class, 'store']);

    Route::delete('chat/{chat:id}/delete', [ChatController::class,'destroy'])->name('chats.delete');
  });

  // Problem
  Route::prefix('problem')->middleware(['permission:create problem'])->group(function(){
    Route::get('create', [ProblemController::class,'create'])->name('problem.create');
    Route::post('create', [ProblemController::class,'store']);

    Route::get('table', [ProblemController::class,'table'])->name('problem.table');

    Route::get('{problem:slug}/edit', [ProblemController::class,'edit'])->name('problem.edit');
    Route::put('{problem:slug}/edit', [ProblemController::class,'update']);

    Route::delete('{problem:slug}/delete', [ProblemController::class,'destroy'])->name('problem.delete');

  });

   // User
   Route::prefix('user')->middleware(['permission:create problem'])->group(function(){
    Route::get('table', [UserController::class,'table'])->name('user.table');

    Route::get('{user:name}/edit', [UserController::class,'edit'])->name('user.edit');
    Route::put('{user:name}/edit', [UserController::class,'update']);

    Route::delete('{user:name}/delete', [UserController::class,'destroy'])->name('user.delete');

  });



});

require __DIR__.'/auth.php';
