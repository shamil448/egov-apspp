@include('components.PemerintahDashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="mt-16 flex justify-center">
            <div class="w-full lg:w-3/4 sm:w-full">
                <!-- Judul Halaman -->
                <h2 class="text-2xl font-bold text-center mb-4">TAMBAH KECAMATAN</h2>

                <!-- Form Tambah Kecamatan -->
                <form action="{{ route('pemerintah.master_data.tambah-kecamatan.submit') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="nama_kecamatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kecamatan</label>
                        <input type="text" id="nama_kecamatan" name="nama_kecamatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white @error('nama_kecamatan') border-red-500 @enderror" value="{{ old('nama_kecamatan') }}" required>
                        @error('nama_kecamatan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('pemerintah.master_data.index-kecamatan') }}" class="bg-gray-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-gray-700 transition">Batal</a>
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@include('components.footer')