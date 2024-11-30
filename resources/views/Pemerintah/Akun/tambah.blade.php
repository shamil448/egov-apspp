@include('components.PemerintahDashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-center mb-4">TAMBAH AKUN</h2>

        @if($errors->any())
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pemerintah.tambah-akun.submit') }}" method="POST" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="mt-1 block w-full" required>
                </div>
                <div>
                    <label for="alamat_lengkap" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                    <input type="text" id="alamat_lengkap" name="alamat_lengkap" class="mt-1 block w-full" required>
                </div>
                <div>
                    <label for="nomor_kontak" class="block text-sm font-medium text-gray-700">Nomor Kontak</label>
                    <input type="text" id="nomor_kontak" name="nomor_kontak" class="mt-1 block w-full" required>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="mt-1 block w-full" required>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="mt-1 block w-full" required>
                </div>
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select id="role" name="role" class="mt-1 block w-full" required>
                        <option value="Pemerintah">Pemerintah</option>
                        <option value="Petugas">Petugas</option>
                        <option value="RW">RW</option>
                    </select>
                </div>
            </div>
            <div class="flex space-x-4 mt-6">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah</button>
                <a href="{{ route('pemerintah.index-akun') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
            </div>
        </form>
    </div>
</main>
