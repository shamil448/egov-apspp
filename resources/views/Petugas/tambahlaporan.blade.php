@include('components.PetugasDashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-center mb-4">LAPORAN TUGAS HARIAN</h2>
        <!-- Menampilkan Pesan Kesalahan -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Laporan Gagal Harap Pastikan Foto Minimal 3 dan Isi catatan!</strong>
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.914l-2.934 2.935a1 1 0 11-1.414-1.414l2.935-2.934-2.935-2.934a1 1 0 011.414-1.414L10 8.586l2.934-2.935a1 1 0 011.414 1.414L11.414 10l2.934 2.934a1 1 0 010 1.415z"/></svg>
                </span>
            </div>
        @endif
        <form action="{{ route('petugas.tambahlaporan.submit') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="bg-gray-50 p-4 rounded-md border border-gray-300 space-y-2">
                <input type="hidden" id="jadwalpengangkutan_id" name="jadwalpengangkutan_id" value="{{ $jadwal->id }}" required>
                <div class="grid grid-cols-2 gap-1 items-center">
                    <p class="text-gray-700 font-semibold">Hari</p>
                    <p class="text-gray-700">: {{ $jadwal->hari }}</p>
            
                    <p class="text-gray-700 font-semibold">RW</p>
                    <p class="text-gray-700">: {{ $jadwal->rw->nama_rw }}</p>
            
                    <p class="text-gray-700 font-semibold">Kelurahan</p>
                    <p class="text-gray-700">: {{ $jadwal->rw->kelurahan->kelurahan }}</p>
            
                    <p class="text-gray-700 font-semibold">Kecamatan</p>
                    <p class="text-gray-700">: {{ $jadwal->rw->kelurahan->kecamatan->nama_kecamatan }}</p>
            
                    <p class="text-gray-700 font-semibold">Alamat Lengkap</p>
                    <p class="text-gray-700">: {{ $jadwal->rw->alamat_lengkap }}</p>
                </div>
            </div>
            <div>
                <input type="hidden" id="status_pengangkutan" name="status_pengangkutan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm bg-gray-100 text-gray-500 cursor-not-allowed" value="Pending" disabled>
            </div>

            <!-- Catatan -->
            <div>
                <label for="catatan" class="block text-sm font-medium text-gray-700">Catatan</label>
                <textarea id="catatan" name="catatan" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Tambahkan Catatan Pengangkutan..." required></textarea>
            </div>

            <div>
                <label for="foto" class="block text-sm font-medium text-gray-700">Upload Foto Pengangkutan (Minimal 3 gambar)</label>
                <input type="file" id="foto" name="foto[]" class="mt-1 block w-full text-sm text-gray-900 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200" accept="image/*" multiple required>
                <ul id="fileList" class="mt-2 text-sm text-gray-700 list-decimal pl-4"></ul>
            </div>

            <!-- Buttons -->
            <div class="mt-10 flex items-center space-x-6">
                <!-- Tombol Kirim Laporan (Biru) -->
                <button type="submit" class="inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Kirim Laporan
                </button>

                <!-- Tombol Batal (Merah) -->
                <button type="reset" class="inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Reset
                </button>
            </div>
        </form>
    </div>
</main>

<script>
    const fileInput = document.getElementById('foto');
    const fileList = document.getElementById('fileList');
    let filesArray = [];

    fileInput.addEventListener('change', function (event) {
        const files = Array.from(event.target.files);

        // Tambahkan file baru ke dalam array jika belum ada
        files.forEach(file => {
            if (!filesArray.some(f => f.name === file.name)) {
                filesArray.push(file);
            }
        });

        // Tampilkan file dalam daftar
        renderFileList();
    });

    function renderFileList() {
        fileList.innerHTML = ''; // Kosongkan daftar sebelumnya
        filesArray.forEach((file, index) => {
            const li = document.createElement('li');
            li.className = 'flex justify-between items-center mb-2';

            const fileName = document.createElement('span');
            fileName.textContent = `${index + 1}. ${file.name}`;

            const removeButton = document.createElement('button');
            removeButton.textContent = 'Hapus';
            removeButton.className = 'ml-4 text-red-500 hover:text-red-700';
            removeButton.addEventListener('click', () => removeFile(index));

            li.appendChild(fileName);
            li.appendChild(removeButton);
            fileList.appendChild(li);
        });
    }

    function removeFile(index) {
        filesArray.splice(index, 1); // Hapus file dari array
        renderFileList(); // Render ulang daftar file
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@include('components.footer')
