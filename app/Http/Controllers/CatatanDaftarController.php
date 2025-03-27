<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use Illuminate\Http\Request;

class CatatanDaftarController extends Controller
{
    public function index()
    {
        $catatans = Catatan::orderBy('created_at', 'desc')->get();

        return view('notes.catatan-daftar', compact('catatans'));
    }
}
