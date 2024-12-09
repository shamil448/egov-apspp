@include('components.PemerintahDashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-center mb-4">TAMBAH EDUKASI</h2>
        <form action="{{ route('pemerintah.tambahedukasi') }}" method="POST" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-1">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Judul Edukasi</label>
                    <input type="text" id="title" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Masukkan judul edukasi" required>
                </div>
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700">Konten Edukasi</label>
                    <textarea id="content" name="content" rows="8" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Tulis isi edukasi..." required></textarea>
                </div>
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select id="category" name="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <option value="Berita">Berita</option>
                        <option value="Edukasi">Edukasi</option>
                    </select>
                </div>
                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700">Subjek</label>
                    <input type="text" id="subject" name="subject" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Masukkan subjek edukasi" required>
                </div>
                <div>
                    <label for="author" class="block text-sm font-medium text-gray-700">Penulis</label>
                    <input type="text" id="author" name="author" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Nama penulis" required>
                </div>
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700">Jenis Edukasi</label>
                    <select id="type" name="type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <option value="article">Artikel</option>
                        <option value="video">Video</option>
                        <option value="course">Kursus</option>
                    </select>
                </div>
                <div>
                    <label for="published_at" class="block text-sm font-medium text-gray-700">Tanggal Publikasi (Opsional)</label>
                    <input type="datetime-local" id="published_at" name="published_at" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
            </div>

            <div class="flex space-x-4 mt-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Tambah Edukasi
                </button>
                <button type="reset" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Batal
                </button>
            </div>
        </form>
    </div>

    <div class="mt-10">
    <h2 class="text-2xl font-bold text-center mb-4">UPLOAD GAMBAR EDUKASI</h2>
    <form action="{{ route('pemerintah.uploadgambar') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
            <label for="image" class="block text-sm font-medium text-gray-700">Unggah Gambar</label>
            <input type="file" id="image" name="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" required>
        </div>
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Upload Gambar
        </button>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@include('components.footer')
