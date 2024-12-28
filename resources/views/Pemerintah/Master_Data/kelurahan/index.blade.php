@include('components.PemerintahDashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="mt-16 flex justify-center">
            <div class="w-full lg:w-3/4 sm:w-full">
                <!-- Judul Halaman -->
                <h2 class="text-2xl font-bold text-center mb-4">MANAJEMEN Kelurahan</h2>


                <div class="container mx-auto p-4">
    <!-- Tombol Tambah Kelurahan -->
    <div class="flex justify-end mb-4">
        <a href="{{ route('pemerintah.master_data.kelurahan.store') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-700 transition flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span>Tambah Kelurahan</span>
        </a>
    </div>

    <!-- Form Input Kelurahan -->
    <form action="{{ route('pemerintah.master_data.kelurahan.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="kelurahan" class="block text-gray-700 font-bold">Nama Kelurahan:</label>
            <input type="text" name="kelurahan" required class="border rounded-lg px-3 py-2 w-full">
        </div>

        <div>
            <label for="kecamatan_id" class="block text-gray-700 font-bold">Kecamatan:</label>
            <select name="kecamatan_id" required class="border rounded-lg px-3 py-2 w-full">
                @foreach($kecamatan as $kec)
                    <option value="{{ $kec->id }}">{{ $kec->nama_kecamatan }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-green-700 transition">
                Simpan
            </button>
        </div>
    </form>
</div>

                <!-- Tabel Daftar Kelurahan -->
                <div class="overflow-x-auto mt-6 bg-white shadow-lg rounded-lg border border-gray-200 p-4">
                    <table class="w-full table-auto border-collapse">
                        <thead class="bg-gray-300">
                            <tr>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">No</th>
				<th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Nama Kelurahan</th>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Kecamatan</th>
                                <th class="py-4 px-6 text-center text-gray-700 text-lg border-b border-gray-400">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="table-body" style="border-collapse: collapse; empty-cells: hide;">
                            @foreach($kelurahans as $kelurahan)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-4 px-6 text-gray-600">{{ $loop->iteration }}</td>
                                    <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $kelurahan->kelurahan }}</td>
				    <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $kelurahan->kecamatan->nama_kecamatan }}</td>
                                    <td class="py-4 px-6 text-gray-600 space-x-2 flex justify-center">
                                        <ul>
                                            <!-- Tombol Edit -->
                                            <li>
                                                <a href="{{ route('kelurahan.edit', $kelurahan->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-4 rounded">
                                                    Edit
                                                </a>
                                            </li>
                                            <br>
                                            <!-- Tombol Hapus -->
                                            <li>
                                                <form action="{{ route('kelurahan.destroy', $kelurahan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kecamatan ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Apakah Anda yakin?')">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
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