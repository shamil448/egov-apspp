<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greenify Dashboard</title>
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
                    <img src="/images/gaia.png" class="h-8 me-3" alt="Logo">
                    <span class="self-center text-xl font-semibold sm:text-2xl">Greenify</span>
                </a>
            </div>
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                  <span class="sr-only">Open user menu</span>
                  <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                  <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900 dark:text-white">Bonnie Green</span>
                    <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">name@flowbite.com</span>
                  </div>
                  <ul class="py-2" aria-labelledby="user-menu-button"> 
                    <li>
                      <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
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
                <a href="{{ route('rw.dashboard') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="/images/1.jpeg" class="w-12 h-12 sm:w-20 sm:h-20" alt="Dashboard Icon">
                    <span class="ml-3 text-sm sm:text-base">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('rw.lokasi') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="/images/2.jpeg" class="w-12 h-12 sm:w-20 sm:h-20" alt="Kirim Lokasi Icon">
                    <span class="ml-3 text-sm sm:text-base">Kirim Lokasi</span>
                </a>
            </li>
            <li>
                <a href="{{ route('rw.jadwal') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="/images/3.jpeg" class="w-12 h-12 sm:w-20 sm:h-20" alt="Jadwal Icon">
                    <span class="ml-3 text-sm sm:text-base">Jadwal</span>
                </a>
            </li>
            <li>
                <a href="{{ route('rw.kritik-saran') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="/images/4.jpeg" class="w-12 h-12 sm:w-20 sm:h-20" alt="Kritik & Saran Icon">
                    <span class="ml-3 text-sm sm:text-base">Kritik & Saran</span>
                </a>
            </li>
            <li>
                <a href="{{ route('rw.inbox') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="/images/5.jpeg" class="w-12 h-12 sm:w-20 sm:h-20" alt="Pesan Masuk Icon">
                    <span class="flex-1 ml-3 text-sm sm:text-base">Pesan Masuk</span>
                    <span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-xs font-medium text-blue-800 bg-blue-100 rounded-full">3</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<main class="p-4 sm:ml-64 mt-20">

</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>