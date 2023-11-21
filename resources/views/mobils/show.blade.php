<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mobil Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="container mx-auto">
                    <h2 class="text-2xl font-bold mb-4">Car Details</h2>

                    <div class="mb-4">
                        <p><span class="font-bold">ID:</span> {{ $mobil->id }}</p>
                        <p><span class="font-bold">Merek:</span> {{ $mobil->merek }}</p>
                        <p><span class="font-bold">Model:</span> {{ $mobil->model }}</p>
                        <p><span class="font-bold">No Plat:</span> {{ $mobil->no_plat }}</p>
                        <p><span class="font-bold">Tarif Sewa:</span> {{ $mobil->tarif_sewa }}</p>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('mobil.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
