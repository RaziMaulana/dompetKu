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
        // Validasi input
        $validatedData = $request->validate([
            'id' => 'required|exists:kirims,id',
            'nominal' => 'required|numeric|min:1',
            'note' => 'nullable|string',
        ]);

        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Periksa apakah saldo mencukupi
        if ($user->saldo < $validatedData['nominal']) {
            return redirect()->back()->with('error', 'Saldo tidak mencukupi untuk melakukan transfer.');
        }

        // Kurangi saldo pengguna
        $user->saldo -= $validatedData['nominal'];
        $user->save();

        // Simpan data transfer ke tabel `kirims`
        $kirim = Kirim::find($validatedData['id']);
        $kirim->nominal = $validatedData['nominal'];
        $kirim->note = $validatedData['note'];
        $kirim->status = 'pending'; // Status default
        $kirim->save();

        return redirect()->route('kirim-confirmation.index')->with('success', 'Transfer berhasil dilakukan.');
    }
}
