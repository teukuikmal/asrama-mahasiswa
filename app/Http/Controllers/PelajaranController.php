<?php

namespace App\Http\Controllers;

use App\Models\Pelajaran;
use App\Models\Pengajar; // Tambahkan ini
use App\Models\Mahasiswa; // Tambahkan ini
use Illuminate\Http\Request;

class PelajaranController extends Controller
{
    public function index()
    {
        $pelajarans = Pelajaran::all();
        return view('pelajaran.index', compact('pelajarans'));
    }

    public function create()
    {
        $pengajars = Pengajar::all();
        $tingkats = Mahasiswa::distinct()->pluck('tingkat');
        return view('pelajaran.form', compact('pengajars', 'tingkats'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'mata_pelajaran' => 'required|string|max:255',
            'pengajar' => 'required|exists:pengajars,id',
            'tingkat' => 'required|string|max:255',
        ]);

        Pelajaran::create([
            'mata_pelajaran' => $validated['mata_pelajaran'],
            'pengajar_id' => $validated['pengajar'],
            'tingkat' => $validated['tingkat'],
        ]);

        return redirect()->route('pelajaran.index')->with('success', 'Pelajaran berhasil ditambahkan.');
    }

    public function edit(Pelajaran $pelajaran)
    {

        $pengajars = Pengajar::all();
  
        $tingkats = Mahasiswa::distinct()->pluck('tingkat');
        
        return view('pelajaran.edit', compact('pelajaran', 'pengajars', 'tingkats'));
    }

    public function update(Request $request, Pelajaran $pelajaran)
    {
        $validated = $request->validate([
            'mata_pelajaran' => 'required|string|max:255',
            'pengajar' => 'required|exists:pengajars,id', // Validasi id pengajar
            'tingkat' => 'required|string|max:255',
        ]);

        $pelajaran->update([
            'mata_pelajaran' => $validated['mata_pelajaran'],
            'pengajar_id' => $validated['pengajar'], // Update id pengajar
            'tingkat' => $validated['tingkat'],
        ]);

        return redirect()->route('pelajaran.index')->with('success', 'Pelajaran berhasil diperbarui.');
    }

    public function destroy(Pelajaran $pelajaran)
    {
        $pelajaran->delete();
        return redirect()->route('pelajaran.index')->with('success', 'Pelajaran berhasil dihapus.');
    }
}
