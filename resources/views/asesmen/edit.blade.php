@extends('layouts.app')
@section('title', 'Asesmen: ' . $klien->nama_panggilan)

@section('content')
<h1 class="text-2xl font-bold mb-1">Asesmen Klien</h1>
<p class="text-slate-500 mb-6">{{ $klien->nama_panggilan }}</p>

<form method="POST" action="{{ route('klien.asesmen.update', $klien) }}" class="bg-white rounded shadow p-6 max-w-3xl">
    @csrf @method('PUT')

    <h2 class="font-bold text-lg mb-3 text-indigo-700">Masalah & Riwayat</h2>
    @include('components.textarea', ['name' => 'masalah', 'label' => 'Masalah yang dihadapi', 'rows' => 4, 'value' => $asesmen->masalah ?? null, 'required' => true])
    @include('components.textarea', ['name' => 'riwayat_masalah', 'label' => 'Riwayat masalah', 'rows' => 4, 'value' => $asesmen->riwayat_masalah ?? null])

    <h2 class="font-bold text-lg mt-6 mb-3 text-indigo-700">Keberfungsian BPSS</h2>
    @include('components.textarea', ['name' => 'bpss_biologis', 'label' => 'Biologis', 'rows' => 3, 'value' => $asesmen->bpss_biologis ?? null])
    @include('components.textarea', ['name' => 'bpss_kebutuhan_dasar', 'label' => 'Kebutuhan dasar', 'rows' => 3, 'value' => $asesmen->bpss_kebutuhan_dasar ?? null])
    @include('components.textarea', ['name' => 'bpss_psikologis', 'label' => 'Psikologis', 'rows' => 3, 'value' => $asesmen->bpss_psikologis ?? null])
    @include('components.textarea', ['name' => 'bpss_sosial_budaya', 'label' => 'Sosial, budaya & lingkungan', 'rows' => 3, 'value' => $asesmen->bpss_sosial_budaya ?? null])
    @include('components.textarea', ['name' => 'bpss_spiritual', 'label' => 'Spiritualitas', 'rows' => 3, 'value' => $asesmen->bpss_spiritual ?? null])

    <h2 class="font-bold text-lg mt-6 mb-3 text-indigo-700">Sistem Dukungan</h2>
    @include('components.textarea', ['name' => 'dukungan_keluarga', 'label' => 'Keluarga', 'rows' => 3, 'value' => $asesmen->dukungan_keluarga ?? null])
    @include('components.textarea', ['name' => 'dukungan_keagamaan', 'label' => 'Lembaga keagamaan', 'rows' => 3, 'value' => $asesmen->dukungan_keagamaan ?? null])
    @include('components.textarea', ['name' => 'dukungan_lingkungan', 'label' => 'Sumber daya lingkungan', 'rows' => 3, 'value' => $asesmen->dukungan_lingkungan ?? null])

    <h2 class="font-bold text-lg mt-6 mb-3 text-indigo-700">Potensi & Kesimpulan</h2>
    @include('components.textarea', ['name' => 'potensi_kekuatan', 'label' => 'Potensi kekuatan', 'rows' => 3, 'value' => $asesmen->potensi_kekuatan ?? null])
    @include('components.textarea', ['name' => 'potensi_kekurangan', 'label' => 'Potensi kekurangan', 'rows' => 3, 'value' => $asesmen->potensi_kekurangan ?? null])
    @include('components.textarea', ['name' => 'kesimpulan', 'label' => 'Kesimpulan asesmen', 'rows' => 4, 'value' => $asesmen->kesimpulan ?? null])

    <div class="flex gap-3 mt-2">
        <button type="submit" class="bg-indigo-600 text-white px-5 py-2 rounded hover:bg-indigo-700">Simpan Asesmen</button>
        <a href="{{ route('klien.show', $klien) }}" class="px-5 py-2 rounded border border-slate-300 hover:bg-slate-50">Batal</a>
    </div>
</form>
@endsection
