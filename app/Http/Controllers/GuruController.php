<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    // List Guru
    public function index()
    {
        return view('guru.index');
    }

    // Form Create Guru
    public function create()
    {
        return view('guru.create');
    }

    // Simpan Guru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|unique:gurus,nip', // ✅ diganti gurus
            'mapel' => 'required|string',
            'jabatan' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'no_hp' => 'required|string',
        ]);

        Guru::create($request->all());

        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan');
    }

    // Form Edit Guru
    public function edit(Guru $guru)
    {
        return view('guru.edit', compact('guru'));
    }

    // Update Guru
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|unique:gurus,nip,' . $guru->id, 
            'jabatan' => 'required|string',
            'mapel' => 'required|string',
            'no_hp' => 'required|string',
        ]);

        $guru->update($request->all());

        return redirect()->route('guru.index')->with('success', 'Guru berhasil diperbarui');
    }

    // Hapus Guru
    public function destroy(Guru $guru)
    {
        $guru->delete();
        return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus');
    }
}
