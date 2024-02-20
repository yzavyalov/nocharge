<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div>
            <div class="mb-4 text-muted">
                Please confirm access to your account by entering the authentication code provided by your authenticator application.
            </div>

            <div class="mb-4 text-muted" style="display: none;">
                Please confirm access to your account by entering one of your emergency recovery codes.
            </div>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('two-factor.login') }}">
                @csrf

                <div class="mt-4" style="display: none;">
                    <label for="code" class="form-label">{{ __('Code') }}</label>
                    <input id="code" class="form-control" type="text" inputmode="numeric" name="code" autofocus />
                </div>

                <div class="mt-4" style="display: none;">
                    <label for="recovery_code" class="form-label">{{ __('Recovery Code') }}</label>
                    <input id="recovery_code" class="form-control" type="text" name="recovery_code" />
                </div>

                <div class="d-flex justify-content-end align-items-center mt-4">
                    <button type="button" class="btn btn-link text-muted" onclick="document.querySelector('.text-muted').style.display='none'; document.querySelectorAll('.text-muted')[1].style.display=''; document.querySelector('.form-control').focus();">
                        {{ __('Use a recovery code') }}
                    </button>

                    <button type="button" class="btn btn-link text-muted" onclick="document.querySelectorAll('.text-muted')[1].style.display='none'; document.querySelector('.text-muted').style.display=''; document.querySelectorAll('.form-control')[1].focus();">
                        {{ __('Use an authentication code') }}
                    </button>

                    <button type="submit" class="btn btn-primary ms-4">{{ __('Log in') }}</button>
                </div>
            </form>
        </div>

    </x-authentication-card>
</x-guest-layout>
