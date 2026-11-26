@extends('layouts.app')

@section('title', 'Profil Lansia')
@section('heading', 'Profil Lansia')
@section('subheading', 'Kelola informasi dan kondisi kesehatan lansia yang Anda dampingi.')

@php
    // TODO (backend): ganti dengan data dari controller.
    $elder = $elder ?? ['name' => 'Ibu Sari', 'age' => 72, 'condition' => 'Hipertensi'];
    $family = ['name' => auth()->user()?->name ?? 'Budi Santoso', 'email' => auth()->user()?->email ?? 'budi@email.com'];
    $initials = collect(explode(' ', $elder['name']))->map(fn ($w) => strtoupper(substr($w, 0, 1)))->take(2)->implode('');
    $settings = [['Anggota Keluarga', 'family'], ['Tentang TEMARA', 'about'], ['Bantuan dan Panduan', 'help']];
@endphp

@section('content')
<div class="grid gap-6 lg:grid-cols-3">
    <div class="space-y-6 lg:col-span-2">

        {{-- 1. Header profil lansia --}}
        <div class="card flex items-center gap-5">
            <span class="flex size-20 shrink-0 items-center justify-center rounded-full bg-brand-soft text-2xl font-bold text-brand sm:size-24">{{ $initials }}</span>
            <div>
                <h2 class="text-xl font-bold">{{ $elder['name'] }}</h2>
                <p class="text-sm text-muted">Profil lansia &bull; Data dikelola oleh keluarga</p>
                <p class="mt-2 flex items-center gap-2 text-xs font-semibold text-ok">
                    <span class="size-2 rounded-full bg-ok"></span> Data profil tersimpan
                </p>
            </div>
        </div>

        {{-- 2. Form ubah profil lansia --}}
        <div class="card">
            <h3 class="card-title">Ubah profil lansia</h3>
            <form method="POST" action="{{ Route::has('elder.update') ? route('elder.update') : '#' }}" class="mt-5 grid gap-5 sm:grid-cols-2">
                @csrf @method('PUT')
                <div class="sm:col-span-2">
                    <label for="name" class="label">Nama</label>
                    <input id="name" name="name" type="text" value="{{ old('name', $elder['name']) }}" class="input">
                    @error('name')<p class="error-text">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="age" class="label">Usia</label>
                    <input id="age" name="age" type="number" min="0" value="{{ old('age', $elder['age']) }}" class="input">
                    @error('age')<p class="error-text">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="condition" class="label">Kondisi kesehatan</label>
                    <input id="condition" name="condition" type="text" value="{{ old('condition', $elder['condition']) }}" class="input">
                    @error('condition')<p class="error-text">{{ $message }}</p>@enderror
                </div>
                <div class="sm:col-span-2">
                    <button type="submit" class="btn-primary">Simpan Profil</button>
                </div>
            </form>
        </div>

        <!-- {{-- 3. Profil keluarga --}}
        <div class="space-y-4">
            <h2 class="text-2xl font-bold">Profil Keluarga lansia</h2>

            <div class="card flex flex-wrap items-center justify-between gap-5">
                <div class="flex items-center gap-5">
                    <span class="flex size-20 shrink-0 items-center justify-center rounded-full bg-brand-soft text-2xl font-bold text-brand">{{ strtoupper(substr($family['name'], 0, 1)) }}</span>
                    <div>
                        <p class="text-lg font-bold">{{ $family['name'] }}</p>
                        <p class="text-sm text-muted">{{ $family['email'] }}</p>
                        <p class="mt-1 text-xs font-semibold text-brand">Akun keluarga TEMARA</p>
                    </div>
                </div>
                <a href="{{ route('account') }}" class="btn-outline">Ubah foto</a>
            </div>
        </div> -->

    {{-- Ringkasan kesehatan --}}
    <div class="card self-start">
        <h3 class="card-title">Ringkasan Kesehatan Lansia</h3>
        <div class="mt-5 space-y-5">
            <div class="rounded-xl bg-page p-4">
                <p class="text-xs text-muted">Usia</p>
                <p class="mt-1 text-xl font-bold">{{ $elder['age'] }} tahun</p>
            </div>
            <div class="rounded-xl bg-warn-soft p-4">
                <p class="text-xs text-warn">Kondisi kesehatan</p>
                <p class="mt-1 text-xl font-bold text-warn">{{ $elder['condition'] }}</p>
            </div>
            <p class="text-xs leading-relaxed text-muted">
                Informasi ini digunakan sebagai catatan keluarga, bukan pengganti rekam medis atau saran tenaga kesehatan.
            </p>
        </div>
    </div>
</div>

 {{-- 5. Pengaturan & Bantuan (paling bawah) --}}
        <div class="card">
            <h3 class="card-title">Pengaturan &amp; Bantuan</h3>
            <div class="mt-5 grid gap-4 sm:grid-cols-2">
                @foreach ($settings as [$label, $to])
                    <a href="{{ route($to) }}" class="flex items-center justify-between rounded-xl border border-line px-4 py-3 text-sm font-bold hover:bg-page">
                        {{ $label }} <span class="text-muted">&rsaquo;</span>
                    </a>
                @endforeach
                <form method="POST" action="#" onsubmit="return confirm('Reset semua data? Tindakan ini tidak dapat dibatalkan.')">
                    @csrf @method('DELETE')
                    <button type="submit" class="w-full cursor-pointer rounded-xl border border-warn/20 bg-orange-50 px-4 py-3 text-left text-sm font-bold text-warn hover:brightness-95">Reset Semua Data</button>
                </form>
            </div>
        </div>
    </div>
@endsection