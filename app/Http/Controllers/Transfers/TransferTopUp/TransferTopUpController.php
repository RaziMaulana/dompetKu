<?php

namespace App\Http\Controllers\Transfers\TransferTopUp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TransferTopUpController extends Controller
{
    public function TransferTopUpIndex(){

        $user = Auth::user();
        if (!$user->pin) {
            // Jika tidak punya PIN, arahkan ke halaman set PIN
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
            'nomor' => 'required|string',
        ]);

        session([
            'metode_topup' => [
                'nama' => $request->nama,
                'icon' => $request->icon,
                'nomor' => $request->nomor,
            ]
        ]);

        return redirect()->route('transaksi-topup');
    }


}
