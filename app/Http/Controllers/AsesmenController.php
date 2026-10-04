<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use Illuminate\Http\Request;

class AsesmenController extends Controller
{
    public function edit(Klien $klien)
    {
        $asesmen = $klien->asesmen;
        return view('asesmen.edit', compact('klien', 'asesmen'));
    }

    public function update(Request $request, Klien $klien)
    {
        $data = $request->validate([
            'masalah' => 'required|string',
            'riwayat_masalah' => 'nullable|string',
            'bpss_biologis' => 'nullable|string',
            'bpss_kebutuhan_dasar' => 'nullable|string',
            'bpss_psikologis' => 'nullable|string',
            'bpss_sosial_budaya' => 'nullable|string',
            'bpss_spiritual' => 'nullable|string',
            'dukungan_keluarga' => 'nullable|string',
            'dukungan_keagamaan' => 'nullable|string',
            'dukungan_lingkungan' => 'nullable|string',
            'potensi_kekuatan' => 'nullable|string',
            'potensi_kekurangan' => 'nullable|string',
            'kesimpulan' => 'nullable|string',
        ]);

        if ($klien->asesmen) {
            $klien->asesmen->update($data);
        } else {
            $klien->asesmen()->create($data);
        }

        return redirect()->route('klien.show', $klien)
            ->with('sukses', 'Asesmen berhasil disimpan.');
    }
}
