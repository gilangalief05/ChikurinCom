<?php

namespace App\Http\Controllers;

use App\Models\UsersBio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersBioController extends Controller
{
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'bio' => ['required', 'string', 'max:2000'],
        ]);

        $user = UsersBio::find(Auth::id());
        $user->bio = $request->bio;
        $user->save();

        return redirect()->back();
    }
}
