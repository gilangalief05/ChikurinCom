<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\promoCarController;
use App\Http\Controllers\ImageSearchController;
use Psy\Util\Str;

// GET or view
// Home
Route::get('/', [promoCarController::class, 'view_banner']);

// Register
Route::get('/register', function () {
    return view('register');
});

// Login
Route::get('/login', function () {
    return view('login');
});

// Group view
Route::get('/g/{category}', function (string $category) {
    return view('gview');
});

// Promotion
Route::get('/promotion', function () {
    return view('promotion');
});

// Overview
Route::get('/u/{uid}/overview', function (string $uid) {
    return view('uview');
});
Route::get('/u/{uid}', function (string $uid) {
    return redirect('/u/'.$uid.'/overview');
});

// Wishlist
Route::get('/u/{uid}/wishlist', function (string $uid) {
    return view('uwishlist');
});

// Notification
Route::get('/u/{uid}/notification', function (string $uid) {
    return view('unotification');
});

// Item
Route::get('/i/{iid}', function (string $iid) {
    return view('iview');
});

// Image search (optional)
Route::view('/image_search', 'imagesearch');

// POST
Route::post('/image_search', [ImageSearchController::class, 'image_search']);

