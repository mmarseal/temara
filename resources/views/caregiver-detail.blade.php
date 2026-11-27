@extends('layouts.app')

@section('title', 'Detail Pendamping')
@section('heading', 'Detail Pendamping')
@section('subheading', 'Lihat profil pendamping sebelum mengajukan permintaan booking.')

@php
    // TODO (backend): kirim $caregiver dari controller (tabel caregivers).
    $id = (int) ($id ?? 1);
    $dummy = [
        1 => ['id' => 1, 'name' => 'Siti Nurhaliza', 'service_type' => 'Perawat',           'experience' => 5, 'languages' => 'Indonesia, Jawa',  'service_area' => 'Depok',            'certification' => 'Sertifikat Perawat Lansia', 'photo' => null, 'rating' => 4.8, 'review_count' => 24],
        2 => ['id' => 2, 'name' => 'Rina Wulandari', 'service_type' => 'Pendamping Lansia', 'experience' => 4, 'languages' => 'Indonesia, Sunda', 'service_area' => 'Tangerang Selatan', 'certification' => 'Pelatihan Pendamping Lansia', 'photo' => null, 'rating' => 4.7, 'review_count' => 18],
        3 => ['id' => 3, 'name' => 'Dewi Lestari',   'service_type' => 'Perawat',           'experience' => 3, 'languages' => 'Indonesia',        'service_area' => 'Jakarta Selatan',  'certification' => null,                       'photo' => null, 'rating' => 4.6, 'review_count' => 11],
    ];
    $caregiver = $caregiver ?? ($dummy[$id] ?? $dummy[1]);
    $info = [
        'Jenis layanan' => $caregiver['service_type'],
        'Pengalaman'    => $caregiver['experience'] . ' tahun',
        'Bahasa'        => $caregiver['languages'],
        'Area layanan'  => $caregiver['service_area'],
        'Sertifikasi'   => $caregiver['certification'] ?? '-',
    ];
@endphp

@section('content')
<a href="{{ route('caregivers') }}" class="text-sm font-semibold text-brand hover:underline">&larr; Kembali ke daftar pendamping</a>

<div class="mt-4 grid gap-4 lg:grid-cols-3">
    <div class="space-y-4 lg:col-span-2">
        <div class="card flex flex-wrap items-center gap-5">
            @if ($caregiver['photo'])
                <img src="{{ asset($caregiver['photo']) }}" alt="Foto {{ $caregiver['name'] }}" class="size-24 rounded-full object-cover">
            @else
                <span class="flex size-24 shrink-0 items-center justify-center rounded-full bg-brand-soft text-3xl font-bold text-brand">{{ strtoupper(substr($caregiver['name'], 0, 1)) }}</span>
            @endif
            <div>
                <h2 class="text-2xl font-bold">{{ $caregiver['name'] }}</h2>
                <p class="text-sm text-muted">{{ $caregiver['service_type'] }} - {{ $caregiver['experience'] }} tahun</p>
                <p class="mt-2 text-sm font-semibold text-warn">
                    &#9733; {{ number_format($caregiver['rating'], 1) }}
                    <span class="font-normal text-muted">({{ $caregiver['review_count'] }} ulasan)</span>
                </p>
            </div>
        </div>

        <div class="card">
            <h3 class="card-title">Informasi pendamping</h3>
            <dl class="mt-4 grid gap-3 sm:grid-cols-2">
                @foreach ($info as $label => $value)
                    <div class="rounded-xl bg-page p-4">
                        <dt class="text-xs text-muted">{{ $label }}</dt>
                        <dd class="mt-1 font-bold">{{ $value }}</dd>
                    </div>
                @endforeach
            </dl>
        </div>
    </div>

    <div class="card self-start">
        <h3 class="card-title">Tertarik dengan pendamping ini?</h3>
        <p class="mt-2 text-sm text-muted">Ajukan permintaan booking dengan memilih tanggal dan jam.</p>
        <a href="{{ route('caregivers', ['caregiver' => $caregiver['id']]) }}" class="btn-primary mt-4 w-full py-3">Ajukan Booking</a>
        <p class="mt-4 rounded-xl bg-warn-soft p-4 text-xs leading-relaxed text-warn">
            Status Diajukan berarti permintaan dicatat, bukan konfirmasi bahwa pendamping tersedia.
        </p>
    </div>
</div>
@endsection