<!-- resources/views/pengembalians/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengembalian List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="container mx-auto">
                    <h2 class="text-2xl font-bold mb-4">Pengembalian List</h2>

                    <!-- Display a success message if any -->
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <a href="{{ route('pengembalian.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add New Pengembalian</a>

                    <table class="table-auto mt-4 w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Peminjaman ID</th>
                                <th class="px-4 py-2">Tanggal Pengembalian</th>
                                <th class="px-4 py-2">KM Awal</th>
                                <th class="px-4 py-2">KM Akhir</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengembalians as $pengembalian)
                                <tr>
                                    <td class="border px-4 py-2">{{ $pengembalian->id }}</td>
                                    <td class="border px-4 py-2">{{ $pengembalian->peminjaman_id }}</td>
                                    <td class="border px-4 py-2">{{ $pengembalian->tanggal_pengembalian }}</td>
                                    <td class="border px-4 py-2">{{ $pengembalian->km_awal }}</td>
                                    <td class="border px-4 py-2">{{ $pengembalian->km_akhir }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('pengembalian.show', $pengembalian->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded">View</a>
                                        {{-- <a href="{{ route('pengembalian.edit', $pengembalian->id) }}" class="bg-green-500 text-white px-2 py-1 rounded">Edit</a> --}}
                                        <form action="{{ route('pengembalian.destroy', $pengembalian->id) }}" method="POST" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
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
