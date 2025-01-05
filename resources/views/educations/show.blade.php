@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $educations->title }}</h1>

    <!-- Link ke file CSS -->
    <link rel="stylesheet" href="{{ asset('css/education.css') }}">

    <!-- Gambar Artikel (Jika ada) -->
    @if($educations->image_path)
    <div class="mt-3">
        <h3></h3>
        <img src="{{ asset('storage/' . $educations->image_path) }}" alt="{{ $educations->title }}" class="img-fluid">
    </div>
    @endif

    <!-- Informasi Penulis dan Tipe -->
    <div class="row section">
        <div class="col-md-6">
            <p><strong>Penulis:</strong> {{ $educations->author }}</p>
        </div>
        <div class="col-md-6">
            <p><strong>Tipe:</strong> {{ ucfirst($educations->type) }}</p>
        </div>
    </div>

    <!-- Tanggal publikasi -->

    <!-- Konten Artikel -->
    <div class="mt-3 section">
        <h3></h3>
        <p>{{ $educations->content }}</p>
    </div>

    <!-- Tabel Artikel -->
    <div class="section">
        <table>
            <tr>
            </tr>
            <tr>
            </tr>
        </table>
    </div>

    <!-- Video Artikel (Jika ada) -->
    @if($educations->video_path)
    <div class="mt-3">
        <h3></h3>
        <video controls class="w-100">
            <source src="{{ asset('storage/' . $educations->video_path) }}" type="video/mp4">
        </video>
    </div>
    @endif
</div>
@endsection
