@include('components.home')

<div class="container mx-auto my-12 px-4 md:px-12">
    <div class="flex flex-col md:flex-row items-stretch">
        <!-- Bagian Gambar di Samping Kiri -->
        <div class="md:w-1/2 w-full flex justify-center items-stretch h-auto md:h-[500px]">
            <img src="{{ asset('images/about-us.jpeg') }}" alt="About Us" class="rounded-lg shadow-lg object-cover w-full md:h-full h-auto">
        </div>

        <!-- Bagian Teks di Samping Kanan -->
        <div class="md:w-1/2 w-full md:pl-10 mt-6 md:mt-0 flex justify-center items-stretch">
            <!-- Bagian latar belakang hijau -->
            <div class="bg-green-500 p-6 rounded-lg shadow-lg w-full flex items-center">
                <div>
                    <h2 class="text-3xl font-bold text-white mb-4">Apa Itu Greenify?</h2>
                    <p class="text-2xl text-white leading-relaxed">
                        Greenify adalah aplikasi situs web yang terlibat dalam menjadikan planet kita tempat yang lebih baik untuk ditinggali, dengan membuat pengguna membantu dalam proses pengangkutan sampah dan lain-lain. Sebagai imbalannya, pengguna merasa berpengaruh, mereka berpartisipasi dalam melestarikan planet kita.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@include('components.footer')
