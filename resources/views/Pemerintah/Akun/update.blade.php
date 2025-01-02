@include('components.PemerintahDashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-center mb-4">EDIT AKUN {{ strtoupper($user->role) }}</h2>

        @if($errors->any())
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pemerintah.update-akun', $user->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-1 gap-6">
        <div>
            <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ $user->name }}" class="mt-1 block w-full" required>
        </div>
        <div>
            <label for="alamat_lengkap" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
            <input type="text" id="alamat_lengkap" name="alamat_lengkap" value="{{ $user->alamat }}" class="mt-1 block w-full" required>
        </div>
        <div>
            <label for="nomor_kontak" class="block text-sm font-medium text-gray-700">Nomor Kontak</label>
            <input type="text" id="nomor_kontak" name="nomor_kontak" value="{{ $user->kontak }}" class="mt-1 block w-full" required>
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" class="mt-1 block w-full" required>
        </div>
        <div>
            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
            <select id="role" name="role" class="mt-1 block w-full" onchange="toggleRoleFields()" required>
                <option value="Pemerintah" {{ $user->role == 'Pemerintah' ? 'selected' : '' }}>Pemerintah</option>
                <option value="Petugas" {{ $user->role == 'Petugas' ? 'selected' : '' }}>Petugas</option>
                <option value="RW" {{ $user->role == 'RW' ? 'selected' : '' }}>RW</option>
            </select>
        </div>
        <div id="petugas-field" style="display: none;">
            <label for="petugas_pengangkutan_id" class="block text-sm font-medium text-gray-700">Petugas Pengangkutan</label>
            <select id="petugas_pengangkutan_id" name="petugas_pengangkutan_id" class="mt-1 block w-full">
                @foreach($petugas as $petugasItem)
                    <option value="{{ $petugasItem->id }}" {{ $user->petugas_pengangkutan_id == $petugasItem->id ? 'selected' : '' }}>
                        {{ $petugasItem->nama_petugas }}
                    </option>
                @endforeach
            </select>
        </div>
        <div id="rw-field" style="display: none;">
            <label for="rw_id" class="block text-sm font-medium text-gray-700">RW</label>
            <select id="rw_id" name="rw_id" class="mt-1 block w-full">
                @foreach($rws as $rw)
                    <option value="{{ $rw->id }}" {{ $user->rw_id == $rw->id ? 'selected' : '' }}>
                        {{ $rw->nama_rw }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="flex space-x-4 mt-6">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('pemerintah.index-akun') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
    </div>
</form>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@include('components.footer')

<script>
    function toggleRoleFields() {
        const role = document.getElementById('role').value;
        const petugasField = document.getElementById('petugas-field');
        const rwField = document.getElementById('rw-field');

        // Show/Hide fields based on the selected role
        if (role === 'Petugas') {
            petugasField.style.display = 'block';
            rwField.style.display = 'none';
        } else if (role === 'RW') {
            petugasField.style.display = 'none';
            rwField.style.display = 'block';
        } else {
            petugasField.style.display = 'none';
            rwField.style.display = 'none';
        }
    }

    // Initialize fields based on the current role
    document.addEventListener('DOMContentLoaded', () => {
        toggleRoleFields();
    });
</script>