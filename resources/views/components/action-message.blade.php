@props(['on'])

<div x-data="{ shown: false, timeout: null }"
     x-init="@this.on('{{ $on }}', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000); })"
     x-show.transition.out.opacity.duration.1500ms="shown"
     x-transition:leave.opacity.duration.1500ms
     class="alert alert-info alert-dismissible fade show"
     role="alert">
    <span class="text-sm text-gray-600">
        {{ $slot->isEmpty() ? 'Saved.' : $slot }}
    </span>
    <button type="button" class="btn-close" aria-label="Close" @click="shown = false"></button>
</div>

