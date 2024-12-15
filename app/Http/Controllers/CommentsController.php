<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'rating' => ['required', 'numeric'],
            'comment' => ['string', 'max:255'],
        ]);

        $comment = Comments::create([
            'rating' => $request->rating,
            'comment' => $request->comment,
            'user_id' => Auth::id(),
            'item_id' => $request->iid,
        ]);

        return redirect()->back();
    }
    public function destroy(Request $request): RedirectResponse
    {

        $comment = Comments::find($request->cid);
        $comment->delete();

        return redirect()->back();
    }
}
