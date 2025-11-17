<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;

class SiswaController extends Controller
{
    /**
     * Index tidak melakukan query manual.
     * Semua filter, search, pagination ditangani oleh Livewire.
     */
    public function index()
    {
        return view('siswa.index');
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nisn'          => 'required|string|max:20|unique:siswas,nisn',
                'nik'           => 'required|string|max:20|unique:siswas,nik',
                'nama_siswa'    => 'required|string|max:255',
                'tempat_lahir'  => 'required|string|max:100',
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
                'alamat'        => 'nullable|string',
                'nama_ayah'     => 'nullable|string|max:255',
                'nama_ibu'      => 'nullable|string|max:255',
                'nama_wali'     => 'nullable|string|max:255',
                'kelas_id'      => 'required|exists:kelas,id',
            ]);

            Siswa::create($request->all());

            return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error store siswa: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menambahkan data siswa. Silakan coba lagi.')->withInput();
        }
    }

    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        try {
            $request->validate([
                'nama_siswa'    => 'required|string|max:255',
                'nisn'          => 'required|string|max:20|unique:siswas,nisn,' . $siswa->id,
                'nik'           => 'required|string|max:20|unique:siswas,nik,' . $siswa->id,
                'kelas_id'      => 'required|exists:kelas,id',
                'tempat_lahir'  => 'required|string|max:100',
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
                'alamat'        => 'nullable|string',
                'nama_ayah'     => 'nullable|string|max:255',
                'nama_ibu'      => 'nullable|string|max:255',
                'nama_wali'     => 'nullable|string|max:255',
            ]);

            $siswa->update($request->all());

            return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error update siswa: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui data siswa. Silakan coba lagi.')->withInput();
        }
    }

    public function destroy(Siswa $siswa)
    {
        try {
            $siswa->delete();
            return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Error delete siswa: ' . $e->getMessage());
            return redirect()->route('siswa.index')->with('error', 'Gagal menghapus data siswa. Silakan coba lagi.');
        }
    }

    public function destroyAll()
    {
        Siswa::truncate();
        return redirect()->back()->with('success', 'Semua data siswa berhasil dihapus.');
    }

    /** ✅ Export Excel */
    public function export()
    {
        return Excel::download(new SiswaExport, 'data-siswa.xlsx');
    }

    /** ✅ Import Excel */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        try {
            Excel::import(new SiswaImport, $request->file('file'));
            return redirect()->back()->with('success', '✅ Import selesai. Data siswa berhasil ditambahkan.');
        } catch (\Throwable $e) {
            Log::error('❌ Error import siswa: ' . $e->getMessage());
            return redirect()->back()->with('error', '❌ Import gagal. Cek log untuk detail error.');
        }
    }
}
