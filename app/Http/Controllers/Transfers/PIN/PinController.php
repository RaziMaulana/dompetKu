<?php

namespace App\Http\Controllers\Transfers\PIN;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PinController extends Controller
{
    public function showSetPinForm()
    {
        // Pastikan user belum punya PIN
        if (Auth::user()->pin) {
            return redirect()->route('dashboard-new')
                ->with('error', 'Anda sudah memiliki PIN');
        }

        return view('transfers.PIN.pin');
    }

    public function setPin(Request $request)
    {
        // Pastikan hanya user yang login bisa set PIN
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Validasi PIN
        $validator = Validator::make($request->all(), [
            'pin' => [
                'required',
                'numeric',
                'digits:6',
                // Tambahkan aturan kompleksitas PIN
                function ($attribute, $value, $fail) {
                    // Cegah PIN berurutan atau repetitif
                    if (preg_match('/^(.)\1*$/', $value)) {
                        $fail('PIN tidak boleh menggunakan angka berulang');
                    }

                    // Cegah PIN sekuensial
                    $sequentialPatterns = [
                        '123456', '234567', '345678',
                        '456789', '567890', '987654',
                        '876543', '765432', '654321'
                    ];

                    if (in_array($value, $sequentialPatterns)) {
                        $fail('PIN tidak boleh berurutan');
                    }

                    // Hindari PIN dengan pola sederhana lainnya
                    $simplePinPatterns = [
                        '111111', '222222', '333333',
                        '444444', '555555', '666666',
                        '777777', '888888', '999999',
                        '000000'
                    ];

                    if (in_array($value, $simplePinPatterns)) {
                        $fail('PIN terlalu sederhana');
                    }
                }
            ],
            'confirm_pin' => 'required|same:pin'
        ], [
            'pin.required' => 'PIN harus diisi',
            'pin.numeric' => 'PIN harus berupa angka',
            'pin.digits' => 'PIN harus 6 digit',
            'confirm_pin.required' => 'Konfirmasi PIN harus diisi',
            'confirm_pin.same' => 'Konfirmasi PIN tidak sesuai'
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal membuat PIN. Silakan periksa kembali.');
        }

        // Simpan PIN
        $user = Auth::user();

        // Pastikan user belum punya PIN
        if ($user->pin) {
            return redirect()->route('dashboard-new')
                ->with('error', 'Anda sudah memiliki PIN');
        }

        try {
            // Enkripsi PIN dengan Hash
            $user->pin = Hash::make($request->pin);
            $user->save();

            // Log aktivitas
            \Log::info('PIN berhasil dibuat', [
                'user_id' => $user->id,
                'username' => $user->username
            ]);

            // Redirect ke halaman transfer dengan pesan sukses
            return redirect()->route('transfer-kirim.index')
                ->with('success', 'PIN berhasil diatur. Anda dapat melakukan transfer.');

        } catch (\Exception $e) {
            // Log error jika gagal menyimpan
            \Log::error('Gagal membuat PIN', [
                'user_id' => $user->id,
                'error' => $e->getMessage()
            ]);

            // Kembalikan dengan pesan error
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat membuat PIN. Silakan coba lagi.');
        }
    }
}
