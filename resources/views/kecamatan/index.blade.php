@extends('layouts.app')

@section('content')
    <h1>Daftar Kecamatan</h1>
    <a href="{{ route('kecamatan.create') }}">Tambah Kecamatan</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kecamatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kecamatans as $kecamatan)
                <tr>
                    <td>{{ $kecamatan->id }}</td>
                    <td>{{ $kecamatan->nama_kecamatan }}</td>
                    <td>
                        <a href="{{ route('kecamatan.edit', $kecamatan->id) }}">Edit</a>
                        <form action="{{ route('kecamatan.destroy', $kecamatan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
