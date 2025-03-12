<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use App\Models\User;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        // Cek apakah pengguna sudah terdaftar
        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            // Jika pengguna belum terdaftar, buat pengguna baru
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'password' => bcrypt(uniqid()), // Buat password acak
            ]);
        }

        // Login pengguna
        Auth::login($user, true);

        return redirect()->intended('/'); // Ganti dengan rute yang sesuai
    }
}
