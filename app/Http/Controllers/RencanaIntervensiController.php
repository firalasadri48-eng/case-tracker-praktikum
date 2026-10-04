<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use App\Models\RencanaIntervensi;
use Illuminate\Http\Request;

class RencanaIntervensiController extends Controller
{
    public function index(Klien $klien)
    {
        $rencanas = $klien->rencanaIntervensi()->paginate(10);
        return view('rencana.index', compact('klien', 'rencanas'));
    }

    public function create(Klien $klien)
    {
        return view('rencana.create', compact('klien'));
    }

    public function store(Request $request, Klien $klien)
    {
        $data = $request->validate([
            'tujuan_smart' => 'required|string',
            'teori_model' => 'nullable|string|max:255',
            'metode_pendekatan' => 'nullable|string',
            'skala_prioritas' => 'nullable|string|max:100',
            'tanggal_rencana' => 'required|date',
        ]);

        $klien->rencanaIntervensi()->create($data);

        return redirect()->route('klien.rencana.index', $klien)
            ->with('sukses', 'Rencana intervensi berhasil ditambahkan.');
    }

    public function edit(Klien $klien, RencanaIntervensi $rencana)
    {
        $this->pastikanMilikKlien($klien, $rencana);
        return view('rencana.edit', compact('klien', 'rencana'));
    }

    public function update(Request $request, Klien $klien, RencanaIntervensi $rencana)
    {
        $this->pastikanMilikKlien($klien, $rencana);

        $data = $request->validate([
            'tujuan_smart' => 'required|string',
            'teori_model' => 'nullable|string|max:255',
            'metode_pendekatan' => 'nullable|string',
            'skala_prioritas' => 'nullable|string|max:100',
            'tanggal_rencana' => 'required|date',
        ]);

        $rencana->update($data);

        return redirect()->route('klien.rencana.index', $klien)
            ->with('sukses', 'Rencana intervensi berhasil diperbarui.');
    }

    public function destroy(Klien $klien, RencanaIntervensi $rencana)
    {
        $this->pastikanMilikKlien($klien, $rencana);
        $rencana->delete();

        return redirect()->route('klien.rencana.index', $klien)
            ->with('sukses', 'Rencana intervensi berhasil dihapus.');
    }

    private function pastikanMilikKlien(Klien $klien, RencanaIntervensi $rencana): void
    {
        abort_if($rencana->klien_id !== $klien->id, 404);
    }
}
