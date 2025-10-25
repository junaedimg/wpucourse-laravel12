@props(['href', 'current' => false, 'ariaCurrent' => false])
{{-- rounded-md bg-gray-950/50 px-3 py-2 text-sm font-medium text-white --}}


@php
    if ($current) {
        $classes = 'bg-gray-900 text-white';
        $ariaCurrent = 'page';
    } else {
        $classes = $current ? 'bg-gray-950/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white';
    }

@endphp

<a href="{{ $href }}"
    {{ $attributes->merge(['class' => 'rounded-md px-3 py-2 text-sm font-medium ' . $classes , 'aria-current' => $ariaCurrent]) }}>

    
    {{ $slot }}
</a>
