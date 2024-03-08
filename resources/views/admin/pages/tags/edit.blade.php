<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tags') }}
        </h2>
        <div>
            <x-primary-button form="update">
                Update
            </x-primary-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route("update-tags") }}" id="update" method="POST">
                        @csrf
                        @method('POST')
                        <x-input-label>
                            {{ __("Name of Tag") }}
                        </x-input-label>
                        <x-text-input type="text" name="name" value="{{ $page['tag']->name }}"></x-text-input>
                        <x-text-input type="hidden" name="id" value="{{ $page['tag']->id }}"></x-text-input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
