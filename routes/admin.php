<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogCommentController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogStatusController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\SiteConfigController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AdminController::class, 'login'])->name('admin.login');
Route::post('login', [AdminController::class, 'post_login'])->name('admin.post_login');
Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::name('admin.')->middleware(['web', 'auth'])->prefix('admin/')->group(function() {
    Route::get('', [AdminController::class, 'index'])->name('index');
    Route::resource('blog', BlogController::class)->except('show');
    Route::resource('category', CategoryController::class)->except('show');
    Route::resource('blog-status', BlogStatusController::class)->except('show');
    Route::resource('blog-comment', BlogCommentController::class)->except('show');
    Route::resource('site-config', SiteConfigController::class)->except('index', 'show', 'store', 'create');
    Route::resource('contact-message', ContactMessageController::class)->except('edit', 'update', 'store', 'create');
});
