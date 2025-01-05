@include('components.PetugasDashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-center mb-4">DASHBOARD PETUGAS</h2>

        <!-- Statistik Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
            <div class="bg-blue-600 text-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold">Jumlah Pengangkutan Darurat</h3>
                <p class="text-3xl mt-4">0</p>
                <p class="mt-2">Pengangkutan Darurat Yang ada</p>
            </div>
            <div class="bg-green-600 text-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold">Laporan Selesai</h3>
                <p class="text-3xl mt-4">{{ $laporanselesai }}</p>
                <p class="mt-2">Laporan yang sudah dikonfirmasi oleh Rw</p>
            </div>
            <div class="bg-yellow-600 text-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold">Laporan Pending</h3>
                <p class="text-3xl mt-4">{{ $laporanpending }}</p>
                <p class="mt-2">Laporan yang menunggu konfirmasi dari Rw</p>
            </div>
        </div>

        <!-- Jadwal Tugas -->
        <div class="mt-16 flex justify-center">
            <div class="w-full lg:w-3/4">
                <h3 class="text-2xl font-bold text-gray-800 text-center mt-10">JADWAL TUGAS HARI INI ({{ $hariIni }})</h3> <!-- Margin lebih besar di sini -->
                <div class="overflow-x-auto mt-6 bg-white shadow-lg rounded-lg border border-gray-200 p-4">
                    <table class="w-full table-auto border-collapse">
                        <thead class="bg-gray-300">
                            <tr>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Hari</th>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Rw</th>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Alamat Lengkap</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($jadwalHariIni as $jadwal)
                            <tr>
                                <td class="py-4 px-6 text-gray-600">{{ $jadwal->hari }}</td>
                                <td class="py-4 px-6 text-gray-600">
                                    {{ $jadwal->rw->nama_rw ?? 'Tidak diketahui' }}/
                                    {{ $jadwal->rw->kelurahan->kelurahan ?? 'Tidak diketahui' }}/
                                    {{ $jadwal->rw->kelurahan->kecamatan->nama_kecamatan ?? 'Tidak diketahui' }}
                                </td>
                                <td class="py-4 px-6 text-gray-600">{{ $jadwal->rw->alamat_lengkap ?? 'Tidak tersedia' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-4 px-6 text-center text-gray-500">Tidak ada jadwal tugas untuk hari ini.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@include('components.footer')