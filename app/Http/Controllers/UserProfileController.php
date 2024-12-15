<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Items;
use App\Models\Transactions;
use App\Models\User;
use App\Models\UsersBio;
use App\Models\UsersPicture;
use App\Models\Wishlists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class UserProfileController extends Controller
{
    private $menu_list = ['overview', 'comments', 'notifications', 'wishlists', 'buy_history'];
    private $menu_name_list = ['Overview', 'Komentar', 'Notifikasi', 'Wishlist', 'Riwayat Pembelian'];

    public function overview(Request $request, $uid): View
    {
        $user = User::find($uid);
        $bio = UsersBio::find($uid)->bio;
        $user->filename = UsersPicture::find($user->id)->filename;
        return view('overview', ['menu' => 'overview', 'menu_list' => $this->menu_list, 'menu_name_list' => $this->menu_name_list, 'user' => $user, 'bio' => $bio]);
    }

    public function comments(Request $request, $uid): View
    {
        $user = User::find($uid);
        $bio = UsersBio::find($uid)->bio;
        $user->filename = UsersPicture::find($user->id)->filename;

        $comments = Comments::where('user_id', $uid)->get();
        foreach ($comments as $comment) {
            $comment->item_name = Items::find($comment->item_id)->name;
            $comment->filename = UsersPicture::find($comment->user_id)->filename;
        }

        return view('comments', ['menu' => 'comments', 'menu_list' => $this->menu_list, 'menu_name_list' => $this->menu_name_list, 'user' => $user, 'bio' => $bio, 'comments' => $comments]);
    }

    public function notifications(Request $request, $uid): View
    {
        $user = User::find($uid);
        $bio = UsersBio::find($uid)->bio;
        $user->filename = UsersPicture::find($user->id)->filename;
        return view('notifications', ['menu' => 'notifications', 'menu_list' => $this->menu_list, 'menu_name_list' => $this->menu_name_list, 'user' => $user, 'bio' => $bio]);
    }

    public function wishlists(Request $request, $uid): View
    {
        $user = User::find($uid);
        $bio = UsersBio::find($uid)->bio;
        $user->filename = UsersPicture::find($user->id)->filename;

        $wishlists = Wishlists::join('items', 'items.id', '=', 'wishlists.item_id')->where('user_id', $uid)->get();

        if($wishlists) {
            foreach($wishlists as $wishlist) {
                $files = Storage::disk('public')->files('items/'.$wishlist->item_id);
                $path = pathinfo($files[0]);
                $wishlist->thumbnail = 'items/'.$wishlist->item_id.'/'.$path['basename'];
            }
        }

        return view('wishlists', ['menu' => 'wishlists', 'menu_list' => $this->menu_list, 'menu_name_list' => $this->menu_name_list, 'user' => $user, 'bio' => $bio, 'wishlists' => $wishlists]);
    }

    public function buy_history(Request $request, $uid): View
    {
        $user = User::find($uid);
        $bio = UsersBio::find($uid)->bio;
        $user->filename = UsersPicture::find($user->id)->filename;

        $buy_histories = Transactions::join('items', 'items.id', '=', 'transactions.item_id')->where('user_id', $uid)->get();

        if($buy_histories) {
            foreach($buy_histories as $buy_history) {
                $files = Storage::disk('public')->files('items/'.$buy_history->item_id);
                $path = pathinfo($files[0]);
                $buy_history->thumbnail = 'items/'.$buy_history->item_id.'/'.$path['basename'];
            }
        }

        return view('buy_history', ['menu' => 'buy_history', 'menu_list' => $this->menu_list, 'menu_name_list' => $this->menu_name_list, 'user' => $user, 'bio' => $bio, 'buy_histories' => $buy_histories]);
    }
}
