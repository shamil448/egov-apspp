@include('components.PetugasDashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-center mb-4">JADWAL & RUTE PENGANGKUTAN</h2>
        
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Hari | Jam | Tanggal</th>
                        <th scope="col" class="px-6 py-3">Tujuan Lokasi</th>
                        <th scope="col" class="px-6 py-3">Nama Petugas</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data jadwal akan di-loop di sini -->
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">1</td>
                        <td class="px-6 py-4">Sen | 14.00 | 13/10/24</td>
                        <td class="px-6 py-4">Perum. Cendana</td>
                        <td class="px-6 py-4">Parto</td>
                        <td class="px-6 py-4 text-orange-600 font-bold">Sedang Berlangsung</td>
                    </tr>
                    <tr class="bg-gray-50 border-b dark:bg-gray-700 dark:border-gray-600">
                        <td class="px-6 py-4">2</td>
                        <td class="px-6 py-4">Sel | 10.00 | 15/10/24</td>
                        <td class="px-6 py-4">Perum. Mawar</td>
                        <td class="px-6 py-4">Tono</td>
                        <td class="px-6 py-4 text-green-600 font-bold">Selesai</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@include('components.footer')
