@extends('layouts.app')
@section('title', 'Daftar Klien')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Daftar Klien</h1>
    <a href="{{ route('klien.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">+ Klien Baru</a>
</div>

<div class="bg-white rounded shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-slate-50">
            <tr>
                <th class="text-left px-4 py-3">Nama Panggilan</th>
                <th class="text-left px-4 py-3">Usia</th>
                <th class="text-left px-4 py-3">Tgl Intake</th>
                <th class="text-left px-4 py-3">Tahapan Terakhir</th>
                <th class="text-left px-4 py-3">Status</th>
                <th class="px-4 py-3"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kliens as $klien)
                <tr class="border-t hover:bg-slate-50">
                    <td class="px-4 py-3 font-medium">{{ $klien->nama_panggilan }}</td>
                    <td class="px-4 py-3">{{ $klien->usia ?? '—' }}</td>
                    <td class="px-4 py-3">{{ $klien->tanggal_intake?->format('d M Y') ?? '—' }}</td>
                    <td class="px-4 py-3">{{ $klien->tahapanTerakhir() ? (\App\Models\CatatanSesi::TAHAPAN[$klien->tahapanTerakhir()] ?? $klien->tahapanTerakhir()) : '—' }}</td>
                    <td class="px-4 py-3">
                        <span class="text-xs px-2 py-1 rounded {{ $klien->status === 'aktif' ? 'bg-green-100 text-green-800' : 'bg-slate-200 text-slate-600' }}">{{ ucfirst($klien->status) }}</span>
                    </td>
                    <td class="px-4 py-3 text-right whitespace-nowrap">
                        <a href="{{ route('klien.show', $klien) }}" class="text-indigo-600 hover:underline">Detail</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="px-4 py-6 text-center text-slate-500">Belum ada klien.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $kliens->links() }}</div>
@endsection
