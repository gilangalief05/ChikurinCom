<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/g/1', function () {
    return view('gview');
});

Route::get('/promotion', function () {
    return view('promotion');
});

Route::get('/u/1', function () {
    return view('uview');
});

Route::get('/u/1/wishlist', function () {
    return view('uwishlist');
});

Route::get('/u/1/notification', function () {
    return view('unotification');
});

Route::get('/i/1', function () {
    return view('iview');
});