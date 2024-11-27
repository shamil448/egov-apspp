@include('components.PetugasDashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-6 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 bg-white shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-6 text-blue-700">LAPORAN TUGAS</h2>
        <form action="{{ route('petugas.submitLaporan') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <!-- Lokasi Pengangkutan -->
            <div>
                <label for="lokasi" class="block text-sm font-medium text-gray-700">Lokasi Pengangkutan</label>
                <input type="text" id="lokasi" name="lokasi" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Masukkan lokasi pengangkutan" required>
            </div>

            <!-- Status Pengangkutan -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status Pengangkutan</label>
                <select id="status" name="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    <option value="selesai">Selesai</option>
                    <option value="belum">Belum Selesai</option>
                </select>
            </div>

            <!-- Catatan -->
            <div>
                <label for="catatan" class="block text-sm font-medium text-gray-700">Catatan</label>
                <textarea id="catatan" name="catatan" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Masukkan catatan tambahan..." required></textarea>
            </div>

            <!-- Tanggal dan Waktu -->
            <div>
                <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal dan Waktu</label>
                <input type="datetime-local" id="tanggal" name="tanggal" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
            </div>

            <!-- Upload Gambar -->
            <div>
                <label for="foto" class="block text-sm font-medium text-gray-700">Upload Foto</label>
                <input type="file" id="foto" name="foto" class="mt-1 block w-full text-sm text-gray-900 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200" accept="image/*" required>
            </div>

            <!-- Buttons -->
            <div class="mt-10 flex items-center space-x-6">
                <!-- Tombol Kirim Laporan (Biru) -->
                <button type="submit" class="inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Kirim Laporan
                </button>

                <!-- Tombol Batal (Merah) -->
                <button type="reset" class="inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Batal
                </button>
            </div>
        </form>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@include('components.footer')
