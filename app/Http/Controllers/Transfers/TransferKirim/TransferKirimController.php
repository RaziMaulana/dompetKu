<?php

namespace App\Http\Controllers\Transfers\TransferKirim;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransferKirimController extends Controller
{
    public function TransferKirimIndex(){
        return view('transfers.transfer-kirim');
    }
}
