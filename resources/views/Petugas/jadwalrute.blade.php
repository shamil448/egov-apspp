@include('components.PetugasDashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-center mb-4">JADWAL & RUTE PENGANGKUTAN</h2>
        
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Hari</th>
                        <th scope="col" class="px-6 py-3">Rw</th>
                        <th scope="col" class="px-6 py-3">Alamat Lengkap</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jadwal as $jadwalItem)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $jadwalItem->hari }}</td>
                                <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $jadwalItem->rw->nama_rw }}/{{ $jadwalItem->rw->kelurahan->kelurahan }}/{{ $jadwalItem->rw->kelurahan->kecamatan->nama_kecamatan }}</td>
                                <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $jadwalItem->rw->alamat_lengkap }}</td>
                                <td class="py-4 px-6 text-gray-600 space-x-2">
                                    <ul>
                                        <li>
                                            <a href="{{ $jadwalItem->rw->lokasi }}" 
                                                target="_blank" 
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-5 rounded">
                                                 Lokasi 
                                            </a>
                                        </li>
                                        <br>
                                        <li>
                                            <a href="{{ route('petugas.tambahlaporan', ['jadwal_id' => $jadwalItem->id]) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-4 rounded">Laporan</a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@include('components.footer')
