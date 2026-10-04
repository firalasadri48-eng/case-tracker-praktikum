@extends('layouts.app')
@section('title', (isset($rencana) ? 'Ubah' : 'Tambah') . ' Rencana Intervensi')

@section('content')
<h1 class="text-2xl font-bold mb-1">{{ isset($rencana) ? 'Ubah' : 'Tambah' }} Rencana Intervensi</h1>
<p class="text-slate-500 mb-6">{{ $klien->nama_panggilan }}</p>

<form method="POST" action="{{ isset($rencana) ? route('klien.rencana.update', [$klien, $rencana]) : route('klien.rencana.store', $klien) }}" class="bg-white rounded shadow p-6 max-w-2xl">
    @csrf
    @if(isset($rencana)) @method('PUT') @endif

    @include('components.input', ['name' => 'tanggal_rencana', 'label' => 'Tanggal Rencana', 'type' => 'date', 'value' => isset($rencana) ? $rencana->tanggal_rencana->format('Y-m-d') : date('Y-m-d'), 'required' => true])
    @include('components.textarea', ['name' => 'tujuan_smart', 'label' => 'Tujuan (SMART: Specific, Measurable, Achievable, Relevant, Time-bound)', 'rows' => 5, 'value' => $rencana->tujuan_smart ?? null, 'required' => true])
    @include('components.input', ['name' => 'teori_model', 'label' => 'Teori / Model yang digunakan', 'value' => $rencana->teori_model ?? null, 'placeholder' => 'mis. Teori sistem, model task-centered'])
    @include('components.textarea', ['name' => 'metode_pendekatan', 'label' => 'Metode & Pendekatan', 'rows' => 4, 'value' => $rencana->metode_pendekatan ?? null, 'placeholder' => 'mis. konseling individual, edukasi keluarga'])
    @include('components.input', ['name' => 'skala_prioritas', 'label' => 'Skala Prioritas', 'value' => $rencana->skala_prioritas ?? null, 'placeholder' => 'mis. Prioritas 1'])

    <div class="flex gap-3 mt-2">
        <button type="submit" class="bg-indigo-600 text-white px-5 py-2 rounded hover:bg-indigo-700">Simpan</button>
        <a href="{{ route('klien.rencana.index', $klien) }}" class="px-5 py-2 rounded border border-slate-300 hover:bg-slate-50">Batal</a>
    </div>
</form>
@endsection
