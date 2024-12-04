<!-- resources/views/kelurahan/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Kelurahan</h1>

        <table class="table">
            <tr>
                <th>Kelurahan</th>
                <td>{{ $kelurahan->kelurahan }}</td>
            </tr>
            <tr>
                <th>Kecamatan</th>
                <td>{{ $kelurahan->kecamatan->kecamatan }}</td>
            </tr>
        </table>

        <a href="{{ route('kelurahan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
