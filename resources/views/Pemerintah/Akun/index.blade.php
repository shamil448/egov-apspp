@include('components.PemerintahDashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-center mb-4">DAFTAR AKUN</h2>

        @if(session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4 flex space-x-4">
            <a href="{{ route('pemerintah.tambah-akun-pemerintah') }}" class="bg-green-600 text-white px-4 py-2 rounded">Tambah Pemerintah</a>
            <a href="{{ route('pemerintah.tambah-akun-petugas') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah Petugas</a>
            <a href="{{ route('pemerintah.tambah-akun-rw') }}" class="bg-yellow-600 text-white px-4 py-2 rounded">Tambah RW</a>

            <form action="{{ route('pemerintah.index-akun') }}" method="GET" class="flex items-center space-x-2 ml-auto">
                <label for="role" class="text-sm">Filter berdasarkan Role:</label>
                <select name="role" id="role" class="border p-2 rounded">
                    <option value="">Semua</option>
                    <option value="Pemerintah" {{ request('role') == 'Pemerintah' ? 'selected' : '' }}>Pemerintah</option>
                    <option value="Petugas" {{ request('role') == 'Petugas' ? 'selected' : '' }}>Petugas</option>
                    <option value="RW" {{ request('role') == 'RW' ? 'selected' : '' }}>RW</option>
                </select>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Filter</button>
            </form>
        </div>

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Alamat</th>
                    <th scope="col" class="px-6 py-3">Nomor Telepon</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Role</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $user->name }}</td>
                        <td class="px-6 py-4">{{ $user->alamat }}</td>
                        <td class="px-6 py-4">{{ $user->kontak }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4">{{ $user->role }}</td>
                        <td class="px-6 py-4 space-x-2">
                            <a href="{{ route('pemerintah.update-akun', $user->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <!-- Button Delete with confirmation -->
                            <form action="{{ route('pemerintah.delete-akun', $user->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@include('components.footer')
