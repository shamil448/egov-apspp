@include('components.Pemerintahdashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-center mb-4">PILIH PETUGAS UNTUK PENGANGKUTAN DARURAT</h2>

        <!-- Menampilkan Pesan Kesalahan -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Harap pilih petugas!</strong>
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.914l-2.934 2.935a1 1 0 11-1.414-1.414l2.935-2.934-2.935-2.934a1 1 0 011.414-1.414L10 8.586l2.934-2.935a1 1 0 011.414 1.414L11.414 10l2.934 2.934a1 1 0 010 1.415z" />
                    </svg>
                </span>
            </div>
        @endif

        <!-- Detail Pengangkutan Darurat -->
        <div class="bg-gray-50 p-4 rounded-md border border-gray-300 space-y-2 mb-6">
            <div class="grid grid-cols-2 gap-1 items-center">
                <p class="text-gray-700 font-semibold">Nama RW</p>
                <p class="text-gray-700">: {{ $pengangkutanDarurat->rw->nama_rw }}</p>

                <p class="text-gray-700 font-semibold">Nama Kelurahan</p>
                <p class="text-gray-700">: {{ $pengangkutanDarurat->rw->kelurahan->kelurahan }}</p>

                <p class="text-gray-700 font-semibold">Nama Kecamatan</p>
                <p class="text-gray-700">: {{ $pengangkutanDarurat->rw->kelurahan->kecamatan->nama_kecamatan }}</p>

                <p class="text-gray-700 font-semibold">Lokasi Dikirim</p>
                <p class="text-gray-700">: <a href="{{ $pengangkutanDarurat->kirim_lokasi }}" target="_blank" class="text-blue-500 underline">Lihat Lokasi</a></p>
            </div>
        </div>

        <!-- Form Pilih Petugas -->
        <form action="{{ route('pemerintah.update-status-request', $pengangkutanDarurat->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-4">
                <label for="petugas" class="block text-sm font-medium text-gray-700">Pilih Petugas</label>
                <select id="petugas" name="petugas_pengangkutan_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    <option value="" disabled selected>Pilih Petugas</option>
                    @foreach ($petugas as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Kirim Tugas
            </button>
        </form>
    </div>
</main>
