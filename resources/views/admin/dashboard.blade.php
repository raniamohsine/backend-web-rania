<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('error'))
                <div class="mb-6 p-4 bg-red-100 text-red-700 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-bold mb-4">
                        Welkom op het admin dashboard
                    </h3>

                    <p class="text-gray-700 mb-8">
                        Hier kan de administrator nieuws, FAQ categorieën, FAQ vragen en gebruikers beheren.
                    </p>

                    <div class="grid md:grid-cols-2 gap-6">
                        <a href="{{ route('admin.news.index') }}"
                           class="block border rounded-lg p-6 hover:bg-gray-50">
                            <h4 class="text-xl font-semibold mb-2">
                                Nieuws beheren
                            </h4>

                            <p class="text-gray-600">
                                Voeg nieuwsberichten toe, pas ze aan of verwijder ze.
                            </p>
                        </a>

                        <a href="{{ route('admin.faq-categories.index') }}"
                           class="block border rounded-lg p-6 hover:bg-gray-50">
                            <h4 class="text-xl font-semibold mb-2">
                                FAQ categorieën beheren
                            </h4>

                            <p class="text-gray-600">
                                Beheer de categorieën voor de FAQ pagina.
                            </p>
                        </a>

                        <a href="{{ route('admin.faqs.index') }}"
                           class="block border rounded-lg p-6 hover:bg-gray-50">
                            <h4 class="text-xl font-semibold mb-2">
                                FAQ vragen beheren
                            </h4>

                            <p class="text-gray-600">
                                Voeg vragen en antwoorden toe of pas ze aan.
                            </p>
                        </a>

                        <a href="{{ route('admin.users.index') }}"
                           class="block border rounded-lg p-6 hover:bg-gray-50">
                            <h4 class="text-xl font-semibold mb-2">
                                Gebruikers beheren
                            </h4>

                            <p class="text-gray-600">
                                Maak gebruikers aan en beheer adminrechten.
                            </p>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>