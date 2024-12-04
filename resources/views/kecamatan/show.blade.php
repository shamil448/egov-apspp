@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Kecamatan</h1>
    <p><strong>Nama Kecamatan:</strong> {{ $kecamatan->nama_kecamatan }}</p>

    <a href="{{ route('kecamatan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
