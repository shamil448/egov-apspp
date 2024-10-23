<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greenify Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 dark:bg-gray-900">

<!-- Navbar -->
<nav class="fixed top-0 z-50 w-full bg-green-500 text-white border-b border-gray-200 dark:bg-green-600 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <a href="{{ route('pemerintah.dashboard') }}" class="flex ms-2">
                    <img src="/images/gaia.png" class="h-8 me-3" alt="Logo">
                    <span class="self-center text-xl font-semibold sm:text-2xl">Greenify</span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3 relative">
                    <!-- User Image as Dropdown Button -->
                    <img id="dropdownDefaultButton" src="/images/woman.png" class="w-8 h-8 rounded-full cursor-pointer" alt="User photo">

                    <!-- Dropdown menu -->
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 absolute right-0 mt-2">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="{{ route('pemerintah.dashboard') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                            </li>
                            <li>
                                <a href="{{ route('pemerintah.logout') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Sidebar -->
<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 bg-green-300 border-r border-gray-200 transition-transform -translate-x-full sm:translate-x-0 dark:bg-green-700 dark:border-gray-700">
    <div class="h-full px-3 pb-4 overflow-y-auto">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('pemerintah.dashboard') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="/images/admin1.png" class="w-12 h-12 sm:w-20 sm:h-20" alt="Dashboard Icon">
                    <span class="ml-3 text-sm sm:text-base">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pemerintah.laporanharian') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="/images/admin2.png" class="w-12 h-12 sm:w-20 sm:h-20" alt="Kirim Lokasi Icon">
                    <span class="ml-3 text-sm sm:text-base">Laporan Harian</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pemerintah.tambahakun') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="/images/admin6.png" class="w-12 h-12 sm:w-20 sm:h-20" alt="Kirim Lokasi Icon">
                    <span class="ml-3 text-sm sm:text-base">Tambah Akun</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pemerintah.tambahedukasi') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="/images/admin3.png" class="w-12 h-12 sm:w-20 sm:h-20" alt="Jadwal Icon">
                    <span class="ml-3 text-sm sm:text-base">Tambah Edukasi</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pemerintah.tpatps') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="/images/admin4.png" class="w-12 h-12 sm:w-20 sm:h-20" alt="Kritik & Saran Icon">
                    <span class="ml-3 text-sm sm:text-base">Pengawasan TPA/TPS</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pemerintah.pelaporan') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="/images/admin5.png" class="w-12 h-12 sm:w-20 sm:h-20" alt="Pesan Masuk Icon">
                    <span class="flex-1 ml-3 text-sm sm:text-base">Pelaporan Masyarakat</span>
                    <span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-xs font-medium text-blue-800 bg-blue-100 rounded-full"></span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<main class="p-4 sm:ml-64 mt-20">
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script>
    // Menangani logika untuk membuka/menutup dropdown
    document.getElementById('dropdownDefaultButton').onclick = function () {
        var dropdown = document.getElementById('dropdown');
        dropdown.classList.toggle('hidden'); // Toggle class hidden
    };

    // Menutup dropdown jika pengguna mengklik di luar dropdown
    window.onclick = function(event) {
        if (!event.target.matches('#dropdownDefaultButton') && !event.target.closest('#dropdown')) {
            var dropdown = document.getElementById('dropdown');
            if (!dropdown.classList.contains('hidden')) {
                dropdown.classList.add('hidden'); // Sembunyikan dropdown
            }
        }
    };
</script>
</body>
</html>