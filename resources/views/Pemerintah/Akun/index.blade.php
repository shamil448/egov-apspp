@include('components.PemerintahDashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="mt-16 flex justify-center">
            <div class="w-full lg:w-3/4 sm:w-full">
                <h3 class="text-2xl font-bold text-gray-800 text-center mt-10">Daftar Akun</h3>
                @if(session('success'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="overflow-x-auto mt-6 bg-white shadow-lg rounded-lg border border-gray-200 p-4">
                    <div class="mb-4 flex space-x-4">
                        <a href="{{ route('pemerintah.tambah-akun-pemerintah') }}" class="bg-green-600 text-white px-4 py-2 rounded">Tambah Pemerintah</a>
                        <a href="{{ route('pemerintah.tambah-akun-petugas') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah Petugas</a>
                        <a href="{{ route('pemerintah.tambah-akun-rw') }}" class="bg-yellow-600 text-white px-4 py-2 rounded">Tambah RW</a>
                        <form action="{{ route('pemerintah.index-akun') }}" method="GET" class="flex items-center space-x-2 ml-auto">
                            <label for="role" class="text-sm">Filter Role:</label>
                            <select name="role" id="role" class="border p-2 rounded">
                                <option value="">Semua</option>
                                <option value="Pemerintah" {{ request('role') == 'Pemerintah' ? 'selected' : '' }}>Pemerintah</option>
                                <option value="Petugas" {{ request('role') == 'Petugas' ? 'selected' : '' }}>Petugas</option>
                                <option value="RW" {{ request('role') == 'RW' ? 'selected' : '' }}>RW</option>
                            </select>
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Filter</button>
                        </form>
                    </div>
                    <table class="w-full table-auto border-collapse">
                        <thead class="bg-gray-300">
                            <tr>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Nama</th>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Alamat</th>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Nomor Telepon</th>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Email</th>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Role</th>
                                <th class="py-4 px-6 text-center text-gray-700 text-lg border-b border-gray-400">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            @foreach($users as $user)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $user->name }}</td>
                                    <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $user->alamat }}</td>
                                    <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $user->kontak }}</td>
                                    <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $user->email }}</td>
                                    <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $user->role }}</td>
                                    <td class="py-4 px-6 text-gray-600 space-x-2">
                                        <ul>
                                            <li>
                                                <a href="{{ route('pemerintah.update-akun', $user->id) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-4 rounded">Edit</a>
                                            </li>
                                            <br>
                                            <li>
                                                <form action="{{ route('pemerintah.delete-akun', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-1.5 rounded">Hapus</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@include('components.footer')
