<!-- resources/views/peminjamans/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Peminjaman Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Peminjaman Detail</h2>

                <!-- Display Peminjaman details here -->
                <div>
                    <p><strong>ID:</strong> {{ $peminjaman->id }}</p>
                    <p><strong>Mobil:</strong> {{ $peminjaman->mobil->merek }} - {{ $peminjaman->mobil->model }}</p>
                    <p><strong>Tanggal Peminjaman:</strong> {{ $peminjaman->tanggal_peminjaman }}</p>
                    <p><strong>Tanggal Pengembalian:</strong> {{ $peminjaman->tanggal_pengembalian }}</p>
                    <p><strong>Total Biaya:</strong> {{ $peminjaman->total_biaya }}</p>
                    <p><strong>Status Peminjaman:</strong> {{ $peminjaman->status_peminjaman }}</p>
                </div>

                <div class="mt-4">
                    <a href="{{ route('peminjaman.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
