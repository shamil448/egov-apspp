@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Kecamatan</h1>
        <form action="{{ route('kecamatan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_kecamatan" class="form-label">Nama Kecamatan</label>
                <input type="text" class="form-control @error('nama_kecamatan') is-invalid @enderror" id="nama_kecamatan" name="nama_kecamatan" value="{{ old('nama_kecamatan') }}">
                @error('nama_kecamatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('kecamatan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
