<?php

namespace App\Http\Controllers\Transfers\TransferTopUp;

use App\Models\TopUp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TransferTopUpController extends Controller
{
    public function TransferTopUpIndex(){
        $user = Auth::user();
        if (!$user->pin) {
            return Redirect::route('set-pin')
                ->with('error', 'Anda harus mengatur PIN terlebih dahulu untuk melakukan transfer');
        }

        return view('transfers.transfer-topup');
    }

    public function TransaksiTopUp(){
        return view('transfers.topup.transaksi-topup');
    }

    public function PilihMetodeTopUp(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'icon' => 'required|string',
        ]);

        $user = Auth::user();

        // Cari atau buat entri TopUp yang belum memiliki nominal
        $topUp = TopUp::where('user_id', $user->id)
            ->whereNull('nominal')
            ->first();

        if (!$topUp) {
            // Jika tidak ada entri yang belum memiliki nominal, buat baru
            $topUp = new TopUp();
        }

        // Update data TopUp
        $topUp->metode = $request->nama;
        $topUp->metode_image = $request->icon;
        $topUp->tujuan = $user->name;
        $topUp->user_id = $user->id;
        $topUp->save();

        // Simpan data ke session
        session([
            'metode_topup' => [
                'nama' => $request->nama,
                'icon' => $request->icon,
            ]
        ]);

        return redirect()->route('transaksi-topup');
    }


}
