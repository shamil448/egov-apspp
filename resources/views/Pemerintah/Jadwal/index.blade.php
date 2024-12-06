@include('components.pemerintahdashboard')
<main class="p-4 sm:ml-64 mt-10">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
       <h2 class="text-2xl font-bold text-center mb-4">DAFTAR JADWAL PENGANGKUTAN</h2>

       @if(session('success'))
           <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
               {{ session('success') }}
           </div>
       @endif

       <div class="mb-4">
           <a href="{{ route('pemerintah.index-jadwal') }}" class="bg-green-600 text-white px-4 py-2 rounded">Tambah Jadwal</a>
       </div>

       <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
           <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
               <tr>
                   <th scope="col" class="px-6 py-3">Hari</th>
                   <th scope="col" class="px-6 py-3">Rw</th>
                   <th scope="col" class="px-6 py-3">Petugas</th>
                   <th scope="col" class="px-6 py-3">Alamat Lengkap</th>
                   <th scope="col" class="px-6 py-3">Lokasi</th>
                   <th scope="col" class="px-6 py-3">Aksi</th>
               </tr>
           </thead>
           <tbody>
                   <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                       <td class="px-6 py-4">Hari Ke 1</td>
                       <td class="px-6 py-4">
                        <ul class="align-list">
                            <li><span class="label">RW:</span>01</li>
                            <li><span class="label">KECAMATAN:</span>BATU AJI</li>
                            <li><span class="label">KELURAHAN:</span>SUNGAI LANGKAI</li>
                        </ul>
                       </td>
                       <td class="px-6 py-4">PETUGAS 1</td>
                       <td class="px-6 py-4">
                        <ul class="align-list">
                            <li><span class="label">Perumahan Puri Agung</li>
                            <li><span class="label">Perumahan Buana mass</li>
                        </ul>
                       </td>
                       <td class="px-6 py-4"><button type="submit" class="text-red-600 hover:underline">Lihat Lokasi</button></td>
                       <td class="px-6 py-4 space-x-2">
                           <a href="" class="text-blue-600 hover:underline">Edit</a>
                           <form action="" method="POST" class="inline">
                               <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                           </form>
                       </td>
                   </tr>
           </tbody>
       </table>
   </div>
</main>

<br>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
@include('components.footer')
