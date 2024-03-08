<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Comics') }}
        </h2>
        <div>
            <x-primary-button form="create">
                Save
            </x-primary-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route("save-comics") }}" id="create" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div>
                            <div>
                                <x-input-label>
                                    {{ __("Name of Comics") }}
                                </x-input-label>
                                <x-text-input type="text" name="name" required></x-text-input>
                            </div>
                            <div>
                                <x-input-label>
                                    {{ __("Tags of Comics") }}
                                </x-input-label>
                                <select class="text-gray-900 dark:text-gray-900" name="tags[]" id="tags" multiple required>
                                    @foreach($page['tags'] as $tag)
                                        <option class="text-gray-900 dark:text-gray-900" value="{{ $tag->id }}"> {{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <x-input-label>
                                    {{ __("Artist of Comics") }}
                                </x-input-label>
                                <select class="text-gray-900 dark:text-gray-900" name="artist" id="artist" required>
                                    <option value=""></option>
                                    @foreach($page['artists'] as $artist)
                                        <option class="text-gray-900 dark:text-gray-900" value="{{ $artist->id }}"> {{ $artist->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div>
                            <x-input-label>
                                {{ __("Media of Comics") }}
                            </x-input-label>
                            <x-text-input type="file" name="files[]" multiple required></x-text-input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
