<?php

use App\Http\Controllers\ImageSearchController;
use App\Http\Controllers\promoCarController;
use App\Models\User;
use App\Models\UsersPicture;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return ['Laravel' => app()->version()];
// });

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

// Promotion (sementara belum ada)
Route::get('/promotion/{promo_id}', function (string $promo_id) {
    return view('promotion');
});

Route::get('/promotion', function () {
    return view('promotion');
});

// Profile - Overview
Route::get('/u/{uid}', function (string $uid) {
    return redirect('/u/'.$uid.'/overview');
})->whereNumber('uid');

// Profile {other}
Route::get('/u/{uid}/{menu}', function (string $uid, string $menu) {
    $menu_list = ['overview', 'comments', 'notifications', 'wishlists', 'carts', 'buy_history'];
    $menu_name_list = ['Overview', 'Komentar', 'Notifikasi', 'Wishlist', 'Keranjang', 'Riwayat Pembelian'];
    $uname = User::where('id', $uid)->first();
    $filename = UsersPicture::where('user_id', $uid)->first();
    return view($menu, ['menu' => $menu, 'menu_list' => $menu_list, 'menu_name_list' => $menu_name_list, 'uid' => $uid, 'uname' => $uname->name, 'filename' => $filename->filename]);
})->whereIn('menu', ['overview', 'comments', 'notifications', 'wishlists', 'carts', 'buy_history'])->whereNumber('uid');

// Profile - Edit
Route::get('/u/{uid}/edit_user', function (string $uid) {
    if(Auth::id() != $uid) {
        abort(403);
    }
    return view('edituname', ['name' => Auth::user()->name, 'uid' => Auth::id(), 'email' => Auth::user()->email]);
})->whereNumber('uid');

// Item
Route::get('/i/{iid}', function (string $iid) {
    return view('iview');
})->whereNumber('iid');

// Image search (optional)
Route::get('/image_search', function(){
    return view('imagesearch');
});

// POST
Route::post('/image_search', [ImageSearchController::class, 'image_search']);

require __DIR__.'/auth.php';
