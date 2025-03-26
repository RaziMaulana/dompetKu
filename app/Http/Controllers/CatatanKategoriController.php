<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatatanKategoriController extends Controller
{
    public function index()
    {
        return view('notes.catatan-kategori');
    }
}
