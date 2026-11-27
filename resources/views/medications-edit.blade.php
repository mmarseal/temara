@extends('layouts.app')

@section('title', 'Ubah Jadwal Obat')
@section('heading', 'Ubah Jadwal Obat')
@section('subheading', 'Perbarui nama, dosis, periode, atau jam konsumsi obat.')

@php
    // TODO (backend): kirim $medication dari controller (data milik user yang login).
    $id = $id ?? 1;
    $medication = $medication ?? ['name' => 'Amlodipine', 'dosage' => '5 mg', 'period' => 'Pagi', 'time' => '08:00'];
@endphp

@section('content')
<a href="{{ route('medications') }}" class="text-sm font-semibold text-brand hover:underline">&larr; Kembali ke Pengingat Obat</a>

<div class="card mt-4 max-w-xl">
    <h2 class="card-title">Data jadwal obat</h2>
    <form method="POST" action="#" class="mt-4 space-y-4">
        @csrf @method('PUT')
        <div>
            <label for="name" class="label">Nama obat</label>
            <input id="name" name="name" type="text" value="{{ old('name', $medication['name']) }}" class="input">
            @error('name')<p class="error-text">{{ $message }}</p>@enderror
        </div>
        <div>
            <label for="dosage" class="label">Dosis</label>
            <input id="dosage" name="dosage" type="text" value="{{ old('dosage', $medication['dosage']) }}" class="input">
            @error('dosage')<p class="error-text">{{ $message }}</p>@enderror
        </div>
        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <label for="period" class="label">Periode</label>
                <select id="period" name="period" class="input">
                    @foreach (['Pagi', 'Siang', 'Sore', 'Malam'] as $p)
                        <option value="{{ $p }}" @selected(old('period', $medication['period']) === $p)>{{ $p }}</option>
                    @endforeach
                </select>
                @error('period')<p class="error-text">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="time" class="label">Jam konsumsi</label>
                <input id="time" name="time" type="time" value="{{ old('time', $medication['time']) }}" class="input">
                @error('time')<p class="error-text">{{ $message }}</p>@enderror
            </div>
        </div>
        <div class="flex flex-wrap gap-3 pt-2">
            <button type="submit" class="btn-primary">Simpan Perubahan</button>
            <a href="{{ route('medications') }}" class="btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection