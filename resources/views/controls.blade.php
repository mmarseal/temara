@extends('layouts.app')

@section('title', 'Jadwal Kontrol')
@section('heading', 'Jadwal Kontrol Dokter')
@section('subheading', 'Catat kontrol mendatang dan tandai selesai setelah kunjungan.')

@php
    // TODO (backend): ganti dengan data dari controller.
    $upcoming = $upcoming ?? [
        ['date' => '20 Nov 2026', 'place' => 'RS Cipto Mangunkusumo'],
    ];
    $history = $history ?? [
        ['date' => '15 Okt 2026', 'place' => 'Poliklinik Penyakit Dalam'],
        ['date' => '20 Jan 2026', 'place' => 'Poliklinik Geriatri'],
    ];
@endphp

@section('content')
<div class="grid gap-4 lg:grid-cols-3">
    <div class="space-y-4 lg:col-span-2">
        <div class="card">
            <h2 class="card-title">Kontrol mendatang</h2>
            <ul class="mt-3 divide-y divide-line">
                @forelse ($upcoming as $c)
                    <li class="flex flex-wrap items-center justify-between gap-3 py-4">
                        <div>
                            <p class="text-lg font-bold">{{ $c['date'] }}</p>
                            <p class="text-sm text-muted">{{ $c['place'] }}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <form method="POST" action="#">
                                @csrf
                                <button type="submit" class="btn-primary">Tandai selesai</button>
                            </form>
                            <a href="{{ route('controls.edit', $c['id'] ?? $loop->iteration) }}" class="btn-outline">Ubah</a>
                            <form method="POST" action="#" onsubmit="return confirm('Hapus jadwal kontrol ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-danger">Hapus</button>
                            </form>
                        </div>
                    </li>
                @empty
                    <li class="py-6 text-sm text-muted">Belum ada jadwal kontrol mendatang.</li>
                @endforelse
            </ul>
        </div>

        <div class="card">
            <h2 class="card-title">Riwayat kontrol selesai</h2>
            <ul class="mt-3 divide-y divide-line">
                @forelse ($history as $c)
                    <li class="flex items-center justify-between gap-3 py-4">
                        <div>
                            <p class="text-lg font-bold">{{ $c['date'] }}</p>
                            <p class="text-sm text-muted">{{ $c['place'] }}</p>
                        </div>
                        <x-badge type="success" class="px-5 py-2">Selesai</x-badge>
                    </li>
                @empty
                    <li class="py-6 text-sm text-muted">Belum ada riwayat kontrol.</li>
                @endforelse
            </ul>
        </div>
    </div>

    <div class="card self-start">
        <h2 class="card-title">Tambah jadwal kontrol</h2>
        <form method="POST" action="#" class="mt-4 space-y-4">
            @csrf
            <div>
                <label for="control_date" class="label">Tanggal kontrol</label>
                <input id="control_date" name="control_date" type="date" value="{{ old('control_date') }}" class="input">
                @error('control_date')<p class="error-text">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="place" class="label">Tempat kontrol</label>
                <input id="place" name="place" type="text" placeholder="RS Cipto Mangunkusumo" value="{{ old('place') }}" class="input">
                @error('place')<p class="error-text">{{ $message }}</p>@enderror
            </div>
            <button type="submit" class="btn-primary w-full py-3">Simpan Jadwal</button>
        </form>
    </div>
</div>
@endsection