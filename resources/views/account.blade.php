@extends('layouts.app')

@section('title', 'Profil Akun')
@section('heading', 'Profil Akun')
@section('subheading', 'Kelola data akun keluarga yang Anda gunakan untuk masuk ke TEMARA.')

@php
    // TODO (backend): pakai data auth()->user().
    $user = ['name' => auth()->user()?->name ?? 'Budi Santoso', 'email' => auth()->user()?->email ?? 'budi@email.com'];
@endphp

@section('content')
<div class="space-y-4">
    <div class="card flex flex-wrap items-center justify-between gap-5">
        <div class="flex items-center gap-5">
            <span class="flex size-20 shrink-0 items-center justify-center rounded-full bg-brand-soft text-2xl font-bold text-brand">{{ strtoupper(substr($user['name'], 0, 1)) }}</span>
            <div>
                <p class="text-xl font-bold">{{ $user['name'] }}</p>
                <p class="text-sm text-muted">{{ $user['email'] }}</p>
                <p class="mt-1 text-xs font-semibold text-brand">Akun keluarga TEMARA</p>
            </div>
        </div>
    </div>

    <div class="grid gap-4 lg:grid-cols-2">
        <div class="card">
            <h2 class="card-title">Informasi akun</h2>
            <form method="POST" action="#" class="mt-4 space-y-4">
                @csrf @method('PUT')
                <div>
                    <label for="name" class="label">Nama</label>
                    <input id="name" name="name" type="text" value="{{ old('name', $user['name']) }}" class="input">
                    @error('name')<p class="error-text">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="email" class="label">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email', $user['email']) }}" class="input">
                    @error('email')<p class="error-text">{{ $message }}</p>@enderror
                </div>
                <button type="submit" class="btn-primary">Simpan Perubahan</button>
            </form>
        </div>

        <div class="card self-start">
            <h2 class="card-title">Ubah kata sandi</h2>
            <form method="POST" action="#" class="mt-4 space-y-4">
                @csrf @method('PUT')
                <div>
                    <label for="current_password" class="label">Kata sandi saat ini</label>
                    <input id="current_password" name="current_password" type="password" autocomplete="current-password" class="input">
                    @error('current_password')<p class="error-text">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="password" class="label">Kata sandi baru</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" class="input">
                    @error('password')<p class="error-text">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="password_confirmation" class="label">Ulangi kata sandi baru</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" class="input">
                </div>
                <button type="submit" class="btn-primary">Ubah Kata Sandi</button>
            </form>
        </div>
    </div>
</div>
@endsection