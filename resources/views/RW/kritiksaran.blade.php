@include('components.dashboard')
<div class="flex flex-col items-center bg-gray-100 min-h-screen py-6">
        <div class="bg-white shadow-md rounded-md p-6 w-full max-w-2xl">
            <h2 class="text-2xl font-bold text-center mb-4">KRITIK & SARAN</h2>

            <form action="{{ route('rw.kritik-saran') }}" method="POST" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 gap-4">
                    <!-- Tanggal -->
                    <div class="flex flex-col">
                        <label for="tanggal" class="text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="text" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}" 
                            class="border border-gray-300 rounded-md p-2 bg-gray-100 cursor-not-allowed" disabled>
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
                        <input type="number" id="kepuasan" name="kepuasan" min="0" max="100" value="{{ old('kepuasan', 60) }}"
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

                <div class="flex justify-between mt-6">
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded">
                        Confirm
                    </button>
                    <button type="reset" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>