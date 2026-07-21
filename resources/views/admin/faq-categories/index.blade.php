<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            FAQ categorieën beheren
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
                <a href="{{ route('admin.faq-categories.create') }}"
                   style="background-color: #2563eb; color: white; padding: 12px 24px; border-radius: 6px; font-weight: bold; display: inline-block;">
                    FAQ categorie toevoegen
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <h3 class="text-lg font-semibold mb-6">
                        Alle FAQ categorieën
                    </h3>

                    <div class="space-y-6">
                        @forelse ($faqCategories as $faqCategory)
                            <article class="border rounded-lg p-4">
                                <h4 class="text-xl font-semibold">
                                    {{ $faqCategory->name }}
                                </h4>

                                <p class="mt-2 text-gray-700">
                                    {{ $faqCategory->description ?? 'Geen beschrijving.' }}
                                </p>

                                <p class="text-sm text-gray-500 mt-2">
                                    Aantal vragen: {{ $faqCategory->faqs->count() }}
                                </p>

                                <div class="mt-4 flex gap-4">
                                    <a href="{{ route('admin.faq-categories.edit', $faqCategory) }}"
                                       class="text-blue-600 hover:underline">
                                        Aanpassen
                                    </a>

                                    <form method="POST"
                                          action="{{ route('admin.faq-categories.destroy', $faqCategory) }}"
                                          onsubmit="return confirm('Ben je zeker dat je deze categorie wilt verwijderen?');">
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
                                Er zijn nog geen FAQ categorieën.
                            </p>
                        @endforelse
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>