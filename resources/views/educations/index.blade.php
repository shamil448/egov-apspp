@extends('layouts.app')

@section('content')
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
</div>
@endsection
