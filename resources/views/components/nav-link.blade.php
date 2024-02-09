@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'nav-link active' // активная ссылка
                : 'nav-link'; // неактивная ссылка
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

