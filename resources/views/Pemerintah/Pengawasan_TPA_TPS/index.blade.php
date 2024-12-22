@include('components.PemerintahDashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <!-- Tabel Pengawasan TPA/TPS -->
        <div class="mt-16">
            <h3 class="text-2xl font-bold text-gray-800 text-center">DAFTAR PENGAWASAN TPA/TPS</h3>
            <div class="overflow-x-auto mt-6 bg-white shadow-lg rounded-lg border border-gray-200 p-4">
                <table class="w-full table-auto border-collapse">
                    <thead class="bg-gray-300">
                        <tr>
                            <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">ID</th>
                            <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Nama</th>
                            <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Lokasi</th>
                            <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Kategori</th>
                            <th class="py-4 px-6 text-center text-gray-700 text-lg border-b border-gray-400">Dibuat Pada</th>
                            <th class="py-4 px-6 text-center text-gray-700 text-lg border-b border-gray-400">Diperbarui Pada</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-4 px-6 text-gray-600">1</td>
                            <td class="py-4 px-6 text-gray-600">TPA Suralaya</td>
                            <td class="py-4 px-6 text-gray-600">Cilegon, Banten</td>
                            <td class="py-4 px-6 text-gray-600">TPA</td>
                            <td class="py-4 px-6 text-center text-gray-600">2024-11-30</td>
                            <td class="py-4 px-6 text-center text-gray-600">2024-12-01</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-6 text-gray-600">2</td>
                            <td class="py-4 px-6 text-gray-600">TPS Kelurahan B</td>
                            <td class="py-4 px-6 text-gray-600">Kelurahan B, Cilegon</td>
                            <td class="py-4 px-6 text-gray-600">TPS</td>
                            <td class="py-4 px-6 text-center text-gray-600">2024-11-28</td>
                            <td class="py-4 px-6 text-center text-gray-600">2024-12-01</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-6 text-gray-600">3</td>
                            <td class="py-4 px-6 text-gray-600">TPA Wilayah C</td>
                            <td class="py-4 px-6 text-gray-600">Kelurahan C, Cilegon</td>
                            <td class="py-4 px-6 text-gray-600">TPA</td>
                            <td class="py-4 px-6 text-center text-gray-600">2024-11-25</td>
                            <td class="py-4 px-6 text-center text-gray-600">2024-12-01</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@include('components.footer')
