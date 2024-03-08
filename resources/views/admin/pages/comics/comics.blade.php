<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Comics') }}
        </h2>
        <div class="border border-gray-200 rounded-lg p-2">
            <a class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" href="{{ route("create-comics") }}">{{ __('Create') }}</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(count($page['comics']))
                        @foreach($page['comics'] as $key => $comics)
                            <div class="flex justify-between items-center pb-3 pt-4 border-b border-gray-200">
                                <div><a href="{{route('edit-comics', ['comics' => $comics->id])}}">{{ $comics->name }}</a></div>
                                <div>
                                    <form action="{{ route("delete-comics", ['comics' => $comics->id]) }}" method="POST">
                                        @csrf
                                        @method("POST")
                                        <x-danger-button>
                                            Delete
                                        </x-danger-button>
                                    </form>

                                </div>
                            </div>
                        @endforeach
                    @else
                        {{__("There is no comics yet!")}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
