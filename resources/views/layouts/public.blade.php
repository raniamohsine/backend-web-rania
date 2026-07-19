<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'StudentHub')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl font-bold">
                StudentHub
            </a>

            <nav class="space-x-4">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600">Home</a>
                <a href="{{ route('news.index') }}" class="text-gray-700 hover:text-blue-600">Nieuws</a>
                <a href="{{ route('faq.index') }}" class="text-gray-700 hover:text-blue-600">FAQ</a>
                <a href="{{ route('contact.create') }}" class="text-gray-700 hover:text-blue-600">Contact</a>
                <a href="{{ route('profiles.index') }}" class="text-gray-700 hover:text-blue-600">Profielen</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600">Dashboard</a>

                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-blue-600">Admin</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-600">Register</a>
                @endauth
            </nav>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="bg-white border-t mt-8">
        <div class="max-w-7xl mx-auto px-4 py-4 text-sm text-gray-600">
            &copy; 2026 StudentHub
        </div>
    </footer>

</body>
</html>