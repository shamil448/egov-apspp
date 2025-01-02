@extends('layouts.app')

@section('content')
    <!-- Meta Tags and Navbar -->
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
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        </div>

        <!-- Filter Dropdown -->
        <div>
            <form action="{{ route('educations.index') }}" method="GET" class="d-flex">
                <select name="type" class="form-select me-2" onchange="this.form.submit()">
                    <option value="" {{ request('type') == '' ? 'selected' : '' }}>Semua</option>
                    <option value="article" {{ request('type') == 'article' ? 'selected' : '' }}>Artikel</option>
                    <option value="course" {{ request('type') == 'course' ? 'selected' : '' }}>Kursus</option>
                    <option value="video" {{ request('type') == 'video' ? 'selected' : '' }}>Video</option>
                </select>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead>
                <tr>
                    <th scope="col" style="width: 5%; text-align: center;">No</th>
                    <th scope="col" style="width: 35%;">Judul</th>
                    <th scope="col" style="width: 30%;">Penulis</th>
                    <th scope="col" style="width: 15%; text-align: center;">Tipe</th>
                    <th scope="col" style="width: 15%; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($educations as $key => $education)
                    <tr>
                        <td style="text-align: center; font-weight: bold;">{{ $key + 1 }}</td>
                        <td>{{ $education->title }}</td>
                        <td>{{ $education->author }}</td>
                        <td style="text-align: center;">
                            <span class="badge bg-primary px-3 py-2">{{ ucfirst($education->type) }}</span>
                        </td>
                        <td style="text-align: center;">
                            <a href="{{ route('education.show', $education->id) }}" class="btn btn-info btn-sm shadow-sm px-3 py-2">Baca</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted" style="padding: 20px; font-style: italic;">Tidak ada data edukasi tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    </body>
@endsection

