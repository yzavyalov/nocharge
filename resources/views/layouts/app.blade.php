<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="{{ asset('css/cabinetNavbar.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
{{--        @vite(['resources/css/app.css', 'resources/js/app.js'])--}}

        <!-- Styles -->
        @livewireStyles

    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-light shadow-sm">
                    <div class="container py-3">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')
        @livewireScripts
{{--<script>--}}

{{--        document.addEventListener("DOMContentLoaded", function() {--}}
{{--        // Получаем кнопку и список--}}
{{--        const dropdownButton = document.querySelector('.dropdown-toggle');--}}
{{--        const dropdownMenu = document.querySelector('.dropdown-menu');--}}

{{--        // Функция, которая переключает класс для списка (открывает/закрывает его)--}}
{{--        function toggleDropdown() {--}}
{{--        dropdownMenu.classList.toggle('show');--}}
{{--        }--}}

{{--        // Обработчик события для клика по кнопке--}}
{{--        dropdownButton.addEventListener('click', function() {--}}
{{--        toggleDropdown();--}}
{{--        });--}}

{{--        // Обработчик события для клика вне списка (закрытие списка, если клик произошел за его пределами)--}}
{{--        document.addEventListener('click', function(event) {--}}
{{--        const targetElement = event.target;--}}
{{--        if (!dropdownMenu.contains(targetElement) && !dropdownButton.contains(targetElement)) {--}}
{{--        dropdownMenu.classList.remove('show');--}}
{{--        }--}}
{{--        });--}}
{{--        });--}}
{{--</script>--}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-GH2FYMHWGM"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-GH2FYMHWGM');
        </script>
        @if(session('anchor'))
            <script>window.location.hash = '{{ session('anchor') }}';</script>
        @endif
{{--        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>--}}
{{--        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>--}}
    </body>
</html>
