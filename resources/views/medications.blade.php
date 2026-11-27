@extends('layouts.app')

@section('title', 'Pengingat Obat')
@section('heading', 'Pengingat Obat')
@section('subheading', 'Satu baris mewakili satu jadwal konsumsi. Status kembali belum diminum setiap hari baru.')

@php
    // TODO (backend): ganti dengan data dari controller.
    $medications = $medications ?? [
        ['id' => 1, 'name' => 'Amlodipine',   'dosage' => '5 mg',   'period' => 'Pagi',  'time' => '08.00', 'taken' => true],
        ['id' => 2, 'name' => 'Metformin',    'dosage' => '500 mg', 'period' => 'Siang', 'time' => '12.00', 'taken' => true],
        ['id' => 3, 'name' => 'Atorvastatin', 'dosage' => '20 mg',  'period' => 'Malam', 'time' => '19.00', 'taken' => false],
    ];
@endphp

@section('content')
<div class="grid gap-6 lg:grid-cols-3">
    <div class="card lg:col-span-2">
        <h2 class="card-title">Jadwal obat - {{ now()->translatedFormat('d M Y') }}</h2>

        <ul class="mt-3 divide-y divide-line">
            @forelse ($medications as $med)
                <li class="flex flex-wrap items-center justify-between gap-3 py-4">
                    <div>
                        <p class="font-bold">{{ $med['name'] }}</p>
                        <p class="text-sm text-muted">{{ $med['dosage'] }} - {{ $med['period'] }} - {{ $med['time'] }}</p>
                    </div>
                    <div class="flex flex-wrap items-center gap-2">
                        @if ($med['taken'])
                            <x-badge type="success" class="px-4 py-1.5">Sudah diminum</x-badge>
                        @else
                            <x-badge type="warning" class="px-4 py-1.5">Belum diminum</x-badge>
                            <form method="POST" action="{{ Route::has('medications.take') ? route('medications.take', $med['id'] ?? $loop->iteration) : '#' }}">
                                @csrf @method('PATCH')
                                <button type="submit" class="btn-primary">Tandai diminum</button>
                            </form>
                        @endif
                        <a href="{{ route('medications.edit', $med['id'] ?? $loop->iteration) }}" class="btn-outline">Ubah</a>
                        <form method="POST" action="{{ Route::has('medications.destroy') ? route('medications.destroy', $med['id'] ?? $loop->iteration) : '#' }}" onsubmit="return confirm('Hapus jadwal obat ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-danger">Hapus</button>
                        </form>
                    </div>
                </li>
            @empty
                <li class="py-6 text-sm text-muted">Belum ada jadwal obat. Tambahkan lewat formulir di samping.</li>
            @endforelse
        </ul>
    </div>

    <div class="card self-start">
        <h2 class="card-title">Tambah jadwal obat</h2>
        <form method="POST" action="{{ Route::has('medications.store') ? route('medications.store') : '#' }}" class="mt-4 space-y-4">
            @csrf
            <div>
                <label for="name" class="label">Nama obat</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" class="input">
                @error('name')<p class="error-text">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="dosage" class="label">Dosis</label>
                <input id="dosage" name="dosage" type="text" placeholder="500 mg" value="{{ old('dosage') }}" class="input">
                @error('dosage')<p class="error-text">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="period" class="label">Periode</label>
                <select id="period" name="period" class="input">
                    @foreach (['Pagi', 'Siang', 'Sore', 'Malam'] as $p)
                        <option value="{{ $p }}" @selected(old('period') === $p)>{{ $p }}</option>
                    @endforeach
                </select>
                @error('period')<p class="error-text">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="time" class="label">Jam konsumsi</label>
                <input id="time" name="time" type="time" value="{{ old('time', '08:00') }}" class="input">
                @error('time')<p class="error-text">{{ $message }}</p>@enderror
            </div>
            <button type="submit" class="btn-primary w-full py-3">Simpan Jadwal</button>
        </form>
    </div>
</div>
@endsection