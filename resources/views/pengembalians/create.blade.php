<!-- resources/views/pengembalians/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Pengembalian') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="container mx-auto">
                    <h2 class="text-2xl font-bold mb-4">Create Pengembalian</h2>

                    <!-- Display validation errors -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('pengembalian.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="peminjaman_id" class="block text-gray-600 text-sm font-bold mb-2">NO Plat:</label>
                            <select name="peminjaman_id" id="peminjaman_id" class="form-select w-full" required>
                                <!-- Populate the options dynamically based on your Mobil model -->
                                @foreach($peminjamans as $peminjaman)
                                    <option value="{{ $peminjaman->id }}">{{ $peminjaman->mobil->no_plat }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="tanggal_pengembalian" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Pengembalian:</label>
                            <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" class="border rounded w-full py-2 px-3" required>
                        </div>

                        <div class="mb-4">
                            <label for="km_awal" class="block text-gray-700 text-sm font-bold mb-2">KM Awal:</label>
                            <input type="number" name="km_awal" id="km_awal" class="border rounded w-full py-2 px-3" required>
                        </div>

                        <div class="mb-4">
                            <label for="km_akhir" class="block text-gray-700 text-sm font-bold mb-2">KM Akhir:</label>
                            <input type="number" name="km_akhir" id="km_akhir" class="border rounded w-full py-2 px-3" required>
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Pengembalian</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
