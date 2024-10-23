@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit User</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username" value="{{ old('username', $user->username) }}" required>
        </div>

        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ old('phone_number', $user->phone_number) }}" required>
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control" required>
                <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role" class="form-control" required>
                <option value="RW" {{ $user->role == 'RW' ? 'selected' : '' }}>RW</option>
                <option value="Petugas" {{ $user->role == 'Petugas' ? 'selected' : '' }}>Petugas</option>
                <option value="Pemerintah" {{ $user->role == 'Pemerintah' ? 'selected' : '' }}>Pemerintah</option>
            </select>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" name="address" id="address" required>{{ old('address', $user->address) }}</textarea>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password (leave blank to keep the same)</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
        </div>

        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>
@endsection
