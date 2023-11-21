<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Mobil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="container mx-auto">
                    <h2 class="text-2xl font-bold mb-4">Add New Car</h2>

                    <!-- Display validation errors if any -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('mobil.store') }}" method="POST" class="w-full max-w-lg">
                        @csrf

                        <div class="mb-4">
                            <label for="merek" class="block text-gray-700 text-sm font-bold mb-2">Merek:</label>
                            <input type="text" name="merek" id="merek" class="w-full px-3 py-2 border rounded" required>
                        </div>

                        <div class="mb-4">
                            <label for="model" class="block text-gray-700 text-sm font-bold mb-2">Model:</label>
                            <input type="text" name="model" id="model" class="w-full px-3 py-2 border rounded" required>
                        </div>

                        <div class="mb-4">
                            <label for="no_plat" class="block text-gray-700 text-sm font-bold mb-2">No Plat:</label>
                            <input type="text" name="no_plat" id="no_plat" class="w-full px-3 py-2 border rounded" required>
                        </div>

                        <div class="mb-4">
                            <label for="tarif_sewa" class="block text-gray-700 text-sm font-bold mb-2">Tarif Sewa:</label>
                            <input type="text" name="tarif_sewa" id="tarif_sewa" class="w-full px-3 py-2 border rounded" required>
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Car</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
