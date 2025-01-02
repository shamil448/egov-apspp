@include('components.PemerintahDashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="mt-16 flex justify-center">
            <div class="w-full lg:w-3/4 sm:w-full">
                <!-- Judul Halaman -->
                <h3 class="text-2xl font-bold text-gray-800 text-center mt-10">Daftar Kecamatan</h3>

                <!-- Pesan Sukses -->
                @if (session('success'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Card Tabel Daftar Kecamatan -->
                <div class="overflow-x-auto mt-6 bg-white shadow-lg rounded-lg border border-gray-200 p-4">
                    <!-- Tombol Tambah Kecamatan -->
                    <div class="mb-4">
                        <a href="{{ route('pemerintah.master_data.tambah-kecamatan') }}" class="bg-green-600 text-white px-4 py-2 rounded">Tambah Kecamatan</a>
                    </div>

                    <!-- Tabel -->
                    <table class="w-full table-auto border-collapse">
                        <thead class="bg-gray-300">
                            <tr>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">No</th>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Nama Kecamatan</th>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="table-body" style="border-collapse: collapse; empty-cells: hide;">
                            @foreach ($kecamatan as $item)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-4 px-6 text-gray-600">{{ $loop->iteration }}</td>
                                    <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $item->nama_kecamatan }}</td>
                                    <td class="py-4 px-6 text-gray-600 flex space-x-2">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('pemerintah.master_data.edit-kecamatan', $item->id) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-4 rounded">
                                            Edit
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('pemerintah.master_data.delete-kecamatan', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kecamatan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-1.5 rounded">
                                                Hapus
                                            </button>
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
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@include('components.footer')
