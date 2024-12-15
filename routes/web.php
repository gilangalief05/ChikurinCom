<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageSearchController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\WishlistsController;
use App\Models\Wishlists;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return ['Laravel' => app()->version()];
// });

// GET or view
// Home
Route::get('/', [HomeController::class, 'view'])->name('home');

// Register
Route::get('/register', function () {
    return view('register');
})->middleware('guest')->name('get.register');

// Login
Route::get('/login', function () {
    return view('login');
})->middleware('guest')->name('get.login');

// Group view
Route::get('/g/{category}/{page}', [CategoryController::class, 'get'])->whereIn('category', ['all', 'monitor', 'laptop', 'mobile', 'pc'])->whereNumber('page');

Route::get('/g/{category}', function (string $category) {
    return redirect('/g/'.$category.'/1');
})->name('item.category');

// Promotion (sementara belum ada)
Route::get('/promotion', function () {
    return view('promotion');
});

// Profile - Overview
Route::get('/u/{uid}', function (string $uid) {
    return redirect('/u/'.$uid.'/overview');
})->whereNumber('uid');

// Profile - Guest
Route::get('/u/{uid}/overview', [UserProfileController::class, 'overview'])->whereNumber('uid')->name('user.overview');
Route::get('/u/{uid}/comments', [UserProfileController::class, 'comments'])->whereNumber('uid')->name('user.comments');

// Profile - Auth
Route::middleware('user')->group(function () {
    Route::get('/u/{uid}/notifications', [UserProfileController::class, 'notifications'])->whereNumber('uid')->name('user.notifications');
    Route::get('/u/{uid}/wishlists', [UserProfileController::class, 'wishlists'])->whereNumber('uid')->name('user.wishlists');
    Route::get('/u/{uid}/buy_history', [UserProfileController::class, 'buy_history'])->whereNumber('uid')->name('user.buy_history');
});

// Profile - Edit
Route::get('/edit_user', [ProfileController::class, 'edit'])->middleware('auth')->name('user.edit');
Route::patch('/edit_user_photo', [ProfileController::class, 'update_photo'])->middleware('auth')->name('user_photo.update');

// Post Item
Route::middleware('admin')->group(function () {
    Route::get('/item', [ItemsController::class, 'form'])->name('item.form');
    Route::post('/item', [ItemsController::class, 'store'])->name('item.store');
    Route::patch('/item', [ItemsController::class, 'update'])->name('item.update');
    Route::delete('/item', [ItemsController::class, 'destroy'])->name('item.delete');
});

// Wishlist
Route::middleware('auth')->group(function () {
    Route::post('/wishlist', [WishlistsController::class, 'store'])->name('wishlist.store');
    Route::delete('/wishlist', [WishlistsController::class, 'destroy'])->name('wishlist.delete');
});

// Transaction
Route::middleware('admin')->group(function () {
    Route::get('/transaction', [TransactionsController::class, 'view'])->name('transaction.list');
    Route::patch('/transaction', [TransactionsController::class, 'update'])->name('transaction.update');
});

Route::post('/transaction', [TransactionsController::class, 'store'])->middleware('auth')->name('transaction.store');

// Comment
Route::middleware('auth')->group(function () {
    Route::post('/comment', [CommentsController::class, 'store'])->name('comment.store');
    Route::delete('/comment', [CommentsController::class, 'destroy'])->name('comment.delete');
});

// Item
Route::get('/i/{iid}', [ItemsController::class, 'get'])->whereNumber('iid')->name('item.view');

// Text Search
Route::get('/search', [SearchController::class, 'get'])->name('search.get');

// Image search (optional)
Route::view('/image_search', 'imagesearch')->name('image_search.form');

// POST
Route::post('/image_search', [ImageSearchController::class, 'image_search'])->name('image_search.upload');

require __DIR__.'/auth.php';
