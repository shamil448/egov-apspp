<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Akun</title>
</head>
<body>
    <h1>Tambahkan Akun</h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('accounts.store') }}" method="POST">
        @csrf
        <label for="username">Nama Username:</label><br>
        <input type="text" id="username" name="username"><br>

        <label for="phone">Nomor Handphone:</label><br>
        <input type="text" id="phone" name="phone"><br>

        <label for="gender">Gender:</label><br>
        <select id="gender" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select><br>

        <label for="access_right">Hak Akses:</label><br>
        <input type="text" id="access_right" name="access_right"><br>

        <label for="address">Alamat:</label><br>
        <textarea id="address" name="address"></textarea><br>

        <button type="submit">Submit</button>
        <button type="reset">Reset</button>
    </form>
</body>
</html>
