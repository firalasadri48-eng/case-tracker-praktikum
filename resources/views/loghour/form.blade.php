@extends('layouts.app')
@section('title', (isset($logHour) ? 'Ubah' : 'Tambah') . ' Log Hour')

@section('content')
<h1 class="text-2xl font-bold mb-6">{{ isset($logHour) ? 'Ubah' : 'Tambah' }} Log Jam</h1>

<form method="POST" action="{{ isset($logHour) ? route('log-hours.update', $logHour->id) : route('log-hours.store') }}" class="bg-white rounded shadow p-6 max-w-2xl">
    @csrf
    @if(isset($logHour)) @method('PUT') @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        @include('components.input', ['name' => 'tanggal', 'label' => 'Tanggal', 'type' => 'date', 'value' => isset($logHour) ? $logHour->tanggal->format('Y-m-d') : date('Y-m-d'), 'required' => true])
        @include('components.input', ['name' => 'durasi_jam', 'label' => 'Durasi (jam)', 'type' => 'number', 'step' => '0.5', 'min' => 0, 'max' => 24, 'value' => isset($logHour) ? $logHour->durasi_jam : null, 'required' => true])
    </div>

    @include('components.input', ['name' => 'kegiatan', 'label' => 'Kegiatan', 'value' => $logHour->kegiatan ?? null, 'required' => true, 'placeholder' => 'mis. Kunjungan rumah klien'])
    @include('components.select', ['name' => 'tahapan', 'label' => 'Tahapan Terkait', 'options' => $tahapan, 'value' => $logHour->tahapan ?? null])
    @include('components.textarea', ['name' => 'keterangan', 'label' => 'Keterangan', 'rows' => 3, 'value' => $logHour->keterangan ?? null])

    <div class="flex gap-3 mt-2">
        <button type="submit" class="bg-indigo-600 text-white px-5 py-2 rounded hover:bg-indigo-700">Simpan</button>
        <a href="{{ route('log-hours.index') }}" class="px-5 py-2 rounded border border-slate-300 hover:bg-slate-50">Batal</a>
    </div>
</form>
@endsection
