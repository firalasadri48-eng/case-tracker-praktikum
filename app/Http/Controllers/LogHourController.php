<?php

namespace App\Http\Controllers;

use App\Models\CatatanSesi;
use App\Models\LogHour;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LogHourController extends Controller
{
    public function index()
    {
        $logs = LogHour::orderByDesc('tanggal')->paginate(15);
        $totalJam = (float) LogHour::sum('durasi_jam');
        $targetJam = LogHour::TARGET_JAM;
        $persenJam = $targetJam > 0 ? min(100, round($totalJam / $targetJam * 100, 1)) : 0;

        return view('loghour.index', compact('logs', 'totalJam', 'targetJam', 'persenJam'));
    }

    public function create()
    {
        $tahapan = CatatanSesi::TAHAPAN;
        return view('loghour.create', compact('tahapan'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'tanggal' => 'required|date',
            'kegiatan' => 'required|string|max:255',
            'tahapan' => ['nullable', Rule::in(array_keys(CatatanSesi::TAHAPAN))],
            'durasi_jam' => 'required|numeric|min:0|max:24',
            'keterangan' => 'nullable|string',
        ]);

        LogHour::create($data);

        return redirect()->route('log-hours.index')
            ->with('sukses', 'Log jam berhasil ditambahkan.');
    }

    public function edit(LogHour $logHour)
    {
        $tahapan = CatatanSesi::TAHAPAN;
        return view('loghour.edit', compact('logHour', 'tahapan'));
    }

    public function update(Request $request, LogHour $logHour)
    {
        $data = $request->validate([
            'tanggal' => 'required|date',
            'kegiatan' => 'required|string|max:255',
            'tahapan' => ['nullable', Rule::in(array_keys(CatatanSesi::TAHAPAN))],
            'durasi_jam' => 'required|numeric|min:0|max:24',
            'keterangan' => 'nullable|string',
        ]);

        $logHour->update($data);

        return redirect()->route('log-hours.index')
            ->with('sukses', 'Log jam berhasil diperbarui.');
    }

    public function destroy(LogHour $logHour)
    {
        $logHour->delete();
        return redirect()->route('log-hours.index')
            ->with('sukses', 'Log jam berhasil dihapus.');
    }
}
