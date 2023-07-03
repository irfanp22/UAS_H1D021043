<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 mt-3 text-center text-4xl font-bold text-gray-900">
                    {{ __("Tambah Pesanan") }}
                </div>
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="w-full">
                        @include('partials.task-form')
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>