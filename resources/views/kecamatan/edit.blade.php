@extends('layouts.app')

@section('content')
    <h1>Edit Kecamatan</h1>
    <form action="{{ route('kecamatan.update', $kecamatan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nama_kecamatan">Nama Kecamatan:</label>
        <input type="text" id="nama_kecamatan" name="nama_kecamatan" value="{{ $kecamatan->nama_kecamatan }}" required>
        <button type="submit">Perbarui</button>
    </form>
@endsection
