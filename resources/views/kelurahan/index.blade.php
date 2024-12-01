@extends('layouts.app')

@section('content')
    <h1>Daftar Kelurahan</h1>
    <a href="{{ route('kelurahan.create') }}" class="btn btn-primary">Tambah Kelurahan</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kecamatan</th>
                <th>Nama Kelurahan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelurahan as $k)
                <tr>
                    <td>{{ $k->id }}</td>
                    <td>{{ $k->kecamatan->nama }}</td>
                    <td>{{ $k->kelurahan }}</td>
                    <td>
                        <a href="{{ route('kelurahan.edit', $k->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('kelurahan.destroy', $k->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
