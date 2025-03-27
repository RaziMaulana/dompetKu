<?php

namespace App\Http\Controllers\Transfers\Transaksi\TopUp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TopupSucceedController extends Controller
{
    public function SucceedIndex(){

        $user = Auth::user();

        return view('transfers.topup.succeed', [
            'user' => $user
        ]);
    }
}
