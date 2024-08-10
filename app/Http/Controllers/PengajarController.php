<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajar;

class PengajarController extends Controller
{
    public function index()
    {
        $pengajars = Pengajar::all();
        return view('pengajar.index', compact('pengajars'));
    }

    public function create()
    {
        return view('pengajar.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'mata_pelajaran' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:15',
        ]);

        Pengajar::create([
            'nama' => $validated['nama'],
            'mata_pelajaran' => $validated['mata_pelajaran'],
            'no_hp' => $validated['no_hp'],
        ]);

        return redirect()->route('pengajar.index')->with('success', 'Pengajar berhasil ditambahkan.');
    }

    public function edit(Pengajar $pengajar)
    {
        return view('pengajar.edit', compact('pengajar'));
    }

    public function update(Request $request, Pengajar $pengajar)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'mata_pelajaran' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:20',
        ]);

        $pengajar->update([
            'nama' => $request->nama,
            'mata_pelajaran' => $request->mata_pelajaran,
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->route('pengajar.index')->with('success', 'Pengajar berhasil diperbarui.');
    }

    public function destroy(Pengajar $pengajar)
    {
        $pengajar->delete();
        return redirect()->route('pengajar.index')->with('success', 'Pengajar berhasil dihapus.');
    }
}
