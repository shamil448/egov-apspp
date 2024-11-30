@include('components.PemerintahDashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-center mb-4">DAFTAR EDUKASI</h2>
        <a href="{{ route('pemerintah.create-edukasi') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
            Tambah Edukasi
        </a>

        <!-- Tabel daftar edukasi -->
        <table class="min-w-full table-auto mt-6">
            <thead>
                <tr>
                    <th class="px-4 py-2">Judul</th>
                    <th class="px-4 py-2">Kategori</th>
                    <th class="px-4 py-2">Subjek</th>
                    <th class="px-4 py-2">Penulis</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($educations as $education)
                    <tr>
                        <td class="border px-4 py-2">{{ $education->title }}</td>
                        <td class="border px-4 py-2">{{ $education->category }}</td>
                        <td class="border px-4 py-2">{{ $education->subject }}</td>
                        <td class="border px-4 py-2">{{ $education->author }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('pemerintah.show-edukasi', $education->id) }}" class="text-blue-600 hover:text-blue-900">Lihat</a>
                            <a href="{{ route('pemerintah.edit-edukasi', $education->id) }}" class="ml-2 text-yellow-600 hover:text-yellow-800">Edit</a>
                            <form action="{{ route('pemerintah.destroy-edukasi', $education->id) }}" method="POST" class="inline-block ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

@include('components.footer')
