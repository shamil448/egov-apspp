@include('components.RWdashboard')
<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-center mb-4">KIRIM LOKASI</h2>
        <form action="{{ route('rw.lokasi') }}" method="POST" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 gap-1">
                <div>
                    <label for="nama_perumahan" class="block text-sm font-medium text-gray-700">Nama Perumahan</label>
                    <input type="text" id="nama_perumahan" name="nama_perumahan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
                </div>
                <div>
                    <label for="kirim_lokasi" class="block text-sm font-medium text-gray-700">Kirim Lokasi</label>
                    <input type="text" id="kirim_lokasi" name="kirim_lokasi" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
                </div>
                <div>
                    <label for="nama_kecamatan" class="block text-sm font-medium text-gray-700">Nama Kecamatan</label>
                    <input type="text" id="nama_kecamatan" name="nama_kecamatan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
                </div>
                <div>
                    <label for="nama_kelurahan" class="block text-sm font-medium text-gray-700">Nama Kelurahan</label>
                    <input type="text" id="nama_kelurahan" name="nama_kelurahan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
                </div>
            </div>

            <div class="mt-6">
                <iframe
                    class="w-full h-64 border border-gray-300 rounded-md"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22153.930922434486!2d104.0241273723873!3d1.0812007489933565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdafbb0c87e1f7%3A0x4208a035d65706a!2sBatam%2C%20Kepulauan%20Riau%2C%20Indonesia!5e0!3m2!1sen!2sid!4v1638920610015!5m2!1sen!2sid"
                    style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>

            <div class="flex space-x-4 mt-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Kirim
                </button>
                <button type="reset" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Batal
                </button>
            </div>
        </form> 
    </div>
</main>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
@include('components.footer')
