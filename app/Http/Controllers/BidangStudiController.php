<?php

namespace App\Http\Controllers;

use App\Models\BidangStudi;
use Illuminate\Http\Request;

class BidangStudiController extends Controller
{
    public function index()
    {
        $bidangStudis = BidangStudi::paginate(15);
        return view('bidang-studi.index', compact('bidangStudis'));
    }

    public function create()
    {
        return view('bidang-studi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_bidang' => 'required|string|unique:bidang_studi',
            'kode_bidang' => 'required|string|unique:bidang_studi',
            'deskripsi' => 'nullable|string',
        ]);

        BidangStudi::create($validated);

        return redirect()->route('bidang-studi.index')->with('success', 'Bidang studi berhasil ditambahkan');
    }

    public function edit(BidangStudi $bidangStudi)
    {
        return view('bidang-studi.edit', compact('bidangStudi'));
    }

    public function update(Request $request, BidangStudi $bidangStudi)
    {
        $validated = $request->validate([
            'nama_bidang' => 'required|string|unique:bidang_studi,nama_bidang,' . $bidangStudi->id,
            'kode_bidang' => 'required|string|unique:bidang_studi,kode_bidang,' . $bidangStudi->id,
            'deskripsi' => 'nullable|string',
        ]);

        $bidangStudi->update($validated);

        return redirect()->route('bidang-studi.index')->with('success', 'Bidang studi berhasil diperbarui');
    }

    public function destroy(BidangStudi $bidangStudi)
    {
        $bidangStudi->delete();
        return redirect()->route('bidang-studi.index')->with('success', 'Bidang studi berhasil dihapus');
    }
}
