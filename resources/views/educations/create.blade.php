@include('components.PemerintahDashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-center mb-4">TAMBAH EDUKASI</h2>
        <form action="{{ route('pemerintah.storeEdukasi') }}" method="POST" enctype="multipart/form-data">
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
                    <label for="author" class="block text-sm font-medium text-gray-700">Penulis</label>
                    <input type="text" id="author" name="author" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Nama penulis" required>
                </div>
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700">Jenis Edukasi</label>
                    <select id="type" name="type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <option value="article">Artikel</option>
                        <option value="video">Video</option>
                        <option value="course">Edukasi</option>
                    </select>
                </div>

                <div class="mb-3">
                        <label for="image" class="form-label">Gambar (opsional)</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label for="video" class="form-label">Video (opsional)</label>
                            <input type="file" name="video" id="video" class="form-control" accept="video/*">
                        </div>

                        <button type="submit" class="btn btn-success w-100">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@include('components.footer')
