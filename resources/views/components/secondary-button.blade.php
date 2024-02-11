<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-light btn-sm']) }}>
    {{ $slot }}
</button>

