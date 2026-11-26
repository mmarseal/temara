<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'TEMARA') - TEMARA</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-page font-sans text-ink antialiased">
@php
    $menu = [
        ['dashboard',   'Dashboard',              ['dashboard']],
        ['medications', 'Pengingat Obat',         ['medications', 'medications.*']],
        ['controls',    'Jadwal Kontrol',         ['controls', 'controls.*']],
        ['caregivers',  'Pendamping dan Booking', ['caregivers', 'caregivers.*']],
        ['elder',       'Profil Lansia',          ['elder', 'family', 'about', 'help']],
        ['account',     'Profil Akun',            ['account']],
    ];
    $initial = strtoupper(substr(auth()->user()?->name ?? 'Budi', 0, 1));
@endphp

<div class="min-h-screen lg:flex">
    {{-- Overlay (mobile) --}}
    <div id="overlay" class="fixed inset-0 z-30 hidden bg-ink/40 lg:hidden"></div>

    {{-- Sidebar --}}
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-40 flex w-64 shrink-0 -translate-x-full flex-col border-r border-line bg-white px-4 py-6 transition-transform lg:sticky lg:top-0 lg:h-screen lg:translate-x-0">
        <div class="px-3"><x-logo /></div>

        <nav class="mt-8 flex flex-col gap-1">
            @foreach ($menu as [$route, $label, $patterns])
                @php $active = request()->routeIs(...$patterns); @endphp
                <a href="{{ Route::has($route) ? route($route) : '#' }}"
                   class="rounded-xl px-4 py-3 text-sm {{ $active ? 'bg-brand-soft font-bold text-brand' : 'text-ink hover:bg-page' }}">
                    {{ $label }}
                </a>
            @endforeach
        </nav>

        <form method="POST" action="{{ Route::has('logout') ? route('logout') : '#' }}" class="mt-auto">
            @csrf
            <button type="submit" class="w-full cursor-pointer rounded-xl bg-bad-soft px-4 py-3 text-left text-sm font-bold text-bad hover:brightness-95">
                Keluar dari Akun
            </button>
        </form>
    </aside>

    <div class="min-w-0 flex-1">
        {{-- Top bar (mobile) --}}
        <header class="sticky top-0 z-20 flex items-center justify-between border-b border-line bg-white px-4 py-3 lg:hidden">
            <button id="menuBtn" type="button" aria-label="Buka menu" class="cursor-pointer rounded-lg p-2 text-ink hover:bg-page">
                <svg viewBox="0 0 24 24" class="size-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
            <x-logo />
            <span class="flex size-9 items-center justify-center rounded-full bg-brand-soft text-sm font-bold text-brand">{{ $initial }}</span>
        </header>

        <main class="px-4 py-6 sm:px-8 lg:px-10 lg:py-8">
            <div class="mb-6 flex items-start justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-ink sm:text-3xl">@yield('heading')</h1>
                    <p class="mt-1 text-sm text-muted">@yield('subheading')</p>
                </div>
                <span class="hidden size-12 shrink-0 items-center justify-center rounded-full bg-brand-soft font-bold text-brand lg:flex">{{ $initial }}</span>
            </div>

            {{-- Pesan dari backend: redirect()->with('success', '...') / with('error', '...') --}}
            @if (session('success'))
                <x-alert type="success">{{ session('success') }}</x-alert>
            @endif
            @if (session('error'))
                <x-alert type="danger">{{ session('error') }}</x-alert>
            @endif
            @if ($errors->any())
                <x-alert type="danger">Data belum bisa disimpan. Periksa kembali isian yang ditandai.</x-alert>
            @endif

            @yield('content')
        </main>
    </div>
</div>

<script>
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    function toggleMenu() {
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    }
    document.getElementById('menuBtn')?.addEventListener('click', toggleMenu);
    overlay.addEventListener('click', toggleMenu);
</script>
</body>
</html>