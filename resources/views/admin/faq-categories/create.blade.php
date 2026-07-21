<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            FAQ categorie toevoegen
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <form method="POST"
                          action="{{ route('admin.faq-categories.store') }}"
                          class="space-y-6">
                        @csrf

                        <div style="margin-bottom: 20px;">
                            <input type="submit"
                                   value="Opslaan"
                                   style="background-color: #2563eb; color: white; padding: 12px 24px; border-radius: 6px; font-weight: bold; cursor: pointer;">
                        </div>

                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-700">
                                Naam
                            </label>

                            <input id="name"
                                   name="name"
                                   type="text"
                                   value="{{ old('name') }}"
                                   required
                                   maxlength="255"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">

                            @error('name')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block font-medium text-sm text-gray-700">
                                Beschrijving
                            </label>

                            <textarea id="description"
                                      name="description"
                                      rows="5"
                                      maxlength="1000"
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('description') }}</textarea>

                            @error('description')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex gap-4">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                                Opslaan
                            </button>

                            <a href="{{ route('admin.faq-categories.index') }}"
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