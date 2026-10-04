<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use Illuminate\Http\Request;

class KlienController extends Controller
{
    public function index()
    {
        $kliens = Klien::with('catatanSesi')->orderBy('nama_panggilan')->paginate(12);
        return view('klien.index', compact('kliens'));
    }

    public function create()
    {
        return view('klien.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_panggilan' => 'required|string|max:100',
            'usia' => 'nullable|integer|min:0|max:150',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'kontak' => 'nullable|string|max:50',
            'alamat' => 'nullable|string',
            'tanggal_intake' => 'nullable|date',
            'status' => 'required|in:aktif,selesai',
            'catatan_umum' => 'nullable|string',
        ]);

        $klien = Klien::create($data);

        return redirect()->route('klien.show', $klien)
            ->with('sukses', 'Klien berhasil ditambahkan.');
    }

    public function show(Klien $klien)
    {
        $klien->load(['asesmen', 'rencanaIntervensi', 'catatanSesi']);
        return view('klien.show', compact('klien'));
    }

    public function edit(Klien $klien)
    {
        return view('klien.edit', compact('klien'));
    }

    public function update(Request $request, Klien $klien)
    {
        $data = $request->validate([
            'nama_panggilan' => 'required|string|max:100',
            'usia' => 'nullable|integer|min:0|max:150',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'kontak' => 'nullable|string|max:50',
            'alamat' => 'nullable|string',
            'tanggal_intake' => 'nullable|date',
            'status' => 'required|in:aktif,selesai',
            'catatan_umum' => 'nullable|string',
        ]);

        $klien->update($data);

        return redirect()->route('klien.show', $klien)
            ->with('sukses', 'Data klien berhasil diperbarui.');
    }

    public function destroy(Klien $klien)
    {
        $klien->delete();
        return redirect()->route('klien.index')
            ->with('sukses', 'Klien beserta seluruh datanya berhasil dihapus.');
    }
}
