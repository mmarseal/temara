@extends('layouts.app')

@section('title', 'Ubah Jadwal Kontrol')
@section('heading', 'Ubah Jadwal Kontrol')
@section('subheading', 'Perbarui tanggal atau tempat kontrol dokter.')

@php
    // TODO (backend): kirim $control dari controller (data milik user yang login).
    $id = $id ?? 1;
    $control = $control ?? ['control_date' => '2026-11-20', 'place' => 'RS Cipto Mangunkusumo'];
@endphp

@section('content')
<a href="{{ route('controls') }}" class="text-sm font-semibold text-brand hover:underline">&larr; Kembali ke Jadwal Kontrol</a>

<div class="card mt-4 max-w-xl">
    <h2 class="card-title">Data jadwal kontrol</h2>
    <form method="POST" action="#" class="mt-4 space-y-4">
        @csrf @method('PUT')
        <div>
            <label for="control_date" class="label">Tanggal kontrol</label>
            <input id="control_date" name="control_date" type="date" value="{{ old('control_date', $control['control_date']) }}" class="input">
            @error('control_date')<p class="error-text">{{ $message }}</p>@enderror
        </div>
        <div>
            <label for="place" class="label">Tempat kontrol</label>
            <input id="place" name="place" type="text" value="{{ old('place', $control['place']) }}" class="input">
            @error('place')<p class="error-text">{{ $message }}</p>@enderror
        </div>
        <div class="flex flex-wrap gap-3 pt-2">
            <button type="submit" class="btn-primary">Simpan Perubahan</button>
            <a href="{{ route('controls') }}" class="btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection