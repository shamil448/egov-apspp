@include('components.PemerintahDashboard')

<main class="p-4 sm:ml-64 mt-10"> 
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="mt-16 flex justify-center">
            <div class="w-full lg:w-3/4 sm:w-full">
                <h3 class="text-2xl font-bold text-gray-800 text-center mt-10">
                    Pengangkutan Harian Yang Belum Dikerjakan Hari Ini
                </h3>
                <div class="overflow-x-auto mt-6 bg-white shadow-lg rounded-lg border border-gray-200 p-4">
                    <!-- Tabel Data -->
                    <table class="w-full table-auto border-collapse">
                        <thead class="bg-gray-300">
                            <tr>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">No</th>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Hari</th>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Petugas</th>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">RW</th>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Status</th>
                            </tr>
                        </thead>
                        <tbody id="table-body" style="border-collapse: collapse;">
                            @forelse ($jadwalBelumDikerjakan as $index => $jadwal)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-4 px-6 text-gray-600">{{ $index + 1 }}</td>
                                    <td class="py-4 px-6 text-gray-600">
                                        <ul>
                                            <li>Hari  : {{ ucfirst($jadwal->hari) }}</li>
                                            <li>Alamat: {{ ($jadwal->rw->alamat_lengkap) }}</li>
                                        </ul>
                                    </td>
                                    <td class="py-4 px-6 text-gray-600">{{ $jadwal->petugas->nama_petugas ?? 'Tidak Diketahui' }}-{{ $jadwal->petugas->kecamatan->nama_kecamatan ?? 'Tidak Diketahui' }}</td>
                                    <td class="py-4 px-6 text-gray-600">{{ $jadwal->rw->nama_rw }}/{{ $jadwal->rw->kelurahan->kelurahan }}</td>
                                    <td class="py-4 px-6 text-gray-600 text-red-500 font-semibold">
                                        Belum Ada Laporan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-4 px-6 text-center text-gray-500">
                                        Tidak ada pengangkutan yang belum dilaporkan pada hari ini.
                                    </td>
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
