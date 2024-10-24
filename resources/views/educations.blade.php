@include('components.home')

<div class="container mx-auto my-12 px-4 md:px-12">
    <h2 class="text-3xl font-bold text-center text-gray-900 dark:text-white mb-10">Government Educations</h2>

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach($educations as $education)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $education->title }}</h3>
                <p class="text-gray-700 dark:text-gray-300 mt-4">{{ Str::limit($education->description, 100) }}</p>
                <a href="{{ route('education.show', $education->id) }}" class="text-blue-600 dark:text-blue-400 mt-4 block">Read More</a>
            </div>
        @endforeach
    </div>
</div>

@include('components.footer') <!-- Jika ada footer -->
