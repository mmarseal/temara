@extends('layouts.app')

@section('title', 'Tentang TEMARA')
@section('heading', 'Tentang TEMARA')
@section('subheading', 'Temani Merawat - Menemani dengan Peduli, Merawat dengan Hati.')

@php
    $features = [
        ['Jadwal Kontrol', 'Mencatat jadwal kontrol dokter dan menandainya selesai.'],
        ['Pengingat Obat', 'Mengelola jadwal minum obat dan status diminum per hari.'],
        ['Booking Pendamping', 'Mengajukan permintaan pendamping lansia dan melihat riwayatnya.'],
    ];
@endphp

@section('content')
<a href="{{ route('elder') }}" class="text-sm font-semibold text-brand hover:underline">&larr; Kembali ke Profil Lansia</a>

<div class="mt-4 max-w-3xl space-y-4">
    <div class="card">
        <h2 class="card-title">Apa itu TEMARA?</h2>
        <p class="mt-3 text-sm leading-relaxed text-muted">
            TEMARA adalah aplikasi web pendamping perawatan lansia yang membantu anggota keluarga mengelola kebutuhan perawatan orang tua dalam satu tempat yang sederhana.
        </p>
    </div>

    <div class="grid gap-4 md:grid-cols-3">
        @foreach ($features as [$title, $desc])
            <div class="card">
                <h3 class="font-bold text-brand">{{ $title }}</h3>
                <p class="mt-2 text-sm leading-relaxed text-muted">{{ $desc }}</p>
            </div>
        @endforeach
    </div>

    <div class="card">
        <h2 class="card-title">Informasi aplikasi</h2>
        <dl class="mt-3 grid gap-3 text-sm sm:grid-cols-2">
            <div class="rounded-xl bg-page p-4"><dt class="text-xs text-muted">Versi</dt><dd class="mt-1 font-bold">Web MVP 1.1</dd></div>
            <div class="rounded-xl bg-page p-4"><dt class="text-xs text-muted">Mata kuliah</dt><dd class="mt-1 font-bold">Pemrograman 2</dd></div>
        </dl>
    </div>

    <p class="rounded-xl bg-warn-soft p-4 text-sm leading-relaxed text-warn">
        TEMARA adalah prototype tugas kuliah dengan data sintetis, bukan layanan kesehatan. Informasi di dalamnya bukan pengganti rekam medis atau saran tenaga kesehatan.
    </p>
</div>
@endsection