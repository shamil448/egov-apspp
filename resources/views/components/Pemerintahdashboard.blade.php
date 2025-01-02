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
                <button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification" class="relative inline-flex items-center text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none dark:hover:text-white dark:text-gray-400" type="button">
                <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 14 20">
                <path d="M12.133 10.632v-1.8A5.406 5.406 0 0 0 7.979 3.57.946.946 0 0 0 8 3.464V1.1a1 1 0 0 0-2 0v2.364a.946.946 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C1.867 13.018 0 13.614 0 14.807 0 15.4 0 16 .538 16h12.924C14 16 14 15.4 14 14.807c0-1.193-1.867-1.789-1.867-4.175ZM3.823 17a3.453 3.453 0 0 0 6.354 0H3.823Z"/>
                </svg>

                <div class="absolute block w-3 h-3 bg-red-500 border-2 border-white rounded-full -top-0.5 start-2.5 dark:border-gray-900"></div>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownNotification" class="z-20 hidden w-full max-w-sm bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-800 dark:divide-gray-700" aria-labelledby="dropdownNotificationButton">
                    <div class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50 dark:bg-gray-800 dark:text-white">
                        Notifications
                    </div>
                    <div class="divide-y divide-gray-100 dark:divide-gray-700">
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <div class="flex-shrink-0">
                            <img class="rounded-full w-11 h-11" src="/docs/images/people/profile-picture-5.jpg" alt="Robert image">
                            <div class="absolute flex items-center justify-center w-5 h-5 ms-6 -mt-5 bg-purple-500 border border-white rounded-full dark:border-gray-800">
                            <svg class="w-2 h-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                                <path d="M11 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm8.585 1.189a.994.994 0 0 0-.9-.138l-2.965.983a1 1 0 0 0-.685.949v8a1 1 0 0 0 .675.946l2.965 1.02a1.013 1.013 0 0 0 1.032-.242A1 1 0 0 0 20 12V2a1 1 0 0 0-.415-.811Z"/>
                            </svg>
                            </div>
                        </div>
                        <div class="w-full ps-3">
                            <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Robert Brown</span> posted a new video: Glassmorphism - learn how to implement the new design trend.</div>
                            <div class="text-xs text-blue-600 dark:text-blue-500">3 hours ago</div>
                        </div>
                        </a>
                    </div>
                </div>
                <button type="button" class="flex text-sm bg-gray-800 rounded-full ms-3 md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                  <span class="sr-only">Open user menu</span>
                  <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
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
                    <img src="/images/admin1.png" class="w-12 h-12 sm:w-20 sm:h-20" alt="Dashboard Icon">
                    <span class="ml-3 text-sm sm:text-base">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pemerintah.index-akun') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="/images/admin6.png" class="w-12 h-12 sm:w-20 sm:h-20" alt="Kirim Lokasi Icon">
                    <span class="ml-3 text-sm sm:text-base">Akun</span>
                </a>
            </li>
            <!-- Master Data Dropdown -->
<li>
    <button class="flex items-center w-full p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700" onclick="toggleDropdown('masterDataDropdown')">
        <img src="/images/admin6.png" class="w-12 h-12 sm:w-20 sm:h-20" alt="Master Data Icon">
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
                    <img src="/images/admin6.png" class="w-12 h-12 sm:w-20 sm:h-20" alt="Kirim Lokasi Icon">
                    <span class="ml-3 text-sm sm:text-base">Jadwal</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pemerintah.tambahedukasi') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="/images/admin3.png" class="w-12 h-12 sm:w-20 sm:h-20" alt="Kirim Lokasi Icon">
                    <span class="ml-3 text-sm sm:text-base">Edukasi</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pemerintah.tpa_tps') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="/images/admin4.png" class="w-12 h-12 sm:w-20 sm:h-20" alt="Kirim Lokasi Icon">
                    <span class="ml-3 text-sm sm:text-base">Pengawasan TPA/TPS</span>
                </a>
            </li>
<!-- Laporan Dropdown -->
<li>
    <button class="flex items-center w-full p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700" onclick="toggleDropdown('laporanDropdown')">
        <img src="/images/admin5.png" class="w-12 h-12 sm:w-20 sm:h-20" alt="Laporan Icon">
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
            <a href="{{ route('pemerintah.laporanharian') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="ml-3 text-sm sm:text-base">Laporan Harian</span>
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
