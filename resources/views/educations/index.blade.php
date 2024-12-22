@extends('layouts.app')

@section('content')
<div class="container mt-5" style="background: linear-gradient(135deg, #f9f9f9, #e9ecef); border-radius: 15px; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary fw-bold">📚 Daftar Edukasi</h1>
        <a href="{{ route('pemerintah.create') }}" class="btn btn-success shadow-sm px-4 py-2" style="font-weight: 600;">+ Tambah Edukasi</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 14px;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle" style="background: #ffffff; border-radius: 10px; overflow: hidden;">
            <thead style="background: #0d6efd; color: white;">
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
                    <tr style="transition: background-color 0.3s ease;">
                        <td style="text-align: center; font-weight: bold;">{{ $key + 1 }}</td>
                        <td>{{ $education->title }}</td>
                        <td>{{ $education->author }}</td>
                        <td style="text-align: center;">
                            <span class="badge bg-primary px-3 py-2" style="font-size: 12px;">{{ ucfirst($education->type) }}</span>
                        </td>
                        <td style="text-align: center;">
                            <a href="{{ route('education.show', $education->id) }}" class="btn btn-info btn-sm shadow-sm px-3 py-2" style="font-size: 12px; font-weight: 600;">Detail</a>
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
