<nav x-data="{ open: false }" class="navbar navbar-expand-lg navbar-light bg-light border-bottom border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="{{ asset('img/Logo.png') }}" alt="High risk logo" width="60px">
        </a>

        <!-- Hamburger -->
        <button @click="open = ! open" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
                <x-nav-link href="{{ route('cabinet-about') }}" :active="request()->routeIs('about')">
                    About our system
                </x-nav-link>
                <x-nav-link href="{{ route('cabinet-membership') }}" :active="request()->routeIs('membership')">
                    Membership
                </x-nav-link>
                <x-nav-link href="{{ route('cabinet-api') }}" :active="request()->routeIs('api')">
                    API Documentations
                </x-nav-link>
                <x-nav-link href="{{ route('cabinet-blacklist') }}" :active="request()->routeIs('blacklist')">
                    Black List
                </x-nav-link>
                <x-nav-link href="{{ route('cabinet-contact') }}" :active="request()->routeIs('contact')">
                    Contact with us
                </x-nav-link>
            </ul>

            <!-- Settings Dropdown -->
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    @else
                        {{ Auth::user()->name }}
                    @endif
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="{{ route('profile.show') }}">{{ __('Profile') }}</a></li>
                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <li><a class="dropdown-item" href="{{ route('api-tokens.index') }}">{{ __('API Tokens') }}</a></li>
                    @endif
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">{{ __('Log Out') }}</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
