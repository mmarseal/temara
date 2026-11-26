@extends('layouts.app')

@section('title', 'Anggota Keluarga')
@section('heading', 'Anggota Keluarga')
@section('subheading', 'Daftar anggota keluarga yang mengelola profil lansia ini.')

@php
    // TODO (backend): pada MVP hanya ada pemilik akun.
    $members = $members ?? [
        ['name' => auth()->user()?->name ?? 'Budi Santoso', 'email' => auth()->user()?->email ?? 'budi@email.com', 'role' => 'Pemilik akun'],
    ];
@endphp

@section('content')
<a href="{{ route('elder') }}" class="text-sm font-semibold text-brand hover:underline">&larr; Kembali ke Profil Lansia</a>

<div class="mt-4 max-w-2xl space-y-4">
    <div class="card">
        <h2 class="card-title">Anggota yang mengelola</h2>
        <ul class="mt-3 divide-y divide-line">
            @foreach ($members as $m)
                <li class="flex flex-wrap items-center justify-between gap-3 py-4">
                    <div class="flex items-center gap-4">
                        <span class="flex size-12 shrink-0 items-center justify-center rounded-full bg-brand-soft text-lg font-bold text-brand">{{ strtoupper(substr($m['name'], 0, 1)) }}</span>
                        <div>
                            <p class="font-bold">{{ $m['name'] }}</p>
                            <p class="text-sm text-muted">{{ $m['email'] }}</p>
                        </div>
                    </div>
                    <x-badge type="success">{{ $m['role'] }}</x-badge>
                </li>
            @endforeach
        </ul>
        <button type="button" disabled class="btn-outline mt-2 cursor-not-allowed opacity-50">Tambah anggota (segera hadir)</button>
    </div>

    <p class="rounded-xl bg-warn-soft p-4 text-sm leading-relaxed text-warn">
        Pada versi MVP, satu akun mengelola satu profil lansia. Penambahan anggota keluarga dengan akun masing-masing belum tersedia.
    </p>
</div>
@endsection