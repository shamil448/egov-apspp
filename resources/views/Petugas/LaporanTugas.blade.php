@include('components.PetugasDashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-center mb-4">DATA LAPORAN TUGAS</h2>
        
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Hari</th>
                        <th scope="col" class="px-6 py-3">Lokasi Pengangkutan</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($laporan as $laporantugas)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $laporantugas->jadwalpengangkutan->hari }}</td>
                                <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $laporantugas->jadwalpengangkutan->rw->alamat_lengkap }}</td>
                                <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $laporantugas->status_pengangkutan }}</td>
                                <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $laporantugas->created_at }}</td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@include('components.footer')
