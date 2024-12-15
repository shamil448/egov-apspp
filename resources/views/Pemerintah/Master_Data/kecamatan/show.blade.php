@include('components.PemerintahDashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="mt-16 flex justify-center">
            <div class="w-full lg:w-3/4 sm:w-full">
                <!-- Judul Halaman -->
                <h2 class="text-2xl font-bold text-center mb-4">DETAIL KECAMATAN</h2>

                <!-- Detail Informasi Kecamatan -->
                <div class="bg-white shadow-lg rounded-lg border border-gray-200 p-4 mb-6">
                    <p class="text-lg text-gray-700">
                        <strong>Nama Kecamatan:</strong> {{ $kecamatan->nama_kecamatan }}
                    </p>
                </div>

                <!-- Tombol Kembali -->
                <div class="flex justify-end">
                    <a href="{{ route('kecamatan.index') }}" class="bg-gray-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-gray-600 transition">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@include('components.footer')