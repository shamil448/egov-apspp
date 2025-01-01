@include('components.PemerintahDashboard')
<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-center mb-4">Tambah Data TPA/TPS</h2>

        <!-- Menampilkan Pesan Sukses -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.914l-2.934 2.935a1 1 0 11-1.414-1.414l2.935-2.934-2.935-2.934a1 1 0 011.414-1.414L10 8.586l2.934-2.935a1 1 0 011.414 1.414L11.414 10l2.934 2.934a1 1 0 010 1.415z"/></svg>
                </span>
            </div>
        @endif

        <!-- Menampilkan Pesan Kesalahan -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Terjadi Kesalahan!</strong>
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

        <form action="{{ route('pemerintah.tambah-tpa-tps.submit') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-1">
                <!-- Kategori -->
                <div>
                    <label for="kategori" class="$block text-sm font-medium text-gray-700">Kategori</label>
                    <select id="kategori" name="kategori" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
                        <option value="" disabled selected>Pilih Kategori</option>
                        <option value="TPA">TPA</option>
                        <option value="TPS">TPS</option>
                    </select>
                </div>

                <!-- Alamat Lengkap -->
                <div>
                    <label for="alamat_lengkap" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                    <textarea id="alamat_lengkap" name="alamat_lengkap" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required></textarea>
                </div>

                <!-- Lokasi -->
                <div>
                    <input type="hidden" id="lokasi" name="lokasi" required>
                </div>
            </div>

            <!-- Google Maps -->
            <div class="mt-6">
                <div id="map" class="w-full h-96 border border-gray-300 rounded-md"></div>
            </div>

            <!-- Submit Button -->
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

<script>
    // Google Maps Initialization
    let map;
    let marker;

    function initMap() {
    const batam = { lat: 1.0418476, lng: 103.9314899 };

    map = new google.maps.Map(document.getElementById("map"), {
        center: batam,
        zoom: 13,
    });

    // Tambahkan marker hanya saat peta diklik
    map.addListener("click", (event) => {
        const clickedLocation = event.latLng;
        if (!marker) {
            marker = new google.maps.Marker({
                position: clickedLocation,
                map: map,
                draggable: true,
            });
        } else {
            marker.setPosition(clickedLocation);
        }
        updateLocation(clickedLocation);
    });
}

    function updateLocation(location) {
        const latitude = location.lat();
        const longitude = location.lng();
        const googleMapsLink = `https://www.google.com/maps?q=${latitude},${longitude}`;
        document.getElementById("lokasi").value = googleMapsLink;
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSqQC9Xm5aZu5Hw4ZYBzH7vwVqP4YyzTU&callback=initMap" async defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
@include('components.footer')