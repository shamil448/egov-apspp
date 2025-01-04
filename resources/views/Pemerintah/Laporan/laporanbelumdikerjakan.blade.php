@include('components.PemerintahDashboard')

<main class="p-4 sm:ml-64 mt-10"> 
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="mt-16 flex justify-center">
            <div class="w-full lg:w-3/4 sm:w-full">
                <h3 class="text-2xl font-bold text-gray-800 text-center mt-10">
                    Laporan Tugas Pengangkutan Harian Yang Belum Dikerjakan
                </h3>
                <div class="overflow-x-auto mt-6 bg-white shadow-lg rounded-lg border border-gray-200 p-4">
                    <!-- Filter Tanggal -->
                    <form method="GET" action="{{ route('pemerintah.laporanbelumdikerjakan') }}" class="flex flex-col sm:flex-row gap-4 mb-6">
                        <div class="flex flex-col w-full sm:w-1/2">
                            <label for="tanggal" class="text-gray-700 font-medium">Pilih Tanggal:</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control border-gray-300 rounded-lg px-3 py-2"
                                value="{{ $tanggal ?? '' }}">
                        </div>
                        <div class="flex items-end w-full sm:w-1/4">
                            <button type="submit" class="btn btn-primary w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
                                Filter
                            </button>
                        </div>
                    </form>

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
                                    <td class="py-4 px-6 text-gray-600">{{ ucfirst($jadwal->hari) }}</td>
                                    <td class="py-4 px-6 text-gray-600">{{ $jadwal->petugas->nama_petugas ?? 'Tidak Diketahui' }}</td>
                                    <td class="py-4 px-6 text-gray-600">{{ $jadwal->rw_id }}</td>
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
