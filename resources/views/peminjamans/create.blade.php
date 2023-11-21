<!-- resources/views/peminjamans/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Peminjaman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Display availability error here -->
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('peminjaman.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="mobil_id" class="block text-gray-600 text-sm font-bold mb-2">Mobil:</label>
                        <select name="mobil_id" id="mobil_id" class="form-select w-full" required>
                            <!-- Populate the options dynamically based on your Mobil model -->
                            @foreach($mobils as $mobil)
                                <option value="{{ $mobil->id }}">{{ $mobil->merek }} - {{ $mobil->model }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="tanggal_peminjaman" class="block text-gray-600 text-sm font-bold mb-2">Tanggal Peminjaman:</label>
                        <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" class="form-input w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="tanggal_pengembalian" class="block text-gray-600 text-sm font-bold mb-2">Tanggal Pengembalian:</label>
                        <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" class="form-input w-full" required>
                    </div>

                    <!-- Add more form fields as needed -->

                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Peminjaman</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
