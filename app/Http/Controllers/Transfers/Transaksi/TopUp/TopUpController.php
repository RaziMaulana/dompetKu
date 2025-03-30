<?php

namespace App\Http\Controllers\Transfers\Transaksi\TopUp;

use App\Models\TopUp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TopUpController extends Controller
{
    public function TopUpTransactionIndex(){
        return view('transfers.topup.transaksi-topup');
    }

    public function TopUpTransactionStore(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nominal' => 'required|numeric|min:1',
        ]);

        // Find an existing incomplete top-up for the user
        // dd($request->all());

        $formattedNominal = number_format($validatedData['nominal'], 0, ',', '.');

        $existingTopUp = TopUp::where('user_id', Auth::id())
            ->whereNull('pin')
            ->first();

        if ($existingTopUp) {
            // Update existing incomplete top-up
            $existingTopUp->nominal = $formattedNominal;
            $existingTopUp->save();

            return redirect()->route('check-pin.index')->with([
                'success' => 'Top up berhasil',
                'topup_id' => $existingTopUp->id
            ]);
        }

        // Create a new TopUp record if no incomplete top-up exists
        $topup = new TopUp();
        $topup->user_id = Auth::id();
        $topup->nominal = $formattedNominal;
        $topup->save();

        // Redirect to pin check
        return redirect()->route('check-pin.index')->with([
            'success' => 'Top up berhasil',
            'topup_id' => $topup->id
        ]);
    }
}
