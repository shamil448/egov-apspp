@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Tambah Edukasi</h4>
                </div>
                <div class="card-body">
                <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
                <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
                    <form action="{{ route('pemerintah.storeEdukasi') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" name="title" id="title" class="form-control" required placeholder="Masukkan judul edukasi">
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Konten</label>
                            <textarea name="content" id="content" rows="5" class="form-control" required placeholder="Tuliskan konten edukasi"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="author" class="form-label">Penulis</label>
                            <input type="text" name="author" id="author" class="form-control" required placeholder="Nama penulis">
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Tipe</label>
                            <select name="type" id="type" class="form-select" required>
                                <option value="article">Artikel</option>
                                <option value="video">Video</option>
                                <option value="course">Kursus</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar (opsional)</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label for="video" class="form-label">Video (opsional)</label>
                            <input type="file" name="video" id="video" class="form-control" accept="video/*">
                        </div>

                        <button type="submit" class="btn btn-success w-100">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
