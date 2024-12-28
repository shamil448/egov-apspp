@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Kelurahan</h1>

    <!-- Form untuk menambahkan kelurahan -->
    <form action="{{ route('kelurahan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kelurahan" class="form-label">Nama Kelurahan</label>
            <input type="text" class="form-control @error('kelurahan') is-invalid @enderror"
                   id="kelurahan" name="kelurahan" value="{{ old('kelurahan') }}">
            @error('kelurahan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kecamatan_id" class="form-label">Pilih Kecamatan</label>
            <select class="form-control @error('kecamatan_id') is-invalid @enderror"
                    id="kecamatan_id" name="kecamatan_id">
                <option value="">-- Pilih Kecamatan --</option>
                @foreach($kecamatan as $item)
                    <option value="{{ $item->id }}"
                        {{ old('kecamatan_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->nama_kecamatan }}
                    </option>
                @endforeach
            </select>
            @error('kecamatan_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kelurahan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
