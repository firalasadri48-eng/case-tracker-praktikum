@extends('layouts.app')
@section('title', 'Supervisi')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Catatan Supervisi</h1>
    <a href="{{ route('supervisi.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">+ Supervisi Baru</a>
</div>

@forelse ($supervisis as $supervisi)
    <div class="bg-white rounded shadow p-5 mb-4">
        <div class="flex flex-wrap items-center justify-between gap-2 mb-2">
            <div>
                <span class="text-xs bg-indigo-100 text-indigo-800 px-2 py-1 rounded mr-2">{{ $supervisi->jenis }}</span>
                <span class="font-semibold">{{ $supervisi->topik }}</span>
            </div>
            <div class="flex gap-3 text-sm">
                <a href="{{ route('supervisi.edit', $supervisi) }}" class="text-indigo-600 hover:underline">Ubah</a>
                <form method="POST" action="{{ route('supervisi.destroy', $supervisi) }}" onsubmit="return confirm('Hapus catatan supervisi ini?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                </form>
            </div>
        </div>
        <p class="text-xs text-slate-500 mb-2">{{ $supervisi->tanggal->format('d M Y') }}</p>
        @if ($supervisi->hasil_diskusi)
            <p class="text-sm"><span class="font-medium">Hasil diskusi:</span> <span class="whitespace-pre-line">{{ $supervisi->hasil_diskusi }}</span></p>
        @endif
        @if ($supervisi->tindak_lanjut)
            <p class="text-sm mt-1"><span class="font-medium">Tindak lanjut:</span> <span class="whitespace-pre-line">{{ $supervisi->tindak_lanjut }}</span></p>
        @endif
    </div>
@empty
    <p class="text-slate-500">Belum ada catatan supervisi.</p>
@endforelse

<div class="mt-4">{{ $supervisis->links() }}</div>
@endsection
