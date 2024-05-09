<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel University Landing Page</title>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .background-image {
            background-image: url('{{ asset('images/etudiants.jpg') }}');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="antialiased background-image">
    <div class="relative flex flex-col min-h-screen justify-center items-center text-white">
        <h1 class="text-4xl font-bold mb-3">Welcome to UniversityNotation</h1>
        <div id="typed-text" class="text-xl font-medium"></div>

        @if (Route::has('login'))
            <div class="mt-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-lg text-white hover:underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="text-lg px-4 py-2 border border-transparent text-white rounded-md hover:bg-orange-500 transition-colors">Log
                        in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="text-lg ml-4 px-4 py-2 border border-transparent text-white rounded-md hover:bg-orange-500 transition-colors">Register</a>
                    @endif
                @endauth
            </div>


        @endif
    </div>


    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>

    <script>
        new Typed('#typed-text', {
            strings: ["Ratings", "Comments", "Notation"],
            typeSpeed: 70,
            backSpeed: 70,
            loop: true
        });
    </script>
</body>

</html>
