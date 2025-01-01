@include('components.PemerintahDashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="mt-16 flex justify-center">
            <div class="w-full lg:w-3/4 sm:w-full">
                <h3 class="text-2xl font-bold text-gray-800 text-center mt-10">Daftar TPA/TPS</h3>
                @if(session('success'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="overflow-x-auto mt-6 bg-white shadow-lg rounded-lg border border-gray-200 p-4">
                    <div class="mb-4">
                        <a href="{{ route('pemerintah.tambah-tpa-tps') }}" class="bg-green-600 text-white px-4 py-2 rounded">Tambah TPA/TPS</a>
                    </div>
                    <table class="w-full table-auto border-collapse">
                        <thead class="bg-gray-300">
                            <tr>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Kategori</th>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Alamat Lengkap</th>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Lokasi</th>
                                <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="table-body" style="border-collapse: collapse; empty-cells: hide;">
                            @foreach($TpaTps as $item)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $item->kategori }}</td>
                                    <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $item->alamat_lengkap }}</td>
                                    <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">
                                        <a href="{{ $item->lokasi }}" target="_blank" class="text-blue-500 hover:underline">Lihat Lokasi</a>
                                    </td>
                                    <td class="py-4 px-6 text-gray-600 space-x-2">
                                        <ul>
                                            <li>
                                                <a href="{{ route('pemerintah.edit-tpa-tps', $item->id) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-4 rounded">Edit</a>
                                            </li>
                                            <br>
                                            <li>
                                                <form action="{{ route('pemerintah.delete-tpa-tps', $item->id) }}" method="POST" class="inline-block">
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