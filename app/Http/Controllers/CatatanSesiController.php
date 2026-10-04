<?php

namespace App\Http\Controllers;

use App\Models\CatatanSesi;
use App\Models\Klien;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CatatanSesiController extends Controller
{
    public function create(Klien $klien)
    {
        $tahapan = CatatanSesi::TAHAPAN;
        return view('sesi.create', compact('klien', 'tahapan'));
    }

    public function store(Request $request, Klien $klien)
    {
        $data = $request->validate([
            'tanggal' => 'required|date',
            'tahapan' => ['required', Rule::in(array_keys(CatatanSesi::TAHAPAN))],
            'judul' => 'required|string|max:255',
            'catatan' => 'required|string',
            'tindak_lanjut' => 'nullable|string',
            'durasi_menit' => 'nullable|integer|min:0',
        ]);

        $klien->catatanSesi()->create($data);

        return redirect()->route('klien.show', $klien)
            ->with('sukses', 'Catatan sesi berhasil ditambahkan.');
    }

    public function edit(Klien $klien, CatatanSesi $sesi)
    {
        $this->pastikanMilikKlien($klien, $sesi);
        $tahapan = CatatanSesi::TAHAPAN;
        return view('sesi.edit', compact('klien', 'sesi', 'tahapan'));
    }

    public function update(Request $request, Klien $klien, CatatanSesi $sesi)
    {
        $this->pastikanMilikKlien($klien, $sesi);

        $data = $request->validate([
            'tanggal' => 'required|date',
            'tahapan' => ['required', Rule::in(array_keys(CatatanSesi::TAHAPAN))],
            'judul' => 'required|string|max:255',
            'catatan' => 'required|string',
            'tindak_lanjut' => 'nullable|string',
            'durasi_menit' => 'nullable|integer|min:0',
        ]);

        $sesi->update($data);

        return redirect()->route('klien.show', $klien)
            ->with('sukses', 'Catatan sesi berhasil diperbarui.');
    }

    public function destroy(Klien $klien, CatatanSesi $sesi)
    {
        $this->pastikanMilikKlien($klien, $sesi);
        $sesi->delete();

        return redirect()->route('klien.show', $klien)
            ->with('sukses', 'Catatan sesi berhasil dihapus.');
    }

    private function pastikanMilikKlien(Klien $klien, CatatanSesi $sesi): void
    {
        abort_if($sesi->klien_id !== $klien->id, 404);
    }
}
