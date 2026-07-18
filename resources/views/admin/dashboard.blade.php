<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('error'))
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">
                        Welkom op het admin dashboard
                    </h3>

                    <p>
                        Hier kan de administrator later nieuws, FAQ's en gebruikers beheren.
                    </p>

                    <ul class="mt-4 list-disc list-inside">
                        <li>Nieuws beheren</li>
                        <li>FAQ categorieën beheren</li>
                        <li>Vragen en antwoorden beheren</li>
                        <li>Gebruikers en adminrechten beheren</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>