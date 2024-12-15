<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function get(Request $request): View
    {
        $request->validate([
            'search' => ['required'],
        ]);

        $search_str = '%'.$request->search.'%';
        $search = explode(" ", $search_str);
        $items = Items::where('name', 'like', implode("%, %", $search))->orderBy('id', 'DESC')->get();
        if($items) {
            foreach($items as $item) {
                $files = Storage::disk('public')->files('items/'.$item->id);
                $path = pathinfo($files[0]);
                $item->thumbnail = 'items/'.$item->id.'/'.$path['basename'];
            }
        }
        return view('search', ['search' => $request->search, 'items' => $items]);
    }
}
