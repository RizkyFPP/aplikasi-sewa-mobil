<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mobil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="container mx-auto">
                    <h2 class="text-2xl font-bold mb-4">Mobil List</h2>

                    <!-- Display a success message if any -->
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <a href="{{ route('mobil.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add New Car</a>

                    <table class="table-auto mt-4 w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Merek</th>
                                <th class="px-4 py-2">Model</th>
                                <th class="px-4 py-2">No Plat</th>
                                <th class="px-4 py-2">Tarif Sewa</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mobils as $mobil)
                                <tr>
                                    <td class="border px-4 py-2">{{ $mobil->id }}</td>
                                    <td class="border px-4 py-2">{{ $mobil->merek }}</td>
                                    <td class="border px-4 py-2">{{ $mobil->model }}</td>
                                    <td class="border px-4 py-2">{{ $mobil->no_plat }}</td>
                                    <td class="border px-4 py-2">{{ $mobil->tarif_sewa }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('mobil.show', $mobil->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded">View</a>
                                        <a href="{{ route('mobil.edit', $mobil->id) }}" class="bg-green-500 text-white px-2 py-1 rounded">Edit</a>
                                        <form action="{{ route('mobil.destroy', $mobil->id) }}" method="POST" style="display:inline">
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
