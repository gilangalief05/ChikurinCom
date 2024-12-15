<?php

namespace App\Http\Controllers;

use App\Models\Wishlists;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistsController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $wishlist = Wishlists::create([
            'user_id' => Auth::id(),
            'item_id' => $request->iid,
        ]);

        return redirect()->back();
    }

    public function destroy(Request $request): RedirectResponse
    {
        $wishlist = Wishlists::where('item_id', $request->iid)->where('user_id', Auth::id());
        $wishlist->delete();

        return redirect()->back();
    }
}
