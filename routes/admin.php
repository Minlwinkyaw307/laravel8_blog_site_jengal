<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogStatusController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;


Route::name('admin.')->prefix('admin/')->group(function() {
    Route::get('', [AdminController::class, 'index'])->name('index');
    Route::resource('blog', BlogController::class)->except('show');
    Route::resource('category', CategoryController::class)->except('show');
    Route::resource('blog-status', BlogStatusController::class)->except('show');
});
