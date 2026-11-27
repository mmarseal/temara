@props(['type' => 'success'])
@php
    $styles = [
        'success' => 'bg-ok-soft text-ok border-ok/20',
        'warning' => 'bg-warn-soft text-warn border-warn/20',
        'danger'  => 'bg-bad-soft text-bad border-bad/20',
    ];
@endphp
<div role="alert" {{ $attributes->merge(['class' => 'mb-5 flex items-start justify-between gap-3 rounded-xl border px-4 py-3 text-sm font-medium ' . ($styles[$type] ?? $styles['success'])]) }}>
    <div>{{ $slot }}</div>
    <button type="button" aria-label="Tutup" class="cursor-pointer text-lg leading-none opacity-60 hover:opacity-100" onclick="this.closest('[role=alert]').remove()">&times;</button>
</div>