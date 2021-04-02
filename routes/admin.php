<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController;
use Illuminate\Support\Facades\Route;


Route::name('admin.')->prefix('admin/')->group(function() {
    Route::get('', [AdminController::class, 'index'])->name('index');
    Route::resource('blog', BlogController::class)->except('show');
});
