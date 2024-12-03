<!-- resources/views/kelurahan/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Kelurahan</h1>

        <form action="{{ route('kelurahan.update', $kelurahan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="kecamatan_id" class="form-label">Kecamatan</label>
                <select name="kecamatan_id" id="kecamatan_id" class="form-control @error('kecamatan_id') is-invalid @enderror">
                    <option value="">Pilih Kecamatan</option>
                    @foreach($kecamatan as $kec)
                        <option value="{{ $kec->id }}" {{ $kelurahan->kecamatan_id == $kec->id ? 'selected' : '' }}>
                            {{ $kec->kecamatan }}
                        </option>
                    @endforeach
                </select>
                @error('kecamatan_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kelurahan" class="form-label">Nama Kelurahan</label>
                <input type="text" class="form-control @error('kelurahan') is-invalid @enderror" id="kelurahan" name="kelurahan" value="{{ old('kelurahan', $kelurahan->kelurahan) }}">
                @error('kelurahan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
