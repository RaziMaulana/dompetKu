<?php

namespace App\Http\Controllers\Transfers\TransferMinta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransferMintaController extends Controller
{
    public function TransferMintaIndex(){
        return view('transfers.transfer-minta');
    }

    public function sharePage(){
        return view('transfers.minta.transfer-share');
    }

}
