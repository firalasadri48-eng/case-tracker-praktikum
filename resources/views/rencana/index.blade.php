@extends('layouts.app')
@section('title', 'Rencana Intervensi: ' . $klien->nama_panggilan)

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold">Rencana Intervensi</h1>
        <p class="text-slate-500">{{ $klien->nama_panggilan }}</p>
    </div>
    <a href="{{ route('klien.rencana.create', $klien) }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">+ Rencana Baru</a>
</div>

@forelse ($rencanas as $rencana)
    <div class="bg-white rounded shadow p-5 mb-4">
        <div class="flex flex-wrap items-center justify-between gap-2 mb-2">
            <p class="text-sm text-slate-500">{{ $rencana->tanggal_rencana->format('d M Y') }}</p>
            <div class="flex gap-3 text-sm">
                <a href="{{ route('klien.rencana.edit', [$klien, $rencana]) }}" class="text-indigo-600 hover:underline">Ubah</a>
                <form method="POST" action="{{ route('klien.rencana.destroy', [$klien, $rencana]) }}" onsubmit="return confirm('Hapus rencana intervensi ini?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                </form>
            </div>
        </div>
        <dl class="text-sm space-y-2">
            <div><dt class="text-slate-500">Tujuan (SMART)</dt><dd class="whitespace-pre-line">{{ $rencana->tujuan_smart }}</dd></div>
            <div><dt class="text-slate-500">Teori / Model</dt><dd>{{ $rencana->teori_model ?? '—' }}</dd></div>
            <div><dt class="text-slate-500">Metode & Pendekatan</dt><dd class="whitespace-pre-line">{{ $rencana->metode_pendekatan ?? '—' }}</dd></div>
            <div><dt class="text-slate-500">Skala Prioritas</dt><dd>{{ $rencana->skala_prioritas ?? '—' }}</dd></div>
        </dl>
    </div>
@empty
    <p class="text-slate-500">Belum ada rencana intervensi.</p>
@endforelse

<div class="mt-4">{{ $rencanas->links() }}</div>
<a href="{{ route('klien.show', $klien) }}" class="inline-block mt-4 text-indigo-600 hover:underline text-sm">← Kembali ke detail klien</a>
@endsection
