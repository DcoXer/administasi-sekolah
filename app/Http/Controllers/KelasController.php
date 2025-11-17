<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KelasController extends Controller
{
    public function index()
    {
        $kelasList = Kelas::with('waliKelas')->withCount('siswas')->orderBy('nama_kelas')->get();
        return view('kelas.index', compact('kelasList'));
    }

    public function create()
    {
        // Ambil semua users yang bisa jadi wali kelas
        $waliKelasOptions = User::all();

        return view('kelas.create', compact('waliKelasOptions'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_kelas' => 'required|string|max:50|unique:kelas,nama_kelas',
                'wali_kelas_id' => 'nullable|exists:users,id',
            ]);

            Kelas::create($request->all());

            return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil ditambahkan!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error store kelas: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menambahkan data kelas. Silakan coba lagi.')->withInput();
        }
    }

    public function edit(Kelas $kelas)
    {
        // Ambil semua users yang bisa jadi wali kelas
        $waliKelasOptions = User::all();

        return view('kelas.edit', compact('kelas', 'waliKelasOptions'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        try {
            $request->validate([
                'nama_kelas' => 'required|string|max:50|unique:kelas,nama_kelas,' . $kelas->id,
                'wali_kelas_id' => 'nullable|exists:users,id',
            ]);

            $kelas->update($request->all());

            return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil diperbarui.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error update kelas: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui data kelas. Silakan coba lagi.')->withInput();
        }
    }

    public function destroy(Kelas $kelas)
    {
        try {
            $kelas->delete();
            return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Error delete kelas: ' . $e->getMessage());
            return redirect()->route('kelas.index')->with('error', 'Gagal menghapus data kelas. Silakan coba lagi.');
        }
    }

    // --------------------
    // Data Siswa per Kelas
    // -------------------- 
    public function show($id)
    {
        $kelas = Kelas::with('siswas', 'waliKelas')->findOrFail($id);
        return view('kelas.show', compact('kelas'));
    }
}
