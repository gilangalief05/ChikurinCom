<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\UsersPicture;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller 
{
    /**
     * Update the user's user information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('home');
    }

    public function update_photo(Request $request): RedirectResponse
    {
        $user = $request->user();

        $file = UsersPicture::find($request->uid);
        Storage::disk('public')->delete('profile_picture/'.$file->filename);

        $upload = $request->filename;
        $filename = "default.jpg";

        if($request->has('filename')) {
            $extension = $upload->getClientOriginalExtension();
            $filename = $user->id.'.'.$extension;
            $path = $upload->storeAs('profile_picture/', $user->id.'.'.$extension, 'public');
        }

        $file->filename = $filename;
        $file->save();

        return redirect()->back();
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {

        $user = $request->user();

        $filename = UsersPicture::find($user->id)->filename;
        Storage::disk('public')->delete('profile_picture/'.$filename);

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to(route('home'));
    }
}
