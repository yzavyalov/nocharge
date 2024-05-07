@if ($errors->any())
    <div {{ $attributes->merge(['class' => 'alert alert-danger']) }}>
        <div class="font-medium">{{ __('Whoops! Something went wrong.') }}</div>

        <ul class="mt-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


