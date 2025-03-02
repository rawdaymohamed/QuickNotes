<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Note
        </h2>
    </x-slot>

    <div class="block w-[95%] md:w-[85%] lg:w-[50%] mx-auto sm:p-6 lg:p-8 ">
        <div class="py-6 text-2xl text-gray-900 dark:text-gray-100">
            {{ !$note->trashed() ? 'Note' : 'Trash' }}
        </div>
        <x-alert-success>{{ session('success') }}</x-alert-success>
        @if (!$note->trashed())
            <div class="flex gap-5 justify-start items-center my-2">
                <p class="text-gray-900 dark:text-gray-100"><span class="font-bold">Created At:</span>
                    {{ $note->created_at->diffForHumans() }}
                </p>
                <p class="text-gray-900 dark:text-gray-100"><span class="font-bold">Updated At:</span>
                    {{ $note->updated_at->diffForHumans() }}
                </p>
                <div class="ml-auto flex justify-end items-center">
                    <x-button-link href="{{ route('notes.edit', $note) }}">Edit Note</x-button-link>
                    <div>
                        <form action="{{ route('notes.destroy', $note) }}" method="post">
                            @method('delete')
                            @csrf
                            <x-red-button onclick="return confirm('Move this note to trash?')"
                                href="{{ route('notes.edit', $note) }}">Move to Trash</x-red-button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="flex gap-5 justify-start items-center my-2">
                <p class="text-gray-900 dark:text-gray-100"><span class="font-bold">Deleted:</span>
                    {{ $note->deleted_at->diffForHumans() }}
                </p>

                <div class="ml-auto flex justify-end items-center">
                    <div>
                        <form action="{{ route('trashed.update', $note) }}" method="post">
                            @method('put')
                            @csrf
                            <x-primary-button href="{{ route('trashed.update', $note) }}">Restore
                                Note</x-primary-button>
                        </form>
                    </div>
                    <div>
                        <form action="{{ route('trashed.destroy', $note) }}" method="post">
                            @method('delete')
                            @csrf
                            <x-red-button onclick="return confirm('Are you sure you want to delete this note forever?')"
                                href="{{ route('notes.destroy', $note) }}">Delete Forever</x-red-button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
        <div
            class="block p-6 bg-white border border-gray-200 rounded-lg shadow-sm  dark:bg-gray-800 dark:border-gray-700">

            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $note->title }}</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">
                {{ $note->text }}
            </p>
        </div>

    </div>
</x-app-layout>
