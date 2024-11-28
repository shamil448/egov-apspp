@include('components.PetugasDashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-center mb-4">DASHBOARD PETUGAS</h2>

        <!-- Statistik Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
            <div class="bg-blue-600 text-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold">Jumlah Laporan</h3>
                <p class="text-3xl mt-4">125</p>
                <p class="mt-2">Laporan yang diterima hari ini</p>
            </div>
            <div class="bg-green-600 text-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold">Laporan Selesai</h3>
                <p class="text-3xl mt-4">95</p>
                <p class="mt-2">Laporan yang sudah diselesaikan</p>
            </div>
            <div class="bg-yellow-600 text-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold">Laporan Pending</h3>
                <p class="text-3xl mt-4">30</p>
                <p class="mt-2">Laporan yang menunggu tindak lanjut</p>
            </div>
        </div>

        <!-- Jadwal Tugas -->
        <div class="mt-16 flex justify-center">
            <div class="w-full lg:w-3/4">
                <h3 class="text-2xl font-bold text-gray-800 text-center mt-10">JADWAL TUGAS HARI INI</h3> <!-- Margin lebih besar di sini -->
                <div class="overflow-x-auto mt-6 bg-white shadow-lg rounded-lg border border-gray-200 p-4">
                    <table class="w-full table-auto border-collapse">
                        <thead class="bg-gray-300">
                            <tr>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Waktu</th>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Lokasi</th>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Tugas</th>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-4 px-6 text-gray-600">08:00 AM</td>
                                <td class="py-4 px-6 text-gray-600">Kelurahan A</td>
                                <td class="py-4 px-6 text-gray-600">Pengangkutan Sampah</td>
                                <td class="py-4 px-6 text-green-500">Selesai</td>
                            </tr>
                            <tr>
                                <td class="py-4 px-6 text-gray-600">10:00 AM</td>
                                <td class="py-4 px-6 text-gray-600">Kelurahan B</td>
                                <td class="py-4 px-6 text-gray-600">Pengecekan TPS</td>
                                <td class="py-4 px-6 text-yellow-500">Tunggu</td>
                            </tr>
                            <tr>
                                <td class="py-4 px-6 text-gray-600">02:00 PM</td>
                                <td class="py-4 px-6 text-gray-600">Kelurahan C</td>
                                <td class="py-4 px-6 text-gray-600">Edukasi Masyarakat</td>
                                <td class="py-4 px-6 text-blue-500">Proses</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@include('components.footer')
