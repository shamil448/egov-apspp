<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelurahan List</title>
</head>
<body>

    <h1>Daftar Kelurahan</h1>

    <!-- Form untuk menambah Kelurahan -->
    <form action="{{ route('kelurahan.store') }}" method="POST">
        @csrf
        <label for="kelurahan">Nama Kelurahan:</label>
        <input type="text" name="kelurahan" required>

        <label for="kecamatan_id">Kecamatan:</label>
        <select name="kecamatan_id" required>
            @foreach($kecamatan as $kec)
                <option value="{{ $kec->id }}">{{ $kec->nama_kecamatan }}</option>
            @endforeach
        </select>

        <button type="submit">Tambah Kelurahan</button>
    </form>

    <!-- Tabel untuk menampilkan data Kelurahan -->
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kelurahan</th>
                <th>Kecamatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelurahans as $kelurahan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kelurahan->kelurahan }}</td>
                <td>{{ $kelurahan->kecamatan->nama_kecamatan }}</td>
                <td>
                    <a href="{{ route('kelurahan.show', $kelurahan->id) }}">Lihat</a>
                    <a href="{{ route('kelurahan.edit', $kelurahan->id) }}">Edit</a>
                    <form action="{{ route('kelurahan.destroy', $kelurahan->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
