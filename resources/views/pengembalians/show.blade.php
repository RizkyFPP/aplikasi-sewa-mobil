<!-- resources/views/pengembalians/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengembalian Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="container mx-auto">
                    <h2 class="text-2xl font-bold mb-4">Pengembalian Details</h2>

                    <dl class="grid grid-cols-2 gap-2">
                        <div class="mb-4">
                            <dt class="text-gray-600 text-sm font-bold mb-2">NO Plat:</dt>
                            <dd class="text-gray-800 text-sm">
                                {{ $pengembalian->peminjaman->mobil->no_plat }}
                            </dd>
                        </div>

                        <div class="mb-4">
                            <dt class="text-gray-600 text-sm font-bold mb-2">Tanggal Pengembalian:</dt>
                            <dd class="text-gray-800 text-sm">{{ $pengembalian->tanggal_pengembalian }}</dd>
                        </div>

                        <div class="mb-4">
                            <dt class="text-gray-600 text-sm font-bold mb-2">KM Awal:</dt>
                            <dd class="text-gray-800 text-sm">{{ $pengembalian->km_awal }}</dd>
                        </div>

                        <div class="mb-4">
                            <dt class="text-gray-600 text-sm font-bold mb-2">KM Akhir:</dt>
                            <dd class="text-gray-800 text-sm">{{ $pengembalian->km_akhir }}</dd>
                        </div>
                    </dl>

                    <a href="{{ route('pengembalian.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Back to Pengembalian List</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
