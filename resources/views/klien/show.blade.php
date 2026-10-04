@extends('layouts.app')
@section('title', 'Detail Klien: ' . $klien->nama_panggilan)

@section('content')
<div class="flex flex-wrap items-center justify-between gap-3 mb-6">
    <div>
        <h1 class="text-2xl font-bold">{{ $klien->nama_panggilan }}</h1>
        <p class="text-sm text-slate-500">
            {{ $klien->usia ? $klien->usia . ' tahun' : '' }}
            {{ $klien->jenis_kelamin ? ' • ' . $klien->jenis_kelamin : '' }}
            {{ $klien->tanggal_intake ? ' • Intake: ' . $klien->tanggal_intake->format('d M Y') : '' }}
        </p>
    </div>
    <div class="flex gap-2">
        <a href="{{ route('klien.edit', $klien) }}" class="px-4 py-2 rounded border border-slate-300 bg-white hover:bg-slate-50 text-sm">Ubah</a>
        <form method="POST" action="{{ route('klien.destroy', $klien) }}" onsubmit="return confirm('Hapus klien ini beserta seluruh asesmen, rencana, dan catatannya?')">
            @csrf @method('DELETE')
            <button type="submit" class="px-4 py-2 rounded bg-red-600 text-white text-sm hover:bg-red-700">Hapus</button>
        </form>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="space-y-6">
        <div class="bg-white rounded shadow p-5">
            <h2 class="font-bold mb-3">Info Singkat</h2>
            <dl class="text-sm space-y-2">
                <div><dt class="text-slate-500">Status</dt><dd class="font-medium">{{ ucfirst($klien->status) }}</dd></div>
                <div><dt class="text-slate-500">Kontak</dt><dd>{{ $klien->kontak ?? '—' }}</dd></div>
                <div><dt class="text-slate-500">Alamat</dt><dd>{{ $klien->alamat ?? '—' }}</dd></div>
                <div><dt class="text-slate-500">Catatan Umum</dt><dd class="whitespace-pre-line">{{ $klien->catatan_umum ?? '—' }}</dd></div>
            </dl>
        </div>

        <div class="bg-white rounded shadow p-5">
            <div class="flex items-center justify-between mb-3">
                <h2 class="font-bold">Asesmen</h2>
                <a href="{{ route('klien.asesmen.edit', $klien) }}" class="text-sm text-indigo-600 hover:underline">{{ $klien->asesmen ? 'Ubah' : 'Isi Asesmen' }}</a>
            </div>
            @if ($klien->asesmen)
                <p class="text-sm"><span class="text-slate-500">Masalah:</span> {{ \Illuminate\Support\Str::limit($klien->asesmen->masalah, 200) }}</p>
                <p class="text-sm mt-2"><span class="text-slate-500">Kesimpulan:</span> {{ \Illuminate\Support\Str::limit($klien->asesmen->kesimpulan ?? '—', 200) }}</p>
            @else
                <p class="text-sm text-slate-500">Belum ada asesmen.</p>
            @endif
        </div>

        <div class="bg-white rounded shadow p-5">
            <div class="flex items-center justify-between mb-3">
                <h2 class="font-bold">Rencana Intervensi</h2>
                <a href="{{ route('klien.rencana.index', $klien) }}" class="text-sm text-indigo-600 hover:underline">Semua versi</a>
            </div>
            @php $terbaru = $klien->rencanaTerbaru; @endphp
            @if ($terbaru)
                <p class="text-sm"><span class="text-slate-500">Tujuan SMART:</span> {{ \Illuminate\Support\Str::limit($terbaru->tujuan_smart, 200) }}</p>
                <p class="text-xs text-slate-500 mt-2">{{ $terbaru->tanggal_rencana->format('d M Y') }}{{ $terbaru->teori_model ? ' • ' . $terbaru->teori_model : '' }}</p>
            @else
                <p class="text-sm text-slate-500">Belum ada rencana.</p>
            @endif
            <a href="{{ route('klien.rencana.create', $klien) }}" class="inline-block mt-3 text-sm bg-indigo-600 text-white px-3 py-1.5 rounded hover:bg-indigo-700">+ Rencana Baru</a>
        </div>
    </div>

    <div class="lg:col-span-2">
        <div class="bg-white rounded shadow p-5">
            <div class="flex items-center justify-between mb-4">
                <h2 class="font-bold text-lg">Catatan Sesi / Jurnal</h2>
                <a href="{{ route('klien.sesi.create', $klien) }}" class="text-sm bg-indigo-600 text-white px-3 py-1.5 rounded hover:bg-indigo-700">+ Sesi Baru</a>
            </div>
            @forelse ($klien->catatanSesi as $sesi)
                <div class="border rounded p-4 mb-3">
                    <div class="flex flex-wrap items-center justify-between gap-2 mb-1">
                        <p class="font-semibold">{{ $sesi->judul }}</p>
                        <span class="text-xs bg-indigo-100 text-indigo-800 px-2 py-1 rounded">{{ $sesi->labelTahapan() }}</span>
                    </div>
                    <p class="text-xs text-slate-500 mb-2">{{ $sesi->tanggal->format('d M Y') }}{{ $sesi->durasi_menit ? ' • ' . $sesi->durasi_menit . ' menit' : '' }}</p>
                    <p class="text-sm whitespace-pre-line">{{ $sesi->catatan }}</p>
                    @if ($sesi->tindak_lanjut)
                        <p class="text-sm mt-2"><span class="font-medium">Tindak lanjut:</span> <span class="whitespace-pre-line">{{ $sesi->tindak_lanjut }}</span></p>
                    @endif
                    <div class="mt-3 flex gap-3 text-sm">
                        <a href="{{ route('klien.sesi.edit', [$klien, $sesi]) }}" class="text-indigo-600 hover:underline">Ubah</a>
                        <form method="POST" action="{{ route('klien.sesi.destroy', [$klien, $sesi]) }}" onsubmit="return confirm('Hapus catatan sesi ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-sm text-slate-500">Belum ada catatan sesi.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
