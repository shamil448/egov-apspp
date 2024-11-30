@include('components.PemerintahDashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-center mb-4">UPDATE AKUN</h2>

        <form action="{{ route('pemerintah.update-akun', $user->id) }}" method="POST" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="mt-1 block w-full" value="{{ $user->name }}" required>
                </div>
                <div>
                    <label for="alamat_lengkap" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                    <input type="text" id="alamat_lengkap" name="alamat_lengkap" class="mt-1 block w-full" value="{{ $user->alamat }}" required>
                </div>
                <div>
                    <label for="nomor_kontak" class="block text-sm font-medium text-gray-700">Nomor Kontak</label>
                    <input type="text" id="nomor_kontak" name="nomor_kontak" class="mt-1 block w-full" value="{{ $user->kontak }}" required>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="mt-1 block w-full" value="{{ $user->email }}" required>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password (kosongkan jika tidak ingin mengubah)</label>
                    <input type="password" id="password" name="password" class="mt-1 block w-full">
                </div>
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select id="role" name="role" class="mt-1 block w-full" required>
                        <option value="Pemerintah" {{ $user->role == 'Pemerintah' ? 'selected' : '' }}>Pemerintah</option>
                        <option value="Petugas" {{ $user->role == 'Petugas' ? 'selected' : '' }}>Petugas</option>
                        <option value="RW" {{ $user->role == 'RW' ? 'selected' : '' }}>RW</option>
                    </select>
                </div>
            </div>
            <div class="flex space-x-4 mt-6">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                <a href="{{ route('pemerintah.index-akun') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
            </div>
        </form>
    </div>
</main>
