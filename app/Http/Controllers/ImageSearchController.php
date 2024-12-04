<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageSearchController extends Controller
{
    public function image_search (Request $request) {
        $path = $request->file('image_for_search')->store('/image_search', 'public');
        return view('imagesearchresult', ['image_search_name' => $path, 'category' => '...']);
    }
}
