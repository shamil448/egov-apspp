@include('components.PemerintahDashboard')

<main class="p-4 sm:ml-64 mt-10"> 
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="mt-16 flex justify-center">
            <div class="w-full lg:w-3/4 sm:w-full">
                <h3 class="text-2xl font-bold text-gray-800 text-center mt-10">Daftar RW Dibatam</h3>
                @if(session('success'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="overflow-x-auto mt-6 bg-white shadow-lg rounded-lg border border-gray-200 p-4">
                    <div class="mb-4">
                        <a href="{{ route('pemerintah.master_data.tambah-rw') }}" class="bg-green-600 text-white px-4 py-2 rounded">Tambah RW</a>
                    </div>
                    <table class="w-full table-auto border-collapse">
                        <thead class="bg-gray-300">
                            <tr>
                            <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Nama Rw</th>
                            <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Kecamatan</th>
                            <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Kelurahan</th>
                            <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Alamat Lengkap</th>
                            <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Lokasi</th>
                            <th class="py-4 px-6 text-left text-gray-700 text-lg border-b border-gray-400">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="table-body" style="border-collapse: collapse; empty-cells: hide;">
                            @php
                                $lastRw = null; // Variabel untuk menyimpan RW terakhir
                            @endphp
                            @foreach($rws as $rw)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    @if ($lastRw !== $rw->nama_rw)
                                        <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $rw->nama_rw }}</td>
                                        <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $rw->kelurahan->kecamatan->nama_kecamatan }}</td>
                                        <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $rw->kelurahan->kelurahan }}</td>
                                        @php
                                            $lastRw = $rw->nama_rw; // Update RW terakhir
                                        @endphp
                                    @else
                                        <td></td> <!-- Kosongkan sel jika Nama RW sama -->
                                        
                                        <td colspan="2"></td> <!-- Menyatukan kolom Kecamatan dan Kelurahan -->
                                    @endif
                                    <td class="py-4 px-6 text-gray-600 max-w-xs line-clamp-2">{{ $rw->alamat_lengkap }}</td>
                                    <td class="py-4 px-6 text-gray-600">
                                        <a href="{{ $rw->lokasi }}" 
                                           target="_blank" 
                                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">
                                            Lokasi
                                        </a>
                                    </td>
                                    <td class="py-4 px-6 text-gray-600 space-x-2">
                                        <ul>
                                            <li><a href="" class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-4 rounded">Edit</a></li>
                                            <br>
                                            <li>   
                                                <form action="" method="POST" class="inline-block">
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
