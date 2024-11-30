@include('components.PemerintahDashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-center mb-4">SELAMAT DATANG DI DASHBOARD PEMERINTAH</h2>

        <!-- Statistik Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
            <div class="bg-blue-600 text-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold">Total Laporan</h3>
                <p class="text-3xl mt-4 font-bold">350</p>
                <p class="mt-2 text-sm">Laporan masuk sepanjang bulan</p>
            </div>
            <div class="bg-green-600 text-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold">Laporan Selesai</h3>
                <p class="text-3xl mt-4 font-bold">280</p>
                <p class="mt-2 text-sm">Laporan yang diselesaikan</p>
            </div>
            <div class="bg-yellow-600 text-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold">Laporan Pending</h3>
                <p class="text-3xl mt-4 font-bold">50</p>
                <p class="mt-2 text-sm">Laporan menunggu tindak lanjut</p>
            </div>
            <div class="bg-red-600 text-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold">Kritik & Saran</h3>
                <p class="text-3xl mt-4 font-bold">20</p>
                <p class="mt-2 text-sm">Masukan dari masyarakat</p>
            </div>
        </div>

        <!-- Jadwal Kegiatan -->
        <div class="mt-16 flex justify-center">
            <div class="w-full lg:w-3/4">
                <h3 class="text-2xl font-bold text-gray-800 text-center mt-10">JADWAL KEGIATAN HARI INI</h3>
                <div class="overflow-x-auto mt-6 bg-white shadow-lg rounded-lg border border-gray-200 p-4">
                    <table class="w-full table-auto border-collapse">
                        <thead class="bg-gray-300">
                            <tr>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Waktu</th>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Kegiatan</th>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Lokasi</th>
                                <th class="py-4 px-6 text-center text-gray-700 text-lg border-b border-gray-400">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-4 px-6 text-gray-600">08:00 AM</td>
                                <td class="py-4 px-6 text-gray-600">Rapat Koordinasi</td>
                                <td class="py-4 px-6 text-gray-600">Kantor Pemerintah</td>
                                <td class="py-4 px-6 text-center">
                                    <span class="bg-blue-100 text-blue-600 py-1 px-3 rounded-full text-sm font-semibold">Berlangsung</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-4 px-6 text-gray-600">10:00 AM</td>
                                <td class="py-4 px-6 text-gray-600">Kunjungan Lapangan</td>
                                <td class="py-4 px-6 text-gray-600">Kelurahan C</td>
                                <td class="py-4 px-6 text-center">
                                    <span class="bg-yellow-100 text-yellow-600 py-1 px-3 rounded-full text-sm font-semibold">Dijadwalkan</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-4 px-6 text-gray-600">02:00 PM</td>
                                <td class="py-4 px-6 text-gray-600">Sosialisasi Program</td>
                                <td class="py-4 px-6 text-gray-600">Kelurahan B</td>
                                <td class="py-4 px-6 text-center">
                                    <span class="bg-green-100 text-green-600 py-1 px-3 rounded-full text-sm font-semibold">Selesai</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Laporan Harian -->
        <div class="mt-16">
            <h3 class="text-2xl font-bold text-gray-800 text-center">LAPORAN HARIAN</h3>
            <div class="overflow-x-auto mt-6 bg-white shadow-lg rounded-lg border border-gray-200 p-4">
                <table class="w-full table-auto border-collapse">
                    <thead class="bg-gray-300">
                        <tr>
                            <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Tanggal</th>
                            <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Judul Laporan</th>
                            <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Petugas</th>
                            <th class="py-4 px-6 text-center text-gray-700 text-lg border-b border-gray-400">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-4 px-6 text-gray-600">2024-11-29</td>
                            <td class="py-4 px-6 text-gray-600">Edukasi Pengelolaan Sampah</td>
                            <td class="py-4 px-6 text-gray-600">Petugas A</td>
                            <td class="py-4 px-6 text-center">
                                <span class="bg-green-100 text-green-600 py-1 px-3 rounded-full text-sm font-semibold">Selesai</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-4 px-6 text-gray-600">2024-11-28</td>
                            <td class="py-4 px-6 text-gray-600">Pengecekan TPS</td>
                            <td class="py-4 px-6 text-gray-600">Petugas B</td>
                            <td class="py-4 px-6 text-center">
                                <span class="bg-red-100 text-red-600 py-1 px-3 rounded-full text-sm font-semibold">Tertunda</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@include('components.footer')
