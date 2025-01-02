@include('components.RWdashboard')
<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-center mb-4">Konfirmasi Laporan Pengangkutan</h2>
        
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Hari</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Alamat Lengkap</th>
                        <th scope="col" class="px-6 py-3">Petugas</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @forelse($jadwal as $jadwalItem)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $jadwalItem->jadwalpengangkutan->hari }}</td>
                                <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $jadwalItem->status_pengangkutan }}</td>
                                <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $jadwalItem->jadwalpengangkutan->rw->alamat_lengkap }}</td>
                                <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $jadwalItem->jadwalpengangkutan->petugas->nama_petugas }}</td>
                                <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">
                                    <form action="{{ route('rw.konfirmasi', $jadwalItem->id) }}" method="POST">
                                        @csrf
                                        <button class="bg-blue-500 text-white px-4 py-2 rounded">Konfirmasi</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                        <tr>
                            <td colspan="5" class="py-4 px-6 text-center text-gray-500">Tidak ada laporan yang pending.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-center mb-4">Laporan Pengangkutan Yang Telah Disetujui</h2>
        
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Hari</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Alamat Lengkap</th>
                        <th scope="col" class="px-6 py-3">Petugas</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @forelse($Disetujui as $setuju)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $setuju->jadwalpengangkutan->hari }}</td>
                                <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $setuju->status_pengangkutan }}</td>
                                <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $setuju->jadwalpengangkutan->rw->alamat_lengkap }}</td>
                                <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $setuju->jadwalpengangkutan->petugas->nama_petugas }}</td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-4 px-6 text-center text-gray-500">Tidak ada laporan yang Disetujui.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
@include('components.footer')
