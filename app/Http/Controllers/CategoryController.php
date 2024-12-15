<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function get(Request $request, $category, $page): View
    {
        $items = null;
        if($category == "all") $items = Items::get();
        else $items = Items::where('category', 'like', $category)->orderBy('id', 'DESC')->get();
        if($items) {
            foreach($items as $item) {
                $files = Storage::disk('public')->files('items/'.$item->id);
                $path = pathinfo($files[0]);
                $item->thumbnail = 'items/'.$item->id.'/'.$path['basename'];
            }
        }

        return view('gview', ['category' => $category, 'items' => $items, 'page' => $page]);
    }
}
