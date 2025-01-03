@include('components.PemerintahDashboard')

<main class="p-4 sm:ml-64 mt-10"> 
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="mt-16 flex justify-center">
            <div class="w-full lg:w-3/4 sm:w-full">
                <h3 class="text-2xl font-bold text-gray-800 text-center mt-10">Laporan Tugas Pengangkutan Harian</h3>
                @if(session('success'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="overflow-x-auto mt-6 bg-white shadow-lg rounded-lg border border-gray-200 p-4">
                    
                    <table class="w-full table-auto border-collapse">
                        <thead class="bg-gray-300">
                            <tr>
                            <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Jadwal</th>
                            <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Status</th>
                            <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Catatan</th>
                            <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Tanggal</th>
                            <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Foto</th>
                            
                            </tr>
                        </thead>
                        <tbody id="table-body" style="border-collapse: collapse; empty-cells: hide;">
                            @forelse($laporan as $laporanitem)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $laporanitem->jadwalpengangkutan_id }}</td>
                                    <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $laporanitem->status_pengangkutan }}</td>
                                    <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $laporanitem->catatan }}</td>
                                    <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $laporanitem->created_at }}</td>
                                    <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">
                                        <button data-modal-target="crud-modal-{{ $laporanitem->id }}" data-modal-toggle="crud-modal-{{ $laporanitem->id }}" 
                                                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" 
                                                type="button">
                                            Lihat Foto
                                        </button>
                                    </td>
                                    <div id="crud-modal-{{ $laporanitem->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-5xl max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                        Bukti Foto Pengangkutan #{{ $laporanitem->id }}
                                                    </h3>
                                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal-{{ $laporanitem->id }}">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <form class="p-4 md:p-5">
                                                    <div class="grid gap-4 mb-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                                                        @foreach(json_decode($laporanitem->foto, true) as $foto)
                                                            <div class="flex justify-center items-center">
                                                                <img src="{{ asset('storage/laporanpengangkutan/' . $foto) }}" alt="Foto Pengangkutan" class="w-full h-auto max-h-96 object-contain rounded-lg shadow-lg">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="py-4 px-6 text-center text-gray-500">Tidak ada data laporan tersedia.</td>
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
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modalToggles = document.querySelectorAll('[data-modal-toggle]');
        modalToggles.forEach(toggle => {
            toggle.addEventListener('click', function () {
                const modalId = this.getAttribute('data-modal-toggle');
                const modal = document.getElementById(modalId);
                modal.classList.toggle('hidden');
            });
        });

        // Optional: Close modal when clicking on close button (X)
        const closeButtons = document.querySelectorAll('.close-modal');
        closeButtons.forEach(button => {
            button.addEventListener('click', function () {
                const modalId = this.getAttribute('data-modal-toggle');
                const modal = document.getElementById(modalId);
                modal.classList.add('hidden');
            });
        });
    });
</script>
@include('components.footer')