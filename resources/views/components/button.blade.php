@props(['href' => null, 'type' => 'button', 'variant' => 'primary'])

@php
$variants = [
    'primary'   => 'bg-primary hover:bg-secondary text-white',
    'secondary' => 'bg-gray-500 hover:bg-gray-600 text-white',
    'danger'    => 'bg-red-500 hover:bg-red-600 text-white',
];
$classes = 'inline-flex items-center justify-center px-5 py-2 rounded-full transition ' . $variants[$variant];
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</button>
@endif
