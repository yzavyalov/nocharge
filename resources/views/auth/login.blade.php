<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <div class="row">
            <div class="social">

                <a class="social__icon facebook" href="/auth/google/redirect">
                    <img src="{{ asset('../img/google_icon.png') }}" alt="Google">
                </a>
                <a class="social__icon git" href="/auth/github/redirect">
                    <img src="{{ asset('../img/icon-github.png') }}" alt="Github">
                </a>
                <a class="social__icon twitter" href="/auth/twitter/redirect">
                    <img src="{{ asset('../img/icon-x.png') }}" alt="X.com">
                </a>
{{--                <a class="social__icon linkedin" href="/auth/linkedin/redirect">--}}
{{--                    <img src="{{ asset('../img/icon-linkedin.png') }}" alt="X.com">--}}
{{--                </a>--}}
            </div>
        </div>

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

            <div class="d-flex justify-content-between align-items-center mb-3">
                <button class="btn btn-outline-success" onclick="window.location.href='{{ route('register') }}'">If you are not registered</button>
                @if (Route::has('password.request'))
                    <a class="text-decoration-none me-4" href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                @endif
{{--                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>--}}
                <button type="submit" class="btn btn-primary g-recaptcha"
                        data-sitekey="6LftBnwpAAAAAHlM1zr6Oo1bZXmZkccFJnxS8Awu"
                        data-callback='onSubmit'
                        data-action='submit'>
                    {{ __('Log in') }}
                </button>
                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
            </div>
        </form>
        <div>

        </div>

    </x-authentication-card>
        @push('scripts')
            <script>
                function onSubmit(token) {
                    document.getElementById("login-form").submit();
                }
            </script>
        @endpush
    </x-guest-layout>
