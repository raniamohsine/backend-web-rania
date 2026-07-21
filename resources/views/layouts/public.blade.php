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
        <div class="max-w-7xl mx-auto px-6 py-5">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-700">
                    StudentHub
                </a>

                <nav class="flex flex-wrap items-center gap-4 text-sm font-medium">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-700">
                        Home
                    </a>

                    <a href="{{ route('news.index') }}" class="text-gray-700 hover:text-blue-700">
                        Nieuws
                    </a>

                    <a href="{{ route('faq.index') }}" class="text-gray-700 hover:text-blue-700">
                        FAQ
                    </a>

                    <a href="{{ route('contact.create') }}" class="text-gray-700 hover:text-blue-700">
                        Contact
                    </a>

                    <a href="{{ route('profiles.index') }}" class="text-gray-700 hover:text-blue-700">
                        Profielen
                    </a>

                    @auth
                        <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-700">
                            Dashboard
                        </a>

                        <a href="{{ route('student-profile.edit') }}" class="text-gray-700 hover:text-blue-700">
                            Profiel bewerken
                        </a>

                        @if (auth()->user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="bg-blue-600 text-white px-3 py-2 rounded">
                                Admin
                            </a>
                        @endif

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="text-gray-700 hover:text-blue-700">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-700">
                            Login
                        </a>

                        <a href="{{ route('register') }}" class="bg-blue-600 text-white px-3 py-2 rounded">
                            Register
                        </a>
                    @endauth
                </nav>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-10">
        @yield('content')
    </main>

    <footer class="bg-white border-t mt-10">
        <div class="max-w-7xl mx-auto px-6 py-5 text-sm text-gray-600">
            &copy; 2026 StudentHub
        </div>
    </footer>

</body>
</html>