@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Daftar Akun</title>
</head>
<body class="bg-gray-100">
<div class="container mx-auto p-6">
    <h2 class="text-3xl font-bold text-center mb-6">Daftar Akun</h2>

    @if (session('success'))
        <div class="mb-4 p-3 bg-green-200 border border-green-400 text-green-800 rounded shadow-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($users as $user)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-semibold">{{ $user->username }}</h3>
                    <p class="text-gray-600">ID: {{ $user->id }}</p>
                    <p class="text-gray-600">No HP: {{ $user->phone_number }}</p>
                    <p class="text-gray-600">Email: {{ $user->email }}</p>
                    <p class="text-gray-600">Gender: {{ ucfirst($user->gender) }}</p>
                    <p class="text-gray-600">Hak Akses: {{ $user->role }}</p>
                    <p class="text-gray-600">Alamat: {{ $user->address }}</p>
                </div>
                <div class="flex justify-between p-4 bg-gray-100">
                    <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500 hover:text-blue-700 font-semibold">Edit</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
@endsection
