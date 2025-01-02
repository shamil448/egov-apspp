@include('components.PemerintahDashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="mt-16 flex justify-center">
            <div class="w-full lg:w-3/4 sm:w-full">
                <!-- Judul Halaman -->
                <h2 class="text-2xl font-bold text-center mb-4">EDIT KELURAHAN</h2>

                <!-- Form Edit Kelurahan -->
                <form action="{{ route('pemerintah.master_data.kelurahan.update', $kelurahan->id) }}" method="POST" class="bg-white shadow-lg rounded-lg border border-gray-200 p-4">
                    @csrf
                    @method('PUT')

                    <!-- Input Nama Kelurahan -->
                    <div class="mb-4">
                        <label for="kelurahan" class="block text-sm font-medium text-gray-700 mb-2">Nama Kelurahan</label>
                        <input type="text" id="kelurahan" name="kelurahan" value="{{ old('kelurahan', $kelurahan->kelurahan) }}" 
                               class="block w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-300 @error('kelurahan') border-red-500 @enderror">
                        @error('kelurahan')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Dropdown Kecamatan -->
                    <div class="mb-4">
                        <label for="kecamatan_id" class="block text-sm font-medium text-gray-700 mb-2">Kecamatan</label>
                        <select id="kecamatan_id" name="kecamatan_id" 
                                class="block w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-300 @error('kecamatan_id') border-red-500 @enderror">
                            <option value="" disabled selected>-- Pilih Kecamatan --</option>
                            @foreach ($kecamatan as $item)
                                <option value="{{ $item->id }}" {{ $kelurahan->kecamatan_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_kecamatan }}
                                </option>
                            @endforeach
                        </select>
                        @error('kecamatan_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('pemerintah.master_data.kelurahan.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-600 transition">Batal</a>
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@include('components.footer')
