<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use Illuminate\Http\Request;

class CatatanController extends Controller
{
    public function index()
    {
        return view('notes.catatan-dashboard');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'type_transaction' => 'required|string',
            'category' => 'required|string',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        Catatan::create([
            'date' => $request->date,
            'type_transaction' => $request->type_transaction,
            'category' => $request->category,
            'amount' => $request->amount,
            'description' => $request->description,
        ]);

        return redirect()->route('catatan.index')->with('success', 'Catatan berhasil ditambahkan!');
    }

}
