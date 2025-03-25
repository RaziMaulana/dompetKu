<?php

namespace App\Http\Controllers\Transfers\TransferTopUp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransferTopUpController extends Controller
{
    public function TransferTopUpIndex(){
        return view('transfers.transfer-topup');
    }
}
