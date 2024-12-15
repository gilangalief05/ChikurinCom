<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UsersBio;
use App\Models\UsersPicture;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'profile_picture' => ['nullable', 'image'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->string('password')),
        ]);

        event(new Registered($user));

        Auth::login($user);

        $file = $request->profile_picture;
        $filename = "default.jpg";

        if($request->has('profile_picture')) {
            $extension = $file->getClientOriginalExtension();
            $filename = $user->id.'.'.$extension;
            $path = $file->storeAs('profile_picture/', $user->id.'.'.$extension, 'public');
        }
        $profile_picture = UsersPicture::create([
            'user_id' => $user->id,
            'filename' => $filename,
        ]);

        $user_bio = UsersBio::create([
            'user_id' => $user->id,
        ]);

        return redirect('/');
    }
}
