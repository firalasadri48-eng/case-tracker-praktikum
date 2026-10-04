@extends('layouts.app')
@section('title', (isset($sesi) ? 'Ubah' : 'Tambah') . ' Catatan Sesi')

@section('content')
<h1 class="text-2xl font-bold mb-1">{{ isset($sesi) ? 'Ubah' : 'Tambah' }} Catatan Sesi / Jurnal</h1>
<p class="text-slate-500 mb-6">{{ $klien->nama_panggilan }}</p>

<form method="POST" action="{{ isset($sesi) ? route('klien.sesi.update', [$klien, $sesi]) : route('klien.sesi.store', $klien) }}" class="bg-white rounded shadow p-6 max-w-2xl">
    @csrf
    @if(isset($sesi)) @method('PUT') @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        @include('components.input', ['name' => 'tanggal', 'label' => 'Tanggal', 'type' => 'date', 'value' => isset($sesi) ? $sesi->tanggal->format('Y-m-d') : date('Y-m-d'), 'required' => true])
        @include('components.select', ['name' => 'tahapan', 'label' => 'Tahapan', 'options' => $tahapan, 'value' => $sesi->tahapan ?? null, 'required' => true])
    </div>

    @include('components.input', ['name' => 'judul', 'label' => 'Judul Sesi', 'value' => $sesi->judul ?? null, 'required' => true])
    @include('components.textarea', ['name' => 'catatan', 'label' => 'Catatan', 'rows' => 6, 'value' => $sesi->catatan ?? null, 'required' => true])
    @include('components.textarea', ['name' => 'tindak_lanjut', 'label' => 'Tindak Lanjut', 'rows' => 3, 'value' => $sesi->tindak_lanjut ?? null])
    @include('components.input', ['name' => 'durasi_menit', 'label' => 'Durasi (menit)', 'type' => 'number', 'min' => 0, 'value' => $sesi->durasi_menit ?? null])

    <div class="flex gap-3 mt-2">
        <button type="submit" class="bg-indigo-600 text-white px-5 py-2 rounded hover:bg-indigo-700">Simpan</button>
        <a href="{{ route('klien.show', $klien) }}" class="px-5 py-2 rounded border border-slate-300 hover:bg-slate-50">Batal</a>
    </div>
</form>
@endsection
