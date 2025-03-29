<?php

namespace App\Http\Controllers\Transfers\Transaksi\kirim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransaksiKirimController extends Controller
{
    public function TransaksiKirimIndex(){
        return view('transfers.kirim.transaksi-kirim');
    }
}
