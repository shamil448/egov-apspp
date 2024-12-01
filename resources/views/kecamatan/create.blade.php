@extends('layouts.app')

@section('content')
    <h1>Tambah Kecamatan</h1>
    <form action="{{ route('kecamatan.store') }}" method="POST">
        @csrf
        <label for="nama_kecamatan">Nama Kecamatan:</label>
        <input type="text" id="nama_kecamatan" name="nama_kecamatan" required>
        <button type="submit">Simpan</button>
    </form>
@endsection
