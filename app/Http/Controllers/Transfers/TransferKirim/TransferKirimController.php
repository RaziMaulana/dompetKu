<?php

namespace App\Http\Controllers\Transfers\TransferKirim;

use App\Models\Kirim;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransferKirimController extends Controller
{
    public function TransferKirimIndex()
    {
        return view('transfers.transfer-kirim');
    }

    public function saveTransferOption(Request $request)
    {
        try {
            // Validasi input
            $validatedData = $request->validate([
                'gambar' => 'required|string',
                'dikirim' => 'required|string'
            ]);

            // Cari data berdasarkan user_id
            $kirim = Kirim::where('user_id', Auth::id())->first();

            // Jika data ditemukan, update data tersebut
            if ($kirim) {
                $kirim->gambar = $validatedData['gambar'];
                $kirim->dikirim = $validatedData['dikirim'];
                $kirim->save();
            } else {
                // Jika tidak ada data yang sesuai, buat data baru
                $kirim = new Kirim();
                $kirim->gambar = $validatedData['gambar'];
                $kirim->dikirim = $validatedData['dikirim'];
                $kirim->user_id = Auth::id();
                $kirim->save();
            }

            return response()->json([
                'success' => true,
                'message' => 'Transfer option saved successfully'
            ]);
        } catch (\Exception $e) {
            \Log::error('Transfer Option Save Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error saving transfer option',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
