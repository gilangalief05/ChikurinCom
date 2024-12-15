<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function view(Request $request): View
    {
        $promo = Storage::disk('public')->files('promo_banner');

        $items = Items::orderBy('id', 'DESC')->limit(10)->get();
        if($items) {
            foreach($items as $item) {
                $files = Storage::disk('public')->files('items/'.$item->id);
                $path = pathinfo($files[0]);
                $item->thumbnail = 'items/'.$item->id.'/'.$path['basename'];
            }
        }

        return View('home', ['promo' => $promo, 'items' => $items]);
    }
}
