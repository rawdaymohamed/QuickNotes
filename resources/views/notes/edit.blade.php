<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Note
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:p-6 lg:p-8 ">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="pb-2 text-2xl text-gray-900 dark:text-gray-100">
                    Edit Note
                </div>
                <form action="{{ route('notes.update', $note) }}" method="post" class="max-w-3xl flex flex-col gap-5">
                    @method('put')
                    @csrf
                    <x-text-input name="title" class="w-full" placeholder="Note title"
                        value="{{ @old('title', $note->title) }}"></x-text-input>
                    @error('title')
                        <div class="mt-1 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                    <x-text-area name="text" class="w-full" placeholder="Type your note"
                        rows="8">{{ @old('text', $note->text) }}</x-text-area>
                    @error('text')
                        <div class="mt-1 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                    <x-primary-button>Save Note</x-primary-button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
