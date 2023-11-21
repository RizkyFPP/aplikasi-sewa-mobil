<!-- resources/views/peminjaman/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Peminjaman List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="container mx-auto">
                    <h2 class="text-2xl font-bold mb-4">Peminjaman List</h2>

                    <!-- Display a success message if any -->
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <a href="{{ route('peminjaman.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add New Peminjaman</a>

                    <table class="table-auto mt-4 w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Pelanggan ID</th>
                                <th class="px-4 py-2">Mobil ID</th>
                                <th class="px-4 py-2">Tanggal Peminjaman</th>
                                <th class="px-4 py-2">Tanggal Pengembalian</th>
                                <th class="px-4 py-2">Total Biaya</th>
                                <th class="px-4 py-2">Status Peminjaman</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peminjamans as $peminjaman)
                                <tr>
                                    <td class="border px-4 py-2">{{ $peminjaman->id }}</td>
                                    <td class="border px-4 py-2">{{ $peminjaman->pelanggan_id }}</td>
                                    <td class="border px-4 py-2">{{ $peminjaman->mobil_id }}</td>
                                    <td class="border px-4 py-2">{{ $peminjaman->tanggal_peminjaman }}</td>
                                    <td class="border px-4 py-2">{{ $peminjaman->tanggal_pengembalian }}</td>
                                    <td class="border px-4 py-2">{{ $peminjaman->total_biaya }}</td>
                                    <td class="border px-4 py-2">{{ $peminjaman->status_peminjaman }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('peminjaman.show', $peminjaman->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded">View</a>
                                        {{-- <a href="{{ route('peminjaman.edit', $peminjaman->id) }}" class="bg-green-500 text-white px-2 py-1 rounded">Edit</a> --}}
                                        {{-- <form action="{{ route('peminjaman.destroy', $peminjaman->id) }}" method="POST" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>