<?php

namespace App\Http\Controllers\Transfers\Transaksi\TopUp;

use App\Models\User;
use App\Models\TopUp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CheckPinController extends Controller
{
    public function CheckPinIndex(){
        return view('transfers.topup.check-pin');
    }

    public function verifyPin(Request $request)
    {
        // Validate the PIN input
        $request->validate([
            'pin' => 'required|digits:6'
        ]);

        // Get the currently authenticated user
        $user = Auth::user();

        // Check if the entered PIN matches the user's stored PIN
        if ($user->pin && Hash::check($request->pin, $user->pin)) {
            // Find or create TopUp record for the user
            $topUp = TopUp::firstOrNew([
                'user_id' => $user->id
            ]);

            // Copy the PIN from user table to TopUp table
            $topUp->pin = $user->pin;
            $topUp->save();

            // Redirect to the next page (replace with your actual route)
            return redirect()->route('topup-succeed.index')->with('success', 'PIN berhasil diverifikasi');
        } else {
            // PIN is incorrect
            return back()->with('error', 'PIN yang Anda masukkan salah');
        }
    }
}
