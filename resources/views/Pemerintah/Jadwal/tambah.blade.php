@include('components.PemerintahDashboard')
<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-center mb-4">Tambah Jadwal Pengangkutan</h2>

        <!-- Menampilkan Pesan Sukses -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.914l-2.934 2.935a1 1 0 11-1.414-1.414l2.935-2.934-2.935-2.934a1 1 0 011.414-1.414L10 8.586l2.934-2.935a1 1 0 011.414 1.414L11.414 10l2.934 2.934a1 1 0 010 1.415z"/></svg>
                </span>
            </div>
        @endif

        <!-- Menampilkan Pesan Kesalahan -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Terjadi Kesalahan!</strong>
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.914l-2.934 2.935a1 1 0 11-1.414-1.414l2.935-2.934-2.935-2.934a1 1 0 011.414-1.414L10 8.586l2.934-2.935a1 1 0 011.414 1.414L11.414 10l2.934 2.934a1 1 0 010 1.415z"/></svg>
                </span>
            </div>
        @endif

        <form action="{{ route('pemerintah.tambah-jadwal.submit') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-1">
                
                <div>
                    <label for="hari" class="block text-sm font-medium text-gray-700">Hari</label>
                    <select id="hari" name="hari" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
                        <option value="" disabled selected>Pilih Hari</option>
                        <option value="Hari 1">Hari Ke 1</option>
                        <option value="Hari 2">Hari Ke 2</option>
                        <option value="Hari 3">Hari Ke 3</option>
                    </select>
                </div>  
                <div>
                    <label for="rw_id" class="block text-sm font-medium text-gray-700">RW</label>
                    <select id="rw_id" name="rw_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
                        <option value="" disabled selected>Pilih RW</option>
                        @foreach ($jadwal as $rw)
                            <option value="{{ $rw->id }}">
                                {{ $rw->nama_rw }}/{{ $rw->kelurahan->kecamatan->nama_kecamatan }}/{{ $rw->kelurahan->kelurahan }}
                            </option>
                        @endforeach
                    </select>
                    
                </div>               
                <div class="mb-4">
                    <label for="petugas_id" class="block text-sm font-medium text-gray-700">Petugas Pengangkutan</label>
                    <select id="petugas_id" name="petugas_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
                        <option value="" disabled selected>Pilih Petugas</option>
                        @foreach ($jadwals as $petugas)
                            <option value="{{ $petugas->id }}">
                                {{ $petugas->nama_petugas }}/{{ $petugas->kecamatan->nama_kecamatan }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
            </div>

            <!-- Submit Button -->
            <div class="flex space-x-4 mt-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Kirim
                </button>
                <button type="reset" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Batal
                </button>
            </div>
        </form>
    </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
@include('components.footer')
