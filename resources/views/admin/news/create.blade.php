<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nieuw nieuwsbericht
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <form method="POST"
                          action="{{ route('admin.news.store') }}"
                          enctype="multipart/form-data"
                          class="space-y-6">
                        @csrf
                             
                         <div style="margin-bottom: 20px;">
    <input type="submit"
           value="Opslaan"
           style="background-color: #2563eb; color: white; padding: 12px 24px; border-radius: 6px; font-weight: bold; cursor: pointer;">
</div>
                        <div>
                            <label for="title" class="block font-medium text-sm text-gray-700">
                                Titel
                            </label>

                            <input id="title"
                                   name="title"
                                   type="text"
                                   value="{{ old('title') }}"
                                   required
                                   maxlength="255"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">

                            @error('title')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="image" class="block font-medium text-sm text-gray-700">
                                Afbeelding
                            </label>

                            <input id="image"
                                   name="image"
                                   type="file"
                                   accept="image/*"
                                   class="mt-1 block w-full">

                            @error('image')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="published_at" class="block font-medium text-sm text-gray-700">
                                Publicatiedatum
                            </label>

                            <input id="published_at"
                                   name="published_at"
                                   type="date"
                                   value="{{ old('published_at') }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">

                            @error('published_at')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="content" class="block font-medium text-sm text-gray-700">
                                Inhoud
                            </label>

                            <textarea id="content"
                                      name="content"
                                      rows="8"
                                      required
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('content') }}</textarea>

                            @error('content')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="flex items-center">
                                <input type="checkbox"
                                       name="is_published"
                                       value="1"
                                       checked
                                       class="rounded border-gray-300">

                                <span class="ml-2">
                                    Gepubliceerd
                                </span>
                            </label>
                        </div>

                        <div class="flex gap-4">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                                Opslaan
                            </button>

                            <a href="{{ route('admin.news.index') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded">
                                Annuleren
                            </a>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>