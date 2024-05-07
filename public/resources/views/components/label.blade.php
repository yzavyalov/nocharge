@props(['value'])

<label class="block font-medium text-sm text-gray-700 border-bottom">
    {{ $value ?? $slot }}
</label>

