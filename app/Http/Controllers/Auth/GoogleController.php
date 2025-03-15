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
        try {
            $googleUser = Socialite::driver('google')->user();

            // Cek apakah pengguna sudah terdaftar
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                // Jika pengguna sudah terdaftar, langsung login
                Auth::login($user, true);
                return redirect()->intended('/'); // Ganti dengan rute yang sesuai
            } else {
                // Jika pengguna belum terdaftar, simpan data Google ke session dan tampilkan form telepon
                session([
                    'google_id' => $googleUser->getId(),
                    'google_name' => $googleUser->getName(),
                    'google_email' => $googleUser->getEmail(),
                    'google_avatar' => $googleUser->getAvatar(),
                    'needs_phone' => true
                ]);

                return redirect()->route('login')->with('show_phone_modal', true);
            }
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['google' => 'Gagal login menggunakan Google. Silakan coba lagi.']);
        }
    }

    /**
     * Menyimpan pengguna baru dengan data Google dan nomor telepon
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeGoogleUserWithPhone(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|max:15|unique:users,phone'
        ]);

        // Buat pengguna baru dengan data Google dari session
        $user = User::create([
            'name' => session('google_name'),
            'email' => session('google_email'),
            'google_id' => session('google_id'),
            'avatar' => session('google_avatar'),
            'phone' => $request->phone,
            'password' => bcrypt(uniqid()), // Buat password acak sesuai dengan kode asli Anda
        ]);

        // Hapus data session
        $request->session()->forget(['google_id', 'google_name', 'google_email', 'google_avatar', 'needs_phone']);

        // Login pengguna
        Auth::login($user, true);

        return redirect()->intended('/');
    }
}
