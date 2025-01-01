@include('components.RWdashboard')
<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
       <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 w-full max-w-screen-lg">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <p class="text-gray-500 mb-4">New products this week</p>
                <p class="text-blue-600 mt-4">PRODUCTS REPORT</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <p class="text-gray-500 mb-4">Visitors this week</p>
                <p class="text-blue-600 mt-4">VISITS REPORT</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <p class="text-gray-500 mb-4">User signups this week</p>
                <p class="text-blue-600 mt-4">USERS REPORT</p>
            </div>
       </div>
       <br>
       <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-center mb-4">JADWAL & RUTE PENGANGKUTAN</h2>
        
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Hari</th>
                        <th scope="col" class="px-6 py-3">Rw</th>
                        <th scope="col" class="px-6 py-3">Alamat Lengkap</th>
                        <th scope="col" class="px-6 py-3">Petugas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jadwal as $jadwalItem)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $jadwalItem->hari }}</td>
                                <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $jadwalItem->rw->nama_rw }}/{{ $jadwalItem->rw->kelurahan->kelurahan }}/{{ $jadwalItem->rw->kelurahan->kecamatan->nama_kecamatan }}</td>
                                <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $jadwalItem->rw->alamat_lengkap }}</td>
                                <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $jadwalItem->petugas->nama_petugas }}</td>
                                
                            </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
       
    </div>
</main>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
@include('components.footer')
