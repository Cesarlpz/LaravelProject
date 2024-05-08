<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="mb-4 text-lg text-gray-600 dark:text-gray-400">
                {{ __('¡Welcome to your Laravel project!') }}
            </div>

            <div class="mb-4 font-medium text-lg text-gray-600 dark:text-gray-400">
                {{ __('You are logged in!') }}
                Use this page to manage your School resources
            </div>

            </div>
        </div>
    </div>
</x-app-layout>
