<!-- resources/views/admin/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Admin Dashboard</title>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        @include('admin.layouts.sidebar') <!-- Assurez-vous de créer ce fichier sidebar.blade.php -->
        <div class="flex-1">
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold text-gray-900">@yield('title')</h1>
                </div>
            </header>
            <main>
                <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
