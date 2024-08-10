<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\Mahasiswa;

class KamarController extends Controller
{
    public function index()
    {
        $kamars = Kamar::all();
        return view('kamar.index', compact('kamars'));
    }

    public function create()
    {
        // Ambil semua tingkat yang ada di tabel mahasiswas
        $tingkats = Mahasiswa::distinct()->pluck('tingkat');
        return view('kamar.form', compact('tingkats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kamar' => 'required|string|max:255',
            'tingkat' => 'required|string|max:255',
        ]);

        Kamar::create($request->all());

        return redirect()->route('kamar.index');
    }

    public function edit($id)
    {
        $kamar = Kamar::findOrFail($id);
        $tingkats = Mahasiswa::distinct()->pluck('tingkat'); 

        return view('kamar.edit', compact('kamar', 'tingkats'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kamar' => 'required|string|max:255',
            'tingkat' => 'required|string|max:255',
        ]);

        $kamar = Kamar::findOrFail($id);
        $kamar->update($request->all());

        return redirect()->route('kamar.index');
    }

    public function destroy($id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();

        return redirect()->route('kamar.index');
    }
}
