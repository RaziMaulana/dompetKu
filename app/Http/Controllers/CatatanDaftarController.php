<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatatanDaftarController extends Controller
{
    public function index()
    {
        return view('notes.catatan-daftar');
    }
}
