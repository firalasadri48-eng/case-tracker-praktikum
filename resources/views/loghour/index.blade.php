@extends('layouts.app')
@section('title', 'Log Hour')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Log Hour Praktikum</h1>
    <a href="{{ route('log-hours.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">+ Log Baru</a>
</div>

<div class="bg-white rounded shadow p-5 mb-6">
    <p class="text-sm text-slate-500 mb-1">Total jam terkumpul</p>
    <p class="text-3xl font-bold text-indigo-700">{{ number_format($totalJam, 1) }} <span class="text-base font-normal text-slate-500">/ {{ $targetJam }} jam</span></p>
    <div class="w-full bg-slate-200 rounded-full h-3 mt-3">
        <div class="bg-indigo-600 h-3 rounded-full" style="width: {{ $persenJam }}%"></div>
    </div>
    <p class="text-xs text-slate-500 mt-1">{{ $persenJam }}% dari target</p>
</div>

<div class="bg-white rounded shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-slate-50">
            <tr>
                <th class="text-left px-4 py-3">Tanggal</th>
                <th class="text-left px-4 py-3">Kegiatan</th>
                <th class="text-left px-4 py-3">Tahapan</th>
                <th class="text-right px-4 py-3">Durasi (jam)</th>
                <th class="px-4 py-3"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($logs as $log)
                <tr class="border-t hover:bg-slate-50">
                    <td class="px-4 py-3 whitespace-nowrap">{{ $log->tanggal->format('d M Y') }}</td>
                    <td class="px-4 py-3">
                        <p class="font-medium">{{ $log->kegiatan }}</p>
                        @if ($log->keterangan)<p class="text-xs text-slate-500">{{ \Illuminate\Support\Str::limit($log->keterangan, 80) }}</p>@endif
                    </td>
                    <td class="px-4 py-3">{{ $log->tahapan ? (\App\Models\CatatanSesi::TAHAPAN[$log->tahapan] ?? $log->tahapan) : '—' }}</td>
                    <td class="px-4 py-3 text-right">{{ number_format($log->durasi_jam, 1) }}</td>
                    <td class="px-4 py-3 text-right whitespace-nowrap">
                        <a href="{{ route('log-hours.edit', $log->id) }}" class="text-indigo-600 hover:underline">Ubah</a>
                        <form method="POST" action="{{ route('log-hours.destroy', $log->id) }}" class="inline ml-2" onsubmit="return confirm('Hapus log ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-4 py-6 text-center text-slate-500">Belum ada log jam.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $logs->links() }}</div>
@endsection
