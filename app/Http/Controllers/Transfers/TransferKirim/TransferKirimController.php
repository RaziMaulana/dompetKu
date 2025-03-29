<?php

namespace App\Http\Controllers\Transfers\TransferKirim;

use App\Models\Kirim;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransferKirimController extends Controller
{
    public function TransferKirimIndex()
    {
        return view('transfers.transfer-kirim');
    }

    public function saveTransferOption(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'gambar' => 'required|string',
                'dikirim' => 'required|string'
            ]);

            $kirim = new Kirim();
            $kirim->gambar = $validatedData['gambar'];
            $kirim->dikirim = $validatedData['dikirim'];
            $kirim->save();

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
