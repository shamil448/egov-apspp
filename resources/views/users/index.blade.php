@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Akun</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Nomor Handphone</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Hak Akses</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->gender) }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->address }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
