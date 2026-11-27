@props(['type' => 'success'])
@php
    $styles = [
        'success' => 'bg-ok-soft text-ok',
        'warning' => 'bg-warn-soft text-warn',
        'danger'  => 'bg-bad-soft text-bad',
    ];
@endphp
<span {{ $attributes->merge(['class' => 'inline-block whitespace-nowrap rounded-full px-3 py-1 text-xs font-semibold ' . ($styles[$type] ?? $styles['success'])]) }}>{{ $slot }}</span>
