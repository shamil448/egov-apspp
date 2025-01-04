@extends('components.Pemerintahdashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-center mb-4">DAFTAR PENGANGKUTAN DARURAT</h2>

        <!-- Pesan Sukses -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.914l-2.934 2.935a1 1 0 11-1.414-1.414l2.935-2.934-2.935-2.934a1 1 0 011.414-1.414L10 8.586l2.934-2.935a1 1 0 011.414 1.414L11.414 10l2.934 2.934a1 1 0 010 1.415z" />
                    </svg>
                </span>
            </div>
        @endif
            <!-- Tabel Pengangkutan Darurat -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nama RW</th>
                            <th scope="col" class="px-6 py-3">Nama Kecamatan</th>
                            <th scope="col" class="px-6 py-3">Nama Kelurahan</th>
                            <th scope="col" class="px-6 py-3">Lokasi Dikirim</th>
                            <th scope="col" class="px-6 py-3">Foto</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengangkutanDarurat as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="py-4 px-6 text-gray-600">{{ $item->rw->nama_rw }}</td>
                                <td class="py-4 px-6 text-gray-600">{{ $item->rw->kelurahan->kecamatan->nama_kecamatan }}</td>
                                <td class="py-4 px-6 text-gray-600">{{ $item->rw->kelurahan->kelurahan }}</td>
                                <td class="py-4 px-6 text-gray-600">
                                    <a href="{{ $item->kirim_lokasi }}" target="_blank" class="text-blue-500 underline">Lihat Lokasi</a>
                                </td>
                                <td class="py-4 px-6 text-gray-600">
                                    <div class="grid grid-cols-3 gap-2">
                                        @foreach (json_decode($item->foto, true) as $foto)
                                            <img src="{{ asset('storage/pengangkutan_darurat/' . $foto) }}" alt="Foto Pengangkutan" class="w-16 h-16 object-cover rounded">
                                        @endforeach
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-gray-600">{{ $item->status }}</td>
                                <td class="py-4 px-6 text-gray-600">
                                    @if ($item->status != 'Progress')
                                        <form action="{{ route('pemerintah.update-status', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Setujui</button>
                                        </form>
                                    @else
                                        <span class="text-green-500 font-semibold">Progress</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@include('components.footer')
