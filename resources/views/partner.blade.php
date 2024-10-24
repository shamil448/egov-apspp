@include('components.home')

<div class="container mx-auto my-12 px-4 md:px-12">
    <h2 class="text-3xl font-bold text-center text-gray-900 dark:text-white mb-10">Our Partners</h2>
    
    <div class="flex flex-col md:flex-row items-center justify-around">
        <!-- Partner 1 -->
        <div class="md:w-1/3 w-full flex flex-col items-center mb-10 md:mb-0">
            <img src="{{ asset('images/partner1.png') }}" alt="Partner 1" class="rounded-lg shadow-lg object-cover w-full h-64 md:w-2/3">
            <p class="text-xl font-semibold text-gray-900 dark:text-white mt-4">Pemerintah Kota Batam</p>
        </div>

        <!-- Partner 2 -->
        <div class="md:w-1/3 w-full flex flex-col items-center">
            <img src="{{ asset('images/partner1.png') }}" alt="Partner 2" class="rounded-lg shadow-lg object-cover w-full h-64 md:w-2/3">
            <p class="text-xl font-semibold text-gray-900 dark:text-white mt-4">Dinas Lingkungan dan Kehutanan</p>
        </div>
    </div>
</div>

@include('components.footer') <!-- Jika ada footer -->
