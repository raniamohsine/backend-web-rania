<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                background-color: #f8fafc;
            }

            main {
                background: linear-gradient(180deg, #f8fafc 0%, #eef4ff 100%);
                min-height: 80vh;
            }

            main .py-12 {
                padding-top: 36px;
                padding-bottom: 48px;
            }

            main .max-w-7xl,
            main .max-w-3xl {
                max-width: 980px;
            }

            main .bg-white {
                border-radius: 26px;
                border: 1px solid #e5e7eb;
                box-shadow: 0 12px 28px rgba(15, 23, 42, 0.06);
            }

            main article {
                background-color: #f8fafc;
                border-radius: 20px;
            }

            main input,
            main textarea,
            main select {
                border-radius: 14px !important;
                padding: 12px 14px;
                background-color: #f8fafc;
            }

            main button,
            main input[type="submit"],
            main a.bg-blue-600 {
                border-radius: 14px !important;
                font-weight: bold;
            }

            main h3,
            main h4 {
                color: #0f172a;
            }
        </style>
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>