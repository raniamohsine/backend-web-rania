<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin dashboard
        </h2>
    </x-slot>

    <style>
        .admin-wrapper {
            max-width: 980px;
            margin: 0 auto;
        }

        .admin-hero {
            background: linear-gradient(135deg, #2563eb, #38bdf8);
            color: white;
            border-radius: 30px;
            padding: 42px;
            margin-bottom: 28px;
            box-shadow: 0 20px 45px rgba(37, 99, 235, 0.22);
        }

        .admin-hero h3 {
            color: white;
            font-size: 36px;
            margin-bottom: 14px;
        }

        .admin-hero p {
            color: white;
            font-size: 17px;
            line-height: 1.7;
        }

        .admin-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 22px;
        }

        .admin-card {
            background: white;
            border-radius: 24px;
            padding: 28px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.06);
            text-decoration: none;
            transition: 0.2s;
        }

        .admin-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 35px rgba(15, 23, 42, 0.10);
        }

        .admin-label {
            color: #2563eb;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .admin-card h4 {
            font-size: 24px;
            margin-bottom: 12px;
            color: #0f172a;
        }

        .admin-card p {
            color: #475569;
            line-height: 1.6;
        }

        .admin-arrow {
            margin-top: 18px;
            color: #2563eb;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .admin-grid {
                grid-template-columns: 1fr;
            }

            .admin-hero {
                padding: 30px;
            }

            .admin-hero h3 {
                font-size: 30px;
            }
        }
    </style>

    <div class="py-12">
        <div class="admin-wrapper">

            @if (session('error'))
                <div class="mb-6 p-4 bg-red-100 text-red-700 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <section class="admin-hero">
                <p style="font-weight: bold; opacity: 0.9; margin-bottom: 14px;">
                    Beheeromgeving
                </p>

                <h3>
                    Welkom op het admin dashboard
                </h3>

                <p>
                    Hier kan de administrator nieuwsberichten, FAQ categorieën,
                    FAQ vragen en gebruikers beheren.
                </p>
            </section>

            <section class="admin-grid">
                <a href="{{ route('admin.news.index') }}" class="admin-card">
                    <p class="admin-label">
                        Nieuws
                    </p>

                    <h4>
                        Nieuws beheren
                    </h4>

                    <p>
                        Voeg nieuwsberichten toe, pas ze aan of verwijder ze.
                    </p>

                    <div class="admin-arrow">
                        Open nieuws →
                    </div>
                </a>

                <a href="{{ route('admin.faq-categories.index') }}" class="admin-card">
                    <p class="admin-label">
                        FAQ
                    </p>

                    <h4>
                        FAQ categorieën
                    </h4>

                    <p>
                        Beheer de categorieën die gebruikt worden op de FAQ pagina.
                    </p>

                    <div class="admin-arrow">
                        Open categorieën →
                    </div>
                </a>

                <a href="{{ route('admin.faqs.index') }}" class="admin-card">
                    <p class="admin-label">
                        Vragen
                    </p>

                    <h4>
                        FAQ vragen
                    </h4>

                    <p>
                        Voeg vragen en antwoorden toe of pas bestaande vragen aan.
                    </p>

                    <div class="admin-arrow">
                        Open vragen →
                    </div>
                </a>

                <a href="{{ route('admin.users.index') }}" class="admin-card">
                    <p class="admin-label">
                        Gebruikers
                    </p>

                    <h4>
                        Gebruikers beheren
                    </h4>

                    <p>
                        Maak gebruikers aan en beheer adminrechten.
                    </p>

                    <div class="admin-arrow">
                        Open gebruikers →
                    </div>
                </a>
            </section>

        </div>
    </div>
</x-app-layout>