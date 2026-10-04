@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<h1 class="text-2xl font-bold mb-6">Dashboard Praktikum I</h1>

<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
    <div class="bg-white rounded shadow p-5">
        <p class="text-sm text-slate-500">Klien Aktif</p>
        <p class="text-3xl font-bold text-indigo-700">{{ $totalKlienAktif }}</p>
    </div>
    <div class="bg-white rounded shadow p-5">
        <p class="text-sm text-slate-500">Sesi Bulan Ini</p>
        <p class="text-3xl font-bold text-indigo-700">{{ $sesiBulanIni }}</p>
    </div>
    <div class="bg-white rounded shadow p-5">
        <p class="text-sm text-slate-500 mb-1">Total Jam Praktikum</p>
        <p class="text-3xl font-bold text-indigo-700">{{ number_format($totalJam, 1) }} <span class="text-base font-normal text-slate-500">/ {{ $targetJam }} jam</span></p>
        <div class="w-full bg-slate-200 rounded-full h-3 mt-3">
            <div class="bg-indigo-600 h-3 rounded-full" style="width: {{ $persenJam }}%"></div>
        </div>
        <p class="text-xs text-slate-500 mt-1">{{ $persenJam }}% tercapai</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white rounded shadow p-5">
        <div class="flex items-center justify-between mb-4">
            <h2 class="font-bold text-lg">Daftar Klien</h2>
            <a href="{{ route('klien.create') }}" class="text-sm bg-indigo-600 text-white px-3 py-1.5 rounded hover:bg-indigo-700">+ Klien Baru</a>
        </div>
        @forelse ($kliens as $klien)
            <a href="{{ route('klien.show', $klien) }}" class="block border-b last:border-0 py-3 hover:bg-slate-50 -mx-5 px-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-semibold">{{ $klien->nama_panggilan }}</p>
                        <p class="text-xs text-slate-500">
                            Tahapan terakhir: {{ $klien->tahapanTerakhir() ? (\App\Models\CatatanSesi::TAHAPAN[$klien->tahapanTerakhir()] ?? $klien->tahapanTerakhir()) : '— belum ada sesi —' }}
                        </p>
                    </div>
                    <span class="text-xs px-2 py-1 rounded {{ $klien->status === 'aktif' ? 'bg-green-100 text-green-800' : 'bg-slate-200 text-slate-600' }}">
                        {{ ucfirst($klien->status) }}
                    </span>
                </div>
            </a>
        @empty
            <p class="text-slate-500 text-sm">Belum ada klien. <a href="{{ route('klien.create') }}" class="text-indigo-600 underline">Tambah klien pertama</a>.</p>
        @endforelse
    </div>

    <div class="bg-white rounded shadow p-5">
        <h2 class="font-bold text-lg mb-4">5 Sesi Terbaru</h2>
        @forelse ($sesiTerbaru as $sesi)
            <div class="border-b last:border-0 py-3">
                <p class="font-semibold text-sm">{{ $sesi->judul }}</p>
                <p class="text-xs text-slate-500">
                    {{ $sesi->klien->nama_panggilan }} •
                    {{ $sesi->labelTahapan() }} •
                    {{ $sesi->tanggal->format('d M Y') }}
                </p>
            </div>
        @empty
            <p class="text-slate-500 text-sm">Belum ada catatan sesi.</p>
        @endforelse
    </div>
</div>
@endsection
