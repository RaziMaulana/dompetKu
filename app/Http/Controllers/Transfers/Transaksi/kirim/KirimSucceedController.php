<?php

namespace App\Http\Controllers\Transfers\Transaksi\kirim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KirimSucceedController extends Controller
{
    public function KirimSucceedIndex(){

        $user = Auth::user();

        return view('transfers.kirim.Succeed', [
            'user' => $user
        ]);
}
}
