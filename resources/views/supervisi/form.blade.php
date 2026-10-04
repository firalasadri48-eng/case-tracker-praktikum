@extends('layouts.app')
@section('title', (isset($supervisi) ? 'Ubah' : 'Tambah') . ' Supervisi')

@section('content')
<h1 class="text-2xl font-bold mb-6">{{ isset($supervisi) ? 'Ubah' : 'Tambah' }} Catatan Supervisi</h1>

<form method="POST" action="{{ isset($supervisi) ? route('supervisi.update', $supervisi) : route('supervisi.store') }}" class="bg-white rounded shadow p-6 max-w-2xl">
    @csrf
    @if(isset($supervisi)) @method('PUT') @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        @include('components.input', ['name' => 'tanggal', 'label' => 'Tanggal', 'type' => 'date', 'value' => isset($supervisi) ? $supervisi->tanggal->format('Y-m-d') : date('Y-m-d'), 'required' => true])
        @include('components.select', ['name' => 'jenis', 'label' => 'Jenis Supervisi', 'options' => $jenis, 'value' => $supervisi->jenis ?? null, 'required' => true])
    </div>

    @include('components.input', ['name' => 'topik', 'label' => 'Topik', 'value' => $supervisi->topik ?? null, 'required' => true])
    @include('components.textarea', ['name' => 'hasil_diskusi', 'label' => 'Hasil Diskusi', 'rows' => 5, 'value' => $supervisi->hasil_diskusi ?? null])
    @include('components.textarea', ['name' => 'tindak_lanjut', 'label' => 'Tindak Lanjut', 'rows' => 3, 'value' => $supervisi->tindak_lanjut ?? null])

    <div class="flex gap-3 mt-2">
        <button type="submit" class="bg-indigo-600 text-white px-5 py-2 rounded hover:bg-indigo-700">Simpan</button>
        <a href="{{ route('supervisi.index') }}" class="px-5 py-2 rounded border border-slate-300 hover:bg-slate-50">Batal</a>
    </div>
</form>
@endsection
