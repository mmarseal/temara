@extends('layouts.app')

@php
    // TODO (backend): ganti data dummy ini dengan data dari controller.
    $elder = $elder ?? ['name' => 'Ibu Sari', 'age' => 72, 'condition' => 'Hipertensi'];
    $nextControl = $nextControl ?? ['date' => '20 Nov 2026', 'place' => 'RS Cipto Mangunkusumo', 'done' => false];
    $medications = $medications ?? [
        ['id' => 1, 'name' => 'Amlodipine',   'dosage' => '5 mg',   'period' => 'Pagi',  'time' => '08.00', 'taken' => true],
        ['id' => 2, 'name' => 'Metformin',    'dosage' => '500 mg', 'period' => 'Siang', 'time' => '12.00', 'taken' => true],
        ['id' => 3, 'name' => 'Atorvastatin', 'dosage' => '20 mg',  'period' => 'Malam', 'time' => '19.00', 'taken' => false],
    ];
    $total = count($medications);
    $taken = collect($medications)->where('taken', true)->count();
    $percent = $total ? round($taken / $total * 100) : 0;
@endphp

@section('title', 'Dashboard')
@section('heading', 'Halo, ' . (auth()->user()?->name ?? 'Budi') . '!')
@section('subheading', 'Semoga hari ini lancar dan sehat untuk ' . $elder['name'] . '.')

@section('content')
<div class="grid gap-4 md:grid-cols-3">
    {{-- Ringkasan lansia --}}
    <div class="card flex flex-col gap-3">
        <div class="flex items-center gap-4">
            <span class="flex size-12 shrink-0 items-center justify-center rounded-full bg-warn-soft text-lg font-bold text-warn">{{ \Illuminate\Support\Str::of($elder['name'])->afterLast(' ')->substr(0, 1)->upper() }}</span>
            <div>
                <p class="font-bold">{{ $elder['name'] }}</p>
                <p class="text-sm text-muted">{{ $elder['age'] }} tahun - {{ $elder['condition'] }}</p>
            </div>
        </div>
        <a href="{{ route('elder') }}" class="btn-outline self-start">Ubah profil lansia</a>
    </div>

    {{-- Kontrol terdekat --}}
    <div class="card">
        <p class="text-sm text-muted">Kontrol terdekat</p>
        <p class="mt-1 text-2xl font-bold">{{ $nextControl['date'] }}</p>
        <div class="mt-1 flex flex-wrap items-center justify-between gap-2">
            <p class="text-sm text-muted">{{ $nextControl['place'] }}</p>
            @if ($nextControl['done'])
                <x-badge type="success">Selesai</x-badge>
            @else
                <x-badge type="warning">Belum selesai</x-badge>
            @endif
        </div>
    </div>

    {{-- Progres obat --}}
    <div class="card">
        <p class="text-sm text-muted">Obat hari ini</p>
        <p class="mt-1 text-2xl font-bold">{{ $taken }} dari {{ $total }} diminum</p>
        <div class="mt-3 h-2 overflow-hidden rounded-full bg-line">
            <div class="h-full rounded-full bg-brand" style="width: {{ $percent }}%"></div>
        </div>
    </div>
</div>

<div class="mt-6 grid gap-6 lg:grid-cols-3">
    {{-- Jadwal obat --}}
    <div class="card lg:col-span-2">
        <h2 class="card-title">Jadwal obat hari ini</h2>
        <ul class="mt-3 divide-y divide-line">
            @forelse ($medications as $med)
                <li class="flex items-center justify-between gap-3 py-4">
                    <div>
                        <p class="font-bold">{{ $med['name'] }} {{ $med['dosage'] }}</p>
                        <p class="text-sm text-muted">{{ $med['period'] }} - {{ $med['time'] }}</p>
                    </div>
                    @if ($med['taken'])
                        <x-badge type="success" class="px-5 py-2">Sudah diminum</x-badge>
                    @else
                        <form method="POST" action="{{ Route::has('medications.take') ? route('medications.take', $med['id'] ?? $loop->iteration) : '#' }}">
                            @csrf @method('PATCH')
                            <button type="submit" class="btn-primary">Tandai diminum</button>
                        </form>
                    @endif
                </li>
            @empty
                <li class="py-6 text-sm text-muted">
                    Belum ada jadwal obat hari ini.
                    <a href="{{ route('medications') }}" class="font-semibold text-brand hover:underline">Tambah jadwal obat</a>
                </li>
            @endforelse
        </ul>
    </div>

    {{-- Menu cepat --}}
    <div class="card self-start">
        <h2 class="card-title">Menu cepat</h2>
        <div class="mt-4 flex flex-col gap-3">
            <a href="{{ route('caregivers') }}" class="btn-primary py-3">Booking Pendamping</a>
            <a href="{{ route('controls') }}" class="btn-outline py-3">Jadwal Kontrol</a>
            <a href="{{ route('medications') }}" class="btn-outline py-3">Pengingat Obat</a>
        </div>
    </div>
</div>
@endsection