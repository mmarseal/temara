@extends('layouts.app')

@section('title', 'Pendamping dan Booking')
@section('heading', 'Pendamping dan Booking')
@section('subheading', 'Pilih pendamping lalu ajukan permintaan. Ketersediaan belum diverifikasi.')

@php
    // TODO (backend): ganti dengan data dari controller (caregivers & bookings).
    $caregivers = $caregivers ?? [
        ['id' => 1, 'name' => 'Siti Nurhaliza',   'service' => 'Perawat',            'years' => 5, 'area' => 'Indonesia, Jawa - Depok'],
        ['id' => 2, 'name' => 'Rina Wulandari',   'service' => 'Pendamping Lansia',  'years' => 4, 'area' => 'Indonesia, Sunda - Tangerang Selatan'],
        ['id' => 3, 'name' => 'Dewi Lestari',     'service' => 'Perawat',            'years' => 3, 'area' => 'Indonesia - Jakarta Selatan'],
    ];
    $totalCaregivers = $totalCaregivers ?? 5;
    $bookings = $bookings ?? [
        ['caregiver' => 'Siti Nurhaliza', 'date' => '25 Nov 2026', 'time' => '08.00-12.00', 'status' => 'Diajukan'],
        ['caregiver' => 'Rina Wulandari', 'date' => '10 Nov 2026', 'time' => '09.00-13.00', 'status' => 'Selesai'],
        ['caregiver' => 'Dewi Lestari',   'date' => '02 Nov 2026', 'time' => '10.00-14.00', 'status' => 'Dibatalkan'],
    ];
    $statusType = ['Diajukan' => 'warning', 'Selesai' => 'success', 'Dibatalkan' => 'danger'];
@endphp

@section('content')
<div class="grid gap-6 lg:grid-cols-3">
    <div class="space-y-6 lg:col-span-2">
        <div class="card">
            <h2 class="card-title">Daftar pendamping</h2>

            {{-- Pencarian & filter --}}
            <form method="GET" action="{{ route('caregivers') }}" class="mt-4 flex flex-wrap gap-3">
                <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari nama atau wilayah" class="input sm:flex-1">
                <select name="service" class="input sm:w-48">
                    <option value="">Semua layanan</option>
                    @foreach (['Perawat', 'Pendamping Lansia'] as $s)
                        <option value="{{ $s }}" @selected(request('service') === $s)>{{ $s }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn-primary">Cari</button>
            </form>

            <ul class="mt-3 divide-y divide-line">
                @forelse ($caregivers as $c)
                    <li class="flex items-center gap-4 py-4">
                        <span class="flex size-12 shrink-0 items-center justify-center rounded-full bg-brand-soft text-lg font-bold text-brand">{{ strtoupper(substr($c['name'], 0, 1)) }}</span>
                        <div class="min-w-0 flex-1">
                            <p class="font-bold">{{ $c['name'] }}</p>
                            <p class="text-sm text-muted">{{ $c['service'] }} - {{ $c['years'] }} tahun</p>
                            <p class="text-xs text-muted">{{ $c['area'] }}</p>
                        </div>
                        <a href="{{ route('caregivers.show', $c['id']) }}" class="btn-outline shrink-0">Lihat detail</a>
                    </li>
                @empty
                    <li class="py-6 text-sm text-muted">Pendamping tidak ditemukan.</li>
                @endforelse
            </ul>

            {{-- Tombol halaman (otomatis muncul jika backend memakai paginate()) --}}
            @if ($caregivers instanceof \Illuminate\Contracts\Pagination\Paginator)
                <div class="mt-4">{{ $caregivers->links() }}</div>
            @else
                <p class="mt-2 text-xs text-muted">Menampilkan {{ count($caregivers) }} dari {{ $totalCaregivers }} pendamping.</p>
            @endif
        </div>

        <div class="card">
            <h2 class="card-title">Riwayat booking</h2>
            <ul class="mt-3 divide-y divide-line">
                @forelse ($bookings as $b)
                    <li class="flex flex-wrap items-center justify-between gap-3 py-3">
                        <div>
                            <p class="font-bold">{{ $b['caregiver'] }}</p>
                            <p class="text-xs text-muted">{{ $b['date'] }}, {{ $b['time'] }}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <x-badge :type="$statusType[$b['status']] ?? 'warning'" class="px-5 py-2">{{ $b['status'] }}</x-badge>
                            @if ($b['status'] === 'Diajukan')
                                <form method="POST" action="#" onsubmit="return confirm('Batalkan permintaan ini?')">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="btn-danger">Batalkan</button>
                                </form>
                            @endif
                        </div>
                    </li>
                @empty
                    <li class="py-6 text-sm text-muted">Belum ada riwayat booking.</li>
                @endforelse
            </ul>
        </div>
    </div>

    <div id="form-booking" class="card self-start">
        <h2 class="card-title">Ajukan permintaan booking</h2>
        <form method="POST" action="#" class="mt-4 space-y-4">
            @csrf
            <div>
                <label for="caregiver_id" class="label">Pendamping</label>
                <select id="caregiver_id" name="caregiver_id" class="input">
                    {{-- Backend: kirim $allCaregivers (semua pendamping, tanpa paginate) --}}
                    @foreach ($allCaregivers ?? $caregivers as $c)
                        <option value="{{ $c['id'] }}" @selected(old('caregiver_id', request('caregiver')) == $c['id'])>{{ $c['name'] }}</option>
                    @endforeach
                </select>
                @error('caregiver_id')<p class="error-text">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="booking_date" class="label">Tanggal</label>
                <input id="booking_date" name="booking_date" type="date" min="{{ now()->toDateString() }}" value="{{ old('booking_date') }}" class="input">
                @error('booking_date')<p class="error-text">{{ $message }}</p>@enderror
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label for="start_time" class="label">Jam mulai</label>
                    <input id="start_time" name="start_time" type="time" value="{{ old('start_time', '10:00') }}" class="input">
                    @error('start_time')<p class="error-text">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="end_time" class="label">Jam selesai</label>
                    <input id="end_time" name="end_time" type="time" value="{{ old('end_time', '12:00') }}" class="input">
                    @error('end_time')<p class="error-text">{{ $message }}</p>@enderror
                </div>
            </div>
            <button type="submit" class="btn-primary w-full py-3">Ajukan Permintaan</button>
            <p class="rounded-xl bg-warn-soft p-4 text-xs leading-relaxed text-warn">
                Status Diajukan berarti permintaan dicatat, bukan konfirmasi bahwa pendamping tersedia.
            </p>
        </form>
    </div>
</div>
@endsection