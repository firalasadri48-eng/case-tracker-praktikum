<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Case Tracker') — Praktikum I Kesos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 text-slate-800 min-h-screen">
    <nav class="bg-indigo-700 text-white shadow">
        <div class="max-w-6xl mx-auto px-4 py-3 flex flex-wrap items-center gap-4">
            <a href="{{ route('dashboard') }}" class="font-bold text-lg">📋 Case Tracker <span class="font-normal text-indigo-200 text-sm">Praktikum I</span></a>
            <div class="flex flex-wrap gap-1 text-sm">
                <a href="{{ route('dashboard') }}" class="px-3 py-1.5 rounded hover:bg-indigo-600 {{ request()->routeIs('dashboard') ? 'bg-indigo-600' : '' }}">Dashboard</a>
                <a href="{{ route('klien.index') }}" class="px-3 py-1.5 rounded hover:bg-indigo-600 {{ request()->routeIs('klien.*') ? 'bg-indigo-600' : '' }}">Klien</a>
                <a href="{{ route('supervisi.index') }}" class="px-3 py-1.5 rounded hover:bg-indigo-600 {{ request()->routeIs('supervisi.*') ? 'bg-indigo-600' : '' }}">Supervisi</a>
                <a href="{{ route('log-hours.index') }}" class="px-3 py-1.5 rounded hover:bg-indigo-600 {{ request()->routeIs('log-hours.*') ? 'bg-indigo-600' : '' }}">Log Hour</a>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 py-6">
        @if (session('sukses'))
            <div class="mb-4 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded">
                {{ session('sukses') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded">
                <p class="font-semibold mb-1">Ada yang perlu diperbaiki:</p>
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="max-w-6xl mx-auto px-4 py-6 text-center text-xs text-slate-500">
        Case Tracker Praktikum I — Program Studi Kesejahteraan Sosial, UMJ. Data klien bersifat rahasia.
    </footer>
</body>
</html>
