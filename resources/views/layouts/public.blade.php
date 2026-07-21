<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'StudentHub')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            margin: 0;
            background-color: #f8fafc;
            color: #172033;
            font-family: Arial, sans-serif;
        }

        .site-header {
            background-color: white;
            border-bottom: 1px solid #e5e7eb;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
        }

        .header-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 22px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 24px;
        }

        .brand {
            font-size: 26px;
            font-weight: bold;
            color: #1d4ed8;
            text-decoration: none;
        }

        .nav {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 18px;
        }

        .nav a,
        .nav button {
            color: #334155;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            background: none;
            border: none;
            cursor: pointer;
            padding: 8px 0;
        }

        .nav a:hover,
        .nav button:hover {
            color: #1d4ed8;
        }

        .nav .button-link {
            background-color: #2563eb;
            color: white;
            padding: 10px 16px;
            border-radius: 10px;
        }

        .nav .button-link:hover {
            background-color: #1d4ed8;
            color: white;
        }

        .main-container {
            max-width: 1100px;
            margin: 34px auto;
            padding: 0 24px;
        }

        .main-container section {
            margin-bottom: 32px;
        }

        .main-container h1 {
            font-size: 34px;
            margin-bottom: 18px;
            color: #0f172a;
        }

        .main-container h2 {
            font-size: 24px;
            margin-bottom: 18px;
            color: #0f172a;
        }

        .main-container h3,
        .main-container h4 {
            color: #0f172a;
        }

        .main-container p {
            line-height: 1.7;
        }

        footer {
            background-color: white;
            border-top: 1px solid #e5e7eb;
            margin-top: 50px;
        }

        .footer-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 20px 24px;
            color: #64748b;
            font-size: 14px;
        }

        .page-wrapper {
            max-width: 920px;
            margin: 0 auto;
        }

        .page-hero {
            background: linear-gradient(135deg, #2563eb, #38bdf8);
            color: white;
            border-radius: 32px;
            padding: 46px;
            margin-bottom: 28px;
            box-shadow: 0 20px 45px rgba(37, 99, 235, 0.25);
        }

        .page-hero h1 {
            color: white;
            font-size: 42px;
            line-height: 1.15;
            margin-bottom: 18px;
        }

        .page-hero p {
            color: white;
            font-size: 18px;
            line-height: 1.7;
        }

        .page-label {
            font-weight: bold;
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 16px;
        }

        .page-card {
            background: white;
            border-radius: 28px;
            padding: 34px;
            margin-bottom: 26px;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.07);
            border: 1px solid #e5e7eb;
        }

        .inner-card {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 22px;
            padding: 24px;
            margin-bottom: 18px;
        }

        .inner-card:last-child {
            margin-bottom: 0;
        }

        .form-label {
            display: block;
            font-weight: bold;
            color: #334155;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            border: 1px solid #cbd5e1;
            border-radius: 14px;
            padding: 14px 16px;
            background: #f8fafc;
            margin-bottom: 18px;
        }

        .primary-action {
            background-color: #2563eb;
            color: white;
            padding: 13px 20px;
            border-radius: 14px;
            font-weight: bold;
            text-decoration: none;
            border: none;
            cursor: pointer;
            display: inline-block;
        }

        .secondary-action {
            color: #2563eb;
            font-weight: bold;
            text-decoration: none;
        }

        .success-box {
            background: #dcfce7;
            color: #166534;
            border-radius: 16px;
            padding: 16px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .error-box {
            background: #fee2e2;
            color: #991b1b;
            border-radius: 16px;
            padding: 16px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                align-items: flex-start;
            }

            .nav {
                gap: 12px;
            }

            .main-container {
                margin-top: 24px;
            }

            .page-hero {
                padding: 32px 26px;
                border-radius: 26px;
            }

            .page-hero h1 {
                font-size: 34px;
            }

            .page-card {
                padding: 24px;
            }
        }
    </style>
</head>
<body>

    <header class="site-header">
        <div class="header-container">
            <a href="{{ route('home') }}" class="brand">
                StudentHub
            </a>

            <nav class="nav">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('news.index') }}">Nieuws</a>
                <a href="{{ route('faq.index') }}">FAQ</a>
                <a href="{{ route('contact.create') }}">Contact</a>
                <a href="{{ route('profiles.index') }}">Profielen</a>

                @auth
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                    <a href="{{ route('student-profile.edit') }}">Profiel bewerken</a>

                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="button-link">Admin</a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}" class="button-link">Register</a>
                @endauth
            </nav>
        </div>
    </header>

    <main class="main-container">
        @yield('content')
    </main>

    <footer>
        <div class="footer-container">
            &copy; 2026 StudentHub - Backend Web Project
        </div>
    </footer>

</body>
</html>