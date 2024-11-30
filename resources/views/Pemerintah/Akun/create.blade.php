@include('components.PemerintahDashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-center mb-4">TAMBAH EDUKASI</h2>
        <form action="{{ route('pemerintah.store-edukasi') }}" method="POST" class="space-y-4">
            @csrf
            <!-- Form inputs here -->
            <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-1">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Judul Edukasi</label>
                    <input type="text" id="title" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Masukkan judul edukasi" required>
                </div>
                <!-- Other input fields -->
            </div>

            <div class="flex space-x-4 mt-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                    Simpan
                </button>
                <a href="{{ route('pemerintah.list-edukasi') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-gray-700 bg-gray-200 hover:bg-gray-300">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</main>

@include('components.footer')
