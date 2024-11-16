<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\promoCarController;
use App\Http\Controllers\ImageSearchController;
use Psy\Util\Str;

// php artisan serve --host=www.chikurincom.net
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
Route::get('/g/{category}/{page}', function (string $category, string $page) {
    return view('gview', ['category' => $category, 'page' => $page]);
})->whereIn('category', ['all', 'monitor', 'laptop', 'mobile', 'pc'])->whereNumber('page');

Route::get('/g/{category}', function (string $category) {
    return redirect('/g/'.$category.'/1');
});

// Promotion
Route::get('/promotion/{promo_id}', function (string $promo_id) {
    return view('promotion');
});

Route::get('/promotion', function () {
    return view('promotion');
});

// Profile - Overview
Route::get('/u/{uid}', function (string $uid) {
    return redirect('/u/'.$uid.'/overview');
});

// Profile {other}
Route::get('/u/{uid}/{menu}', function (string $uid, string $menu) {
    $menu_list = ['overview', 'comments', 'notifications', 'wishlists', 'carts', 'buy_history'];
    $menu_name_list = ['Overview', 'Komentar', 'Notifikasi', 'Wishlist', 'Keranjang', 'Riwayat Pembelian'];
    return view($menu, ['menu' => $menu, 'menu_list' => $menu_list, 'menu_name_list' => $menu_name_list]);
})->whereIn('menu', ['overview', 'comments', 'notifications', 'wishlists', 'carts', 'buy_history']);

// Profile - Edit
Route::get('/u/{uid}/edit_user', function (string $uid) {
    return view('edituser');
});

// Item
Route::get('/i/{iid}', function (string $iid) {
    return view('iview');
});

// Image search (optional)
Route::view('/image_search', 'imagesearch');

// POST
Route::post('/image_search', [ImageSearchController::class, 'image_search']);

