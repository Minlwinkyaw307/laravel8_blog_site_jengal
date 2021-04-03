<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('blog.')->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs');
    Route::get('/blog/{slug}', [HomeController::class, 'blog_view'])->name('blog_view');
    Route::post('/blog/{slug}', [HomeController::class, 'store_comment'])->name('store_comment');
});


require __DIR__.'/auth.php';
