<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Notes
        </h2>
    </x-slot>

    <div class="block w-[70%] md:w-[85%] lg:w-[50%] mx-auto sm:p-6 lg:p-8 ">
        <div class="py-6 text-2xl text-gray-900 dark:text-gray-100">
            All Notes
        </div>
        <div class="flex gap-5 justify-end items-center my-2">
            <p class="text-gray-900 dark:text-gray-100"><span class="font-bold">Created At:</span>
                {{ $note->created_at->diffForHumans() }}
            </p>
            <p class="text-gray-900 dark:text-gray-100"><span class="font-bold">Updated At:</span>
                {{ $note->updated_at->diffForHumans() }}
            </p>
        </div>
        <div
            class="block p-6 bg-white border border-gray-200 rounded-lg shadow-sm  dark:bg-gray-800 dark:border-gray-700">

            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $note->title }}</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400 whitespace-pre-wrap">
                {{ $note->text }}
            </p>
        </div>

    </div>
</x-app-layout>
