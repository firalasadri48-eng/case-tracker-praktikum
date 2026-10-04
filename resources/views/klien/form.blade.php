@extends('layouts.app')
@section('title', isset($klien) ? 'Ubah Klien' : 'Tambah Klien')

@section('content')
<h1 class="text-2xl font-bold mb-6">{{ isset($klien) ? 'Ubah Data Klien' : 'Tambah Klien Baru' }}</h1>

<form method="POST" action="{{ isset($klien) ? route('klien.update', $klien) : route('klien.store') }}" class="bg-white rounded shadow p-6 max-w-2xl">
    @csrf
    @if(isset($klien)) @method('PUT') @endif

    @include('components.input', ['name' => 'nama_panggilan', 'label' => 'Nama Panggilan (boleh inisial demi privasi)', 'value' => $klien->nama_panggilan ?? null, 'required' => true])

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        @include('components.input', ['name' => 'usia', 'label' => 'Usia', 'type' => 'number', 'min' => 0, 'value' => $klien->usia ?? null])
        @include('components.select', ['name' => 'jenis_kelamin', 'label' => 'Jenis Kelamin', 'options' => ['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'], 'value' => $klien->jenis_kelamin ?? null])
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        @include('components.input', ['name' => 'kontak', 'label' => 'Kontak', 'value' => $klien->kontak ?? null])
        @include('components.input', ['name' => 'tanggal_intake', 'label' => 'Tanggal Intake', 'type' => 'date', 'value' => isset($klien) && $klien->tanggal_intake ? $klien->tanggal_intake->format('Y-m-d') : null])
    </div>

    @include('components.textarea', ['name' => 'alamat', 'label' => 'Alamat', 'rows' => 2, 'value' => $klien->alamat ?? null])
    @include('components.select', ['name' => 'status', 'label' => 'Status', 'options' => ['aktif' => 'Aktif', 'selesai' => 'Selesai'], 'value' => $klien->status ?? 'aktif', 'required' => true])
    @include('components.textarea', ['name' => 'catatan_umum', 'label' => 'Catatan Umum', 'rows' => 3, 'value' => $klien->catatan_umum ?? null])

    <div class="flex gap-3 mt-2">
        <button type="submit" class="bg-indigo-600 text-white px-5 py-2 rounded hover:bg-indigo-700">Simpan</button>
        <a href="{{ isset($klien) ? route('klien.show', $klien) : route('klien.index') }}" class="px-5 py-2 rounded border border-slate-300 hover:bg-slate-50">Batal</a>
    </div>
</form>
@endsection
