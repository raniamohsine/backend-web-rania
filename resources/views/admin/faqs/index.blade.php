<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            FAQ vragen beheren
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-6">
                <a href="{{ route('admin.faqs.create') }}"
                   style="background-color: #2563eb; color: white; padding: 12px 24px; border-radius: 6px; font-weight: bold; display: inline-block;">
                    FAQ vraag toevoegen
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <h3 class="text-lg font-semibold mb-6">
                        Alle FAQ vragen
                    </h3>

                    <div class="space-y-6">
                        @forelse ($faqs as $faq)
                            <article class="border rounded-lg p-4">
                                <p class="text-sm text-gray-500">
                                    Categorie: {{ $faq->category->name ?? 'Geen categorie' }}
                                </p>

                                <h4 class="text-xl font-semibold mt-2">
                                    {{ $faq->question }}
                                </h4>

                                <p class="mt-3 text-gray-700">
                                    {{ $faq->answer }}
                                </p>

                                <p class="mt-3">
                                    Status:
                                    @if ($faq->is_visible)
                                        <span class="text-green-600">Zichtbaar</span>
                                    @else
                                        <span class="text-red-600">Niet zichtbaar</span>
                                    @endif
                                </p>

                                <div class="mt-4 flex gap-4">
                                    <a href="{{ route('admin.faqs.edit', $faq) }}"
                                       class="text-blue-600 hover:underline">
                                        Aanpassen
                                    </a>

                                    <form method="POST"
                                          action="{{ route('admin.faqs.destroy', $faq) }}"
                                          onsubmit="return confirm('Ben je zeker dat je deze FAQ vraag wilt verwijderen?');">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="text-red-600 hover:underline">
                                            Verwijderen
                                        </button>
                                    </form>
                                </div>
                            </article>
                        @empty
                            <p class="text-gray-600">
                                Er zijn nog geen FAQ vragen.
                            </p>
                        @endforelse
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>