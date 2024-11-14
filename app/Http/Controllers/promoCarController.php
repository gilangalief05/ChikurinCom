<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class promoCarController extends Controller
{
    public function view_banner() {
        $images = Storage::disk('public')->files('promo_banner');
        return View('home')->with(array('images'=>$images));
    }
}
