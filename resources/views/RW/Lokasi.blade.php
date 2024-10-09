@include('components.dashboard')
<div class="flex-2 p-6 bg-gray-100">
    <h2 class="text-2xl font-semibold mb-6">Kirim Lokasi</h2>
    <form action="{{ route('rw.lokasi') }}" method="POST" class="space-y-4">
        @csrf
        <div class="grid grid-cols-0 gap-">
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
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3163.4187465147656!2d-122.08424968424349!3d37.42206597982651!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb5e25fbd7077%3A0xa70f6db5753ae044!2sGoogleplex!5e0!3m2!1sen!2sid!4v1638920610015!5m2!1sen!2sid"
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

@include('components.footer')