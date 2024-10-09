@include('components.dashboard')

<!-- Banner Section -->
<div class="flex justify-center mb-1">
    <img src="/images/BannerRW.png" alt="Banner RW" class="w-full h-auto rounded-lg">
</div>

<!-- Main Content -->
<div class="p-1 sm:ml-64">
    <div class="p-1 mt-1">
        <!-- Responsive Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            <!-- Lokasi Section -->
            <div class="flex flex-col items-center justify-center h-32 bg-yellow-100 rounded-lg shadow-md dark:bg-gray-700">
                <img src="/images/Lokasi.png" class="h-20 md:h-24" alt="Lokasi Icon">
                <span class="mt-2 text-base md:text-lg font-medium text-gray-900 dark:text-white">Lokasi</span>
            </div>
            <!-- Jadwal Section -->
            <div class="flex flex-col items-center justify-center h-32 bg-yellow-100 rounded-lg shadow-md dark:bg-gray-700">
                <img src="/images/Jadwal.png" class="h-20 md:h-24" alt="Jadwal Icon">
                <span class="mt-2 text-base md:text-lg font-medium text-gray-900 dark:text-white">Jadwal</span>
            </div>
            <!-- Pesan Section -->
            <div class="flex flex-col items-center justify-center h-32 bg-yellow-100 rounded-lg shadow-md dark:bg-gray-700">
                <img src="/images/Pesan.png" class="h-20 md:h-24" alt="Pesan Icon">
                <span class="mt-2 text-base md:text-lg font-medium text-gray-900 dark:text-white">Pesan</span>
            </div>
            <!-- Saran Section -->
            <div class="flex flex-col items-center justify-center h-32 bg-yellow-100 rounded-lg shadow-md dark:bg-gray-700">
                <img src="/images/Saran.png" class="h-20 md:h-24" alt="Saran Icon">
                <span class="mt-2 text-base md:text-lg font-medium text-gray-900 dark:text-white">Kritik & Saran</span>
            </div>
        </div>
    </div>
</div>

@include('components.footer')
