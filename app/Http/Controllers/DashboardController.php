<?php

namespace App\Http\Controllers;

use App\Models\CatatanSesi;
use App\Models\Klien;
use App\Models\LogHour;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKlienAktif = Klien::where('status', 'aktif')->count();

        $sesiBulanIni = CatatanSesi::whereYear('tanggal', now()->year)
            ->whereMonth('tanggal', now()->month)
            ->count();

        $totalJam = (float) LogHour::sum('durasi_jam');
        $targetJam = LogHour::TARGET_JAM;
        $persenJam = $targetJam > 0 ? min(100, round($totalJam / $targetJam * 100, 1)) : 0;

        $kliens = Klien::with('catatanSesi')->orderBy('nama_panggilan')->get();
        $sesiTerbaru = CatatanSesi::with('klien')->orderByDesc('tanggal')->limit(5)->get();

        return view('dashboard', compact(
            'totalKlienAktif',
            'sesiBulanIni',
            'totalJam',
            'targetJam',
            'persenJam',
            'kliens',
            'sesiTerbaru'
        ));
    }
}
