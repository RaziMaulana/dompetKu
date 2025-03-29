<?php

namespace App\Http\Controllers\Transfers\Transaksi\kirim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\TopUp;
use App\Models\Kirim;

class TransaksiKirimController extends Controller
{
    public function TransaksiKirimIndex()
    {
        // Ambil ID pengguna yang sedang login
        $user_id = Auth::id();

        // Ambil data nominal dari tabel TopUp
        $topUps = TopUp::where('user_id', $user_id)->get();
        $kirim = Kirim::where('user_id', $user_id)->get();

        return view('transfers.kirim.transaksi-kirim', compact('topUps', 'kirim'));
    }

    // Menyimpan atau mengupdate data kirim
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:kirims,id', // Pastikan ID ada di tabel kirims
            'nominal' => 'required|numeric',
            'note' => 'nullable|string',
        ]);

        // Cari baris yang ingin diupdate
        $kirim = Kirim::find($request->id);

        if (!$kirim) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        // Update data
        $kirim->nominal = $request->nominal;
        $kirim->note = $request->note;
        $kirim->save();

        return response()->json(['success' => true]);
    }
}
