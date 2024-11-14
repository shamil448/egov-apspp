@include('components.RWdashboard')
<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-center mb-4">KRITIK & SARAN</h2>
        <form action="{{ route('rw.kritik-saran') }}" method="POST" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 gap-2">
                <!-- Tanggal -->
                <div class="flex flex-col">
                    <label for="tanggal" class="text-sm font-medium text-gray-700">Tanggal</label>
                    <input type="text" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}" 
                        class="border border-gray-300 rounded-md p-2 cursor-not-allowed" disabled>
                </div>
                <!-- Nama -->
                <div class="flex flex-col">
                    <label for="nama" class="text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama"
                        class="border border-gray-300 rounded-md p-2">
                </div>

                <!-- Tingkat Kepuasan -->
                <div class="flex flex-col">
                    <label for="kepuasan" class="text-sm font-medium text-gray-700">Tingkat Kepuasan</label>
                    <input type="number" id="kepuasan" name="kepuasan" min="0" max="100" value="{{ old('kepuasan', 0) }}"
                        class="border border-gray-300 rounded-md p-2">
                </div>

                <!-- Kritik -->
                <div class="flex flex-col">
                    <label for="kritik" class="text-sm font-medium text-gray-700">Kritik</label>
                    <textarea id="kritik" name="kritik" rows="4" placeholder="Tulis Kritik Anda"
                        class="border border-gray-300 rounded-md p-2">{{ old('kritik') }}</textarea>
                </div>

                <!-- Saran -->
                <div class="flex flex-col">
                    <label for="saran" class="text-sm font-medium text-gray-700">Saran</label>
                    <textarea id="saran" name="saran" rows="4" placeholder="Tulis Saran Anda"
                        class="border border-gray-300 rounded-md p-2">{{ old('saran') }}</textarea>
                </div>
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