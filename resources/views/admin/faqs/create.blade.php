<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            FAQ vraag toevoegen
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <form method="POST"
                          action="{{ route('admin.faqs.store') }}"
                          class="space-y-6">
                        @csrf

                        <div style="margin-bottom: 20px;">
                            <input type="submit"
                                   value="Opslaan"
                                   style="background-color: #2563eb; color: white; padding: 12px 24px; border-radius: 6px; font-weight: bold; cursor: pointer;">
                        </div>

                        <div>
                            <label for="faq_category_id" class="block font-medium text-sm text-gray-700">
                                Categorie
                            </label>

                            <select id="faq_category_id"
                                    name="faq_category_id"
                                    required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                <option value="">Kies een categorie</option>

                                @foreach ($faqCategories as $faqCategory)
                                    <option value="{{ $faqCategory->id }}"
                                            @if (old('faq_category_id') == $faqCategory->id) selected @endif>
                                        {{ $faqCategory->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('faq_category_id')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="question" class="block font-medium text-sm text-gray-700">
                                Vraag
                            </label>

                            <input id="question"
                                   name="question"
                                   type="text"
                                   value="{{ old('question') }}"
                                   required
                                   maxlength="255"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">

                            @error('question')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="answer" class="block font-medium text-sm text-gray-700">
                                Antwoord
                            </label>

                            <textarea id="answer"
                                      name="answer"
                                      rows="6"
                                      required
                                      maxlength="2000"
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('answer') }}</textarea>

                            @error('answer')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="flex items-center">
                                <input type="checkbox"
                                       name="is_visible"
                                       value="1"
                                       checked
                                       class="rounded border-gray-300">

                                <span class="ml-2">
                                    Zichtbaar op de FAQ pagina
                                </span>
                            </label>
                        </div>

                        <div class="flex gap-4">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                                Opslaan
                            </button>

                            <a href="{{ route('admin.faqs.index') }}"
                               class="bg-gray-200 text-gray-800 px-4 py-2 rounded">
                                Annuleren
                            </a>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>