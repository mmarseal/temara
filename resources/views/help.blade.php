@extends('layouts.app')

@section('title', 'Bantuan dan Panduan')
@section('heading', 'Bantuan dan Panduan')
@section('subheading', 'Panduan singkat memakai TEMARA dan jawaban pertanyaan umum.')

@php
    $steps = [
        'Isi profil lansia (nama, usia, dan kondisi kesehatan) di menu Profil Lansia.',
        'Buka Pengingat Obat untuk menambah jadwal obat, lalu tandai yang sudah diminum.',
        'Buka Jadwal Kontrol untuk mencatat kontrol dokter, lalu tandai selesai setelah kunjungan.',
        'Buka Pendamping dan Booking, pilih pendamping, lalu ajukan permintaan dengan tanggal dan jam.',
        'Pantau ringkasan harian di Dashboard.',
    ];
    $faqs = [
        ['Mengapa status obat kembali "Belum diminum" setiap hari?', 'Status dihitung per jadwal dan per tanggal. Saat hari berganti, semua jadwal kembali belum diminum.'],
        ['Obat saya diminum beberapa kali sehari. Bagaimana mencatatnya?', 'Buat beberapa jadwal terpisah, misalnya satu untuk pagi dan satu untuk malam. Satu baris mewakili satu jadwal konsumsi.'],
        ['Apakah status "Diajukan" berarti pendamping sudah pasti tersedia?', 'Tidak. Diajukan berarti permintaan Anda dicatat. Ketersediaan pendamping belum diverifikasi.'],
        ['Bagaimana membatalkan permintaan booking?', 'Buka riwayat booking di halaman Pendamping dan Booking, lalu pilih Batalkan pada permintaan yang masih berstatus Diajukan.'],
        ['Apakah TEMARA mengirim notifikasi atau alarm obat?', 'Belum. Pengingat hanya tampil di dalam halaman aplikasi.'],
        ['Apakah data saya bisa dilihat akun lain?', 'Tidak. Data profil lansia, obat, kontrol, dan booking hanya bisa diakses oleh pemilik akun.'],
    ];
@endphp

@section('content')
<a href="{{ route('elder') }}" class="text-sm font-semibold text-brand hover:underline">&larr; Kembali ke Profil Lansia</a>

<div class="mt-4 max-w-3xl space-y-4">
    <div class="card">
        <h2 class="card-title">Cara memulai</h2>
        <ol class="mt-4 space-y-3">
            @foreach ($steps as $s)
                <li class="flex gap-3 text-sm">
                    <span class="flex size-7 shrink-0 items-center justify-center rounded-full bg-brand-soft text-xs font-bold text-brand">{{ $loop->iteration }}</span>
                    <span class="pt-0.5 leading-relaxed">{{ $s }}</span>
                </li>
            @endforeach
        </ol>
    </div>

    <div class="card">
        <h2 class="card-title">Pertanyaan umum</h2>
        <div class="mt-4 space-y-2">
            @foreach ($faqs as [$q, $a])
                <details class="rounded-xl border border-line px-4 py-3">
                    <summary class="cursor-pointer text-sm font-bold">{{ $q }}</summary>
                    <p class="mt-2 text-sm leading-relaxed text-muted">{{ $a }}</p>
                </details>
            @endforeach
        </div>
    </div>
</div>
@endsection