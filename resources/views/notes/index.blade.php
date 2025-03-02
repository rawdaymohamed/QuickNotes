<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ request()->routeIs('notes.index') ? 'Notes' : 'Trash' }}
        </h2>
    </x-slot>


    <div class=" w-[95%] md:w-[85%] lg:w-[50%]  mx-auto sm:p-6 lg:p-8 ">

        <div class="py-6 text-2xl text-gray-900 dark:text-gray-100">
            All Notes
        </div>
        @if (request()->routeIs('notes.index'))
            <div class="my-5 flex justify-start">
                <x-button-link href="{{ route('notes.create') }}">New Note +</x-button-link>
            </div>
        @endif
        <x-alert-success>{{ session('success') }}</x-alert-success>
        <div class="flex flex-wrap gap-5">
            @forelse ($notes as $note)
                <a @if (request()->routeIs('notes.index')) href="{{ route('notes.show', $note) }}"
                @else
                href="{{ route('trashed.show', $note) }}" @endif
                    class="block w-[400px] h-[250px] p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $note->title }}</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">
                        {{ Str::limit($note->text, 200, '...') }}
                    </p>
                    <p class="font-normal text-gray-700 dark:text-gray-400 text-sm opacity-75 mt-5">
                        {{ $note->updated_at->diffForHumans() }}</p>
                </a>
            @empty
                <p class="text-gray-900 dark:text-gray-100">You have no note yet</p>
            @endforelse
        </div>
        {{ $notes->links() }}
    </div>


</x-app-layout>
