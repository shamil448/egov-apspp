<!-- resources/views/education/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $educations->title }}</h1>

    <p><strong>Penulis:</strong> {{ $educations->author }}</p>
    <p><strong>Tipe:</strong> {{ ucfirst($educations->type) }}</p>
    <p><strong>Dipublikasikan pada:</strong> {{ $educations->published_at }}</p>

    <div class="mt-3">
        <h3>Konten:</h3>
        <p>{{ $educations->content }}</p>
    </div>

    @if($educations->image_path)
    <div class="mt-3">
        <h3>Gambar:</h3>
        <img src="{{ asset('storage/' . $educations->image_path) }}" alt="{{ $educations->title }}" class="img-fluid">
    </div>
    @endif

    @if($educations->video_path)
    <div class="mt-3">
        <h3>Video:</h3>
        <video controls class="w-100">
            <source src="{{ asset('storage/' . $educations->video_path) }}" type="video/mp4">
        </video>
    </div>
    @endif
</div>
@endsection

<!-- End of show.blade.php -->
