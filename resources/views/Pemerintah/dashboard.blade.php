@include('components.PemerintahDashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-center mb-4">SELAMAT DATANG DI DASHBOARD PEMERINTAH</h2>

        <!-- Statistik Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
            <div class="bg-blue-600 text-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold">Total Laporan</h3>
                <p class="text-3xl mt-4 font-bold">{{ $laporanall }}</p>
                <p class="mt-2 text-sm">Total Laporan Pending Dan Selesai</p>
            </div>
            <div class="bg-green-600 text-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold">Laporan Selesai</h3>
                <p class="text-3xl mt-4 font-bold">{{ $laporanselesai }}</p>
                <p class="mt-2 text-sm">Laporan yang diselesaikan</p>
            </div>
            <div class="bg-yellow-600 text-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold">Laporan Pending</h3>
                <p class="text-3xl mt-4 font-bold">{{ $laporanpending }}</p>
                <p class="mt-2 text-sm">Laporan menunggu tindak lanjut</p>
            </div>
            <div class="bg-red-600 text-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold">Kritik & Saran</h3>
                <p class="text-3xl mt-4 font-bold">{{ $laporansaran }}</p>
                <p class="mt-2 text-sm">Masukan dari masyarakat</p>
            </div>
        </div>

        <!-- Jadwal Kegiatan -->
        <div class="mt-16 flex justify-center">
            <div class="w-full lg:w-3/4">
                <h3 class="text-2xl font-bold text-gray-800 text-center mt-10">JADWAL KEGIATAN PEMERINTAH</h3>
                <div class="overflow-x-auto mt-6 bg-white shadow-lg rounded-lg border border-gray-200 p-4">
                    <table class="w-full table-auto border-collapse">
                        <thead class="bg-gray-300">
                            <tr>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Kegiatan</th>
                                <th class="py-4 px-6 text-center text-gray-700 text-lg border-b border-gray-400">Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-4 px-6 text-gray-600">Melakukan Pengecekan Data Laporan</td>
                                <td class="py-4 px-6 text-center">
                                    <span class="bg-blue-100 text-blue-600 py-1 px-3 rounded-full text-sm font-semibold">Setiap Hari</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-4 px-6 text-gray-600">Kunjungan Lapangan</td>
                                <td class="py-4 px-6 text-center">
                                    <span class="bg-yellow-100 text-yellow-600 py-1 px-3 rounded-full text-sm font-semibold">Dijadwalkan</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-4 px-6 text-gray-600">Sosialisasi Program</td>
                                <td class="py-4 px-6 text-center">
                                    <span class="bg-yellow-100 text-yellow-600 py-1 px-3 rounded-full text-sm font-semibold">Dijadwalkan</span>
                                </td>
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