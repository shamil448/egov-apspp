@include('components.home')

<main class="p-4 mt-10">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold text-center mb-6">Daftar Edukasi</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($educations as $education)
                <div class="border border-gray-300 rounded-lg shadow-md p-4">
                    <h2 class="text-xl font-semibold mb-2">{{ $education->title }}</h2>
                    <p class="text-sm text-gray-600 mb-2">Kategori: {{ ucfirst($education->category) }}</p>
                    <p class="text-sm text-gray-600 mb-2">Subjek: {{ $education->subject }}</p>
                    <p class="text-sm text-gray-600 mb-2">Penulis: {{ $education->author }}</p>
                    <p class="text-sm text-gray-600 mb-2">Jenis: {{ ucfirst($education->type) }}</p>
                    <p class="text-sm text-gray-600 mb-2">
                        Publikasi: {{ $education->published_at ? $education->published_at->format('d M Y H:i') : 'Belum Dipublikasikan' }}
                    </p>
                    <p class="text-gray-800 mb-4 truncate">{{ Str::limit($education->content, 100, '...') }}</p>
                    <a href="{{ route('education.show', $education->id) }}" class="text-blue-500 hover:underline">
                        Baca Selengkapnya
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</main>

@include('components.footer')
