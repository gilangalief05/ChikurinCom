<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Items;
use App\Models\User;
use App\Models\UsersPicture;
use App\Models\Wishlists;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ItemsController extends Controller
{
    public function form(Request $request): View
    {
        return view('itemform');
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2000'],
            'category' => ['required', 'string', 'max:255'],
            'picture' => ['required'],
            'picture.*' => ['required', 'image'],
            'stock' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
        ]);

        $item = Items::create([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'stock' => $request->stock,
            'price' => $request->price,
        ]);

        $i = 1;
        $files = $request->picture;

        foreach ($files as $file) {
            $extension = $file->getClientOriginalExtension();
            $file = $file->storeAs('/items/', $item->id.'/'.$i.'.'.$extension, 'public');
            $i++;
        }

        return redirect('/');
    }
    
    public function get(Request $request, $iid): View
    {
        $item = Items::find($iid);
        $files = Storage::disk('public')->files('items/'.$item->id);

        $is_wish = Wishlists::where('item_id', $iid)->where('user_id', Auth::id())->first();

        $comments = Comments::where('item_id', $iid)->get();
        foreach ($comments as $comment) {
            $comment->user_name = User::find($comment->user_id)->name;
            $comment->filename = UsersPicture::find($comment->user_id)->filename;
        }

        $average = Comments::where('item_id', $iid)->groupBy('item_id')->avg('rating');

        return view('iview', ['item' => $item, 'files' => $files, 'average' => $average, 'is_wish' => $is_wish, 'comments' => $comments]);
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'stock' => ['required', 'numeric'],
        ]);

        $item = Items::find($request->iid);
        $item->stock = $request->stock;
        $item->save();

        return redirect()->back();
    }

    public function destroy(Request $request): RedirectResponse
    {
        Storage::disk('public')->deleteDirectory('/items/'.$request->iid);

        $artpost = Items::find($request->iid);
        $artpost->delete();

        return redirect(route('home'));
    }

}
