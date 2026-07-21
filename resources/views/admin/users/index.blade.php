<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gebruikers beheren
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 p-4 bg-red-100 text-red-700 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <div class="mb-6">
                <a href="{{ route('admin.users.create') }}"
                   style="background-color: #2563eb; color: white; padding: 12px 24px; border-radius: 6px; font-weight: bold; display: inline-block;">
                    Gebruiker toevoegen
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <h3 class="text-lg font-semibold mb-6">
                        Alle gebruikers
                    </h3>

                    <div class="space-y-6">
                        @forelse ($users as $user)
                            <article class="border rounded-lg p-4">
                                <h4 class="text-xl font-semibold">
                                    {{ $user->name }}
                                </h4>

                                <p class="text-gray-700 mt-2">
                                    E-mail: {{ $user->email }}
                                </p>

                                <p class="text-gray-700">
                                    Gebruikersnaam: {{ $user->profile->username ?? 'Geen profielnaam' }}
                                </p>

                                <p class="mt-2">
                                    Rol:
                                    @if ($user->role === 'admin')
                                        <span class="text-green-600 font-semibold">Admin</span>
                                    @else
                                        <span class="text-gray-700">User</span>
                                    @endif
                                </p>

                                <div class="mt-4">
                                    <a href="{{ route('admin.users.edit', $user) }}"
                                       class="text-blue-600 hover:underline">
                                        Aanpassen
                                    </a>
                                </div>
                            </article>
                        @empty
                            <p class="text-gray-600">
                                Er zijn nog geen gebruikers.
                            </p>
                        @endforelse
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>