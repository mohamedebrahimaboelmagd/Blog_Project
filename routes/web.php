<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Theme Routs
Route::controller(ThemeController::class)->name('theme.')->group(function () {
    Route::get("/", 'index')->name('index');
    Route::get("/category/{id}", 'category')->name('category');
    Route::get("/contact", 'contact')->name('contact');
});

// Subscribers Routes
Route::post('/subscriber/store', [SubscriberController::class, 'store'])->name('subscriber.store');
Route::post('/subscriber/store-footer', [SubscriberController::class, 'storeFooter'])->name('subscriber.store.footer');

// Contact Route
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');


Route::resource('blogs', BlogController::class)->middleware('auth');
// Comment Route
Route::post('/comment/store', [CommentController::class, 'store'])->name('comments.store');


require __DIR__ . '/auth.php';
