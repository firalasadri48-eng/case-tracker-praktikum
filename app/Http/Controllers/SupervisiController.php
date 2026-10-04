<?php

namespace App\Http\Controllers;

use App\Models\Supervisi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SupervisiController extends Controller
{
    public function index()
    {
        $supervisis = Supervisi::orderByDesc('tanggal')->paginate(12);
        return view('supervisi.index', compact('supervisis'));
    }

    public function create()
    {
        $jenis = Supervisi::JENIS;
        return view('supervisi.create', compact('jenis'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'tanggal' => 'required|date',
            'jenis' => ['required', Rule::in(array_keys(Supervisi::JENIS))],
            'topik' => 'required|string|max:255',
            'hasil_diskusi' => 'nullable|string',
            'tindak_lanjut' => 'nullable|string',
        ]);

        Supervisi::create($data);

        return redirect()->route('supervisi.index')
            ->with('sukses', 'Catatan supervisi berhasil ditambahkan.');
    }

    public function edit(Supervisi $supervisi)
    {
        $jenis = Supervisi::JENIS;
        return view('supervisi.edit', compact('supervisi', 'jenis'));
    }

    public function update(Request $request, Supervisi $supervisi)
    {
        $data = $request->validate([
            'tanggal' => 'required|date',
            'jenis' => ['required', Rule::in(array_keys(Supervisi::JENIS))],
            'topik' => 'required|string|max:255',
            'hasil_diskusi' => 'nullable|string',
            'tindak_lanjut' => 'nullable|string',
        ]);

        $supervisi->update($data);

        return redirect()->route('supervisi.index')
            ->with('sukses', 'Catatan supervisi berhasil diperbarui.');
    }

    public function destroy(Supervisi $supervisi)
    {
        $supervisi->delete();
        return redirect()->route('supervisi.index')
            ->with('sukses', 'Catatan supervisi berhasil dihapus.');
    }
}
