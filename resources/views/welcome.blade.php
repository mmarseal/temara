<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TEMARA - Menemani dengan Peduli, Merawat dengan Hati</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-page font-sans text-ink antialiased">
@php
    $features = [
        ['Jadwal Kontrol', 'Catat tanggal dan tempat kontrol, lalu tandai selesai setelah kunjungan.'],
        ['Pengingat Obat', 'Atur nama, dosis, dan jam. Tandai yang sudah diminum hari ini.'],
        ['Booking Pendamping', 'Pilih pendamping, ajukan permintaan, dan lihat riwayatnya.'],
    ];
@endphp

<header class="mx-auto flex max-w-6xl items-center px-4 py-5 sm:px-8">
    <x-logo />
</header>

<main class="mx-auto max-w-6xl px-4 sm:px-8">
    <section class="grid items-center gap-10 py-10 lg:grid-cols-2 lg:py-16">
        <div>
            <h1 class="mt-5 text-4xl font-bold leading-tight sm:text-5xl">
                Menemani dengan <span class="text-brand">Peduli</span>, Merawat dengan <span class="text-brand">Hati</span>
            </h1>
            <p class="mt-5 max-w-lg text-base leading-relaxed text-muted">
                TEMARA membantu keluarga mencatat jadwal kontrol dokter, mengelola pengingat minum obat, dan mengajukan permintaan pendamping lansia.
            </p>
            <div class="mt-7">
                <a href="{{ route('login') }}" class="btn-primary px-7 py-3">Mulai Sekarang</a>
            </div>
        </div>

        <div class="card space-y-4 p-6 sm:p-8">
            <div class="rounded-xl bg-page p-5">
                <p class="text-sm text-muted">Kontrol terdekat</p>
                <p class="mt-1 font-bold">20 Nov 2026 - RS Cipto Mangunkusumo</p>
            </div>
            <div class="rounded-xl bg-page p-5">
                <p class="text-sm text-muted">Obat hari ini</p>
                <p class="mt-1 font-bold">2 dari 3 jadwal sudah diminum</p>
                <div class="mt-3 h-2 overflow-hidden rounded-full bg-line"><div class="h-full w-2/3 rounded-full bg-brand"></div></div>
            </div>
        </div>
    </section>

    <section class="pb-14">
        <h2 class="text-2xl font-bold">Tiga hal yang bisa Anda kelola</h2>
        <div class="mt-6 grid gap-4 md:grid-cols-3">
            @foreach ($features as [$title, $desc])
                <div class="card">
                    <h3 class="font-bold text-brand">{{ $title }}</h3>
                    <p class="mt-2 text-sm leading-relaxed text-muted">{{ $desc }}</p>
                </div>
            @endforeach
        </div>
    </section>
</main>

<!-- <footer class="border-t border-line bg-white px-4 py-6 text-center text-xs text-muted">
</footer> -->
</body>
</html>