@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambahkan Akun</h2>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="username">Nama Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="phone_number">Nomor Handphone</label>
            <input type="text" name="phone_number" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" class="form-control" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="role">Hak Akses</label>
            <select name="role" class="form-control" required>
                <option value="RW">RW</option>
                <option value="Petugas">Petugas</option>
                <option value="Pemerintah">Pemerintah</option>
            </select>
        </div>

        <div class="form-group">
            <label for="address">Alamat</label>
            <textarea name="address" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
