<?php

namespace App\Http\Controllers\Transfers\Transaksi\kirim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Kirim;

class KirimConfirmationController extends Controller
{
    public function KirimConfirmationIndex()
    {

        $user_id = Auth::id();

        $kirim = Kirim::where('user_id', $user_id)->get();

        return view('transfers.kirim.confirmation', compact('kirim'));
    }

    public function FillStatus(Request $request)
    {
        $kirim = Kirim::find($request->id);

        if ($kirim) {
            $kirim->status = 'Berhasil';
            $kirim->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

}
