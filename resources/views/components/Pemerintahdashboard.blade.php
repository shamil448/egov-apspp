<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greenify Dashboard</title>
    <link rel="icon" type="image/png" href="/images/icon5.png" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 dark:bg-gray-900">

<!-- Navbar -->
<nav class="fixed top-0 z-50 w-full bg-green-500 text-white border-b border-gray-200 dark:bg-green-600 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <a href="{{ route('rw.dashboard') }}" class="flex ms-2">
                    <img src="/images/icon5.png" class="h-8 me-3" alt="Logo">
                    <span class="self-center text-xl font-semibold sm:text-2xl">Greenify</span>
                </a>
            </div>
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                
                <button type="button" class="flex text-sm bg-gray-800 rounded-full ms-3 md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                  <span class="sr-only">Open user menu</span>
                  <button type="button" class="flex text-sm bg-gray-800 rounded-full ms-3 md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 rounded-full">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                     </svg>
                    </button>
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                  <div class="px-4 py-3">
                  <span class="block text-sm text-gray-900 dark:text-white">{{ $user->name }}</span>
                  <span class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ $user->email }}</span>
                  </div>
                  <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                    <a href="{{ route('pemerintah.logout') }}" method="POST" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                    </li>
                  </ul>
                </div>
                <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button"
                    class="inline-flex items-center p-2 mt-2 ms-3 text-white bg-black rounded-lg sm:hidden hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-300 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>


<!-- Sidebar -->

<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 bg-green-300 border-r border-gray-200 transition-transform -translate-x-full sm:translate-x-0 dark:bg-green-700 dark:border-gray-700">
    <div class="h-full px-3 pb-4 overflow-y-auto">
        <ul class="space-y-2">
        <li>
        <a href="{{ route('pemerintah.dashboard') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 sm:w-20 sm:h-20">
        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
        </svg>
        <span class="ml-3 text-sm sm:text-base">Dashboard</span>
        </a>
        </li>
        <li>
    <a href="{{ route('pemerintah.index-akun') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 sm:w-20 sm:h-20">
            <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
        </svg>
        <span class="ml-3 text-sm sm:text-base">Akun</span>
    </a>
</li>
            <!-- Master Data Dropdown -->
<li>
    <button class="flex items-center w-full p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700" onclick="toggleDropdown('masterDataDropdown')">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3 7.5h4.5l2.25 3.375H15L17.25 7.5H21M3 7.5v9a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3v-9" />
</svg>
        <span class="ml-3 text-sm sm:text-base">Master Data</span>
        <svg class="ml-auto w-4 h-4 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>
    <ul id="masterDataDropdown" class="space-y-2 pl-8 hidden">
        <li>
            <a href="{{ route('pemerintah.master_data.index-kecamatan') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="ml-3 text-sm sm:text-base">Kecamatan</span>
            </a>
        </li>
        <li>
            <a href="{{ route('pemerintah.master_data.kelurahan.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="ml-3 text-sm sm:text-base">Kelurahan</span>
            </a>
        </li>
        <li>
            <a href="{{ route('pemerintah.master_data.index-rw') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="ml-3 text-sm sm:text-base">RW</span>
            </a>
        </li>
        <li>
            <a href="{{ route('pemerintah.master_data.index-petugas') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="ml-3 text-sm sm:text-base">Petugas</span>
            </a>
        </li>
    </ul>
</li>
            <li>
                <a href="{{ route('pemerintah.index-jadwal') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
                </svg>
                    <span class="ml-3 text-sm sm:text-base">Jadwal</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pemerintah.tambahedukasi') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                </svg>
                    <span class="ml-3 text-sm sm:text-base">Edukasi</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pemerintah.tpa_tps') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                </svg>
                    <span class="ml-3 text-sm sm:text-base">Lokasi TPA/TPS</span>
                </a>
            </li>
<!-- Laporan Dropdown -->
<li>
    <button class="flex items-center w-full p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700" onclick="toggleDropdown('laporanDropdown')">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
        </svg>
        <span class="ml-3 text-sm sm:text-base">Laporan</span>
        <svg class="ml-auto w-4 h-4 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>
    <ul id="laporanDropdown" class="space-y-2 pl-8 hidden">
        <li>
            <a href="{{ route('pemerintah.laporan.kritik-saran') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="ml-3 text-sm sm:text-base">Laporan Kritik & Saran</span>
            </a>
        </li>
        <li>
            <a href="{{ route('pemerintah.laporantugas') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="ml-3 text-sm sm:text-base">Laporan Pengangkutan</span>
            </a>
        </li>
        <li>
            <a href="{{ route('pemerintah.pengangkutan-darurat') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="ml-3 text-sm sm:text-base">Laporan Pengangkutan Darurat</span>
            </a>
        </li>
    </ul>
</li>
        </ul>
    </div>
</aside>

<script>
    // Untuk membuka dan menutup dropdown Master Data dan Laporan
    document.querySelectorAll('button').forEach(function(button) {
        button.addEventListener('click', function() {
            const submenu = this.nextElementSibling;
            if (submenu) {
                submenu.classList.toggle('hidden'); // Toggle visibility
            }
        });
    });
</script>
