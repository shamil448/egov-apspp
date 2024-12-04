@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Kecamatan</h1>
        <a href="{{ route('kecamatan.create') }}" class="btn btn-primary mb-3">Tambah Kecamatan</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Kecamatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kecamatan as $kecamatan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kecamatan->nama_kecamatan }}</td>
                        <td>
                            <a href="{{ route('kecamatan.edit', $kecamatan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('kecamatan.destroy', $kecamatan->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
