<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-success">
                {{ session('status') }}
            </div>
        @endif


        <form method="POST" action="{{ route('login') }}" id="login-form">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
            </div>

            <div class="mb-3 form-check">
                <input id="remember_me" class="form-check-input" type="checkbox" name="remember">
                <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
            </div>

            <div class="d-flex justify-content-end align-items-center mb-3">
                @if (Route::has('password.request'))
                    <a class="text-decoration-none me-4" href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                @endif
{{--                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>--}}
                <button type="submit" class="btn btn-primary g-recaptcha"
                        data-sitekey="6LcHgFApAAAAADZFleoZEuORYc0f0VrdHzxh6Xfw"
                        data-callback='onSubmit'
                        data-action='submit'>
                    {{ __('Log in') }}
                </button>
                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
            </div>
        </form>

    </x-authentication-card>
        @push('scripts')
            <script>
                function onSubmit(token) {
                    document.getElementById("login-form").submit();
                }
            </script>
        @endpush
    </x-guest-layout>
