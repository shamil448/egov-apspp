<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greenify Dashboard</title>
    <style>
        body {
            font-family: 'Baskervville', serif;
            margin: 0;
            padding: 0;
            background-color: #f3f3f3;
        }

        .container {
            display: flex;
            min-height: 100vh; /* memastikan kontainer mengambil seluruh tinggi halaman */
        }

        /* Sidebar Styles */
        .sidebar {
            background-color: #02FF89;
            width: 100%; /* Menggunakan 100% pada layar kecil */
            max-width: 350px; /* Maksimum lebar sidebar */
            padding: 20px;
            color: white;
            display: flex;
            flex-direction: column; /* Mengatur elemen di sidebar dalam kolom */
            border-right: 3px solid #000000; /* Menambahkan batas antara sidebar dan header */
        }

        .sidebar h1 {
            text-align: center;
            font-size: 22px;
            margin-bottom: 30px;
            font-family: 'Baskervville', serif; /* Mengatur font untuk judul */
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            flex-grow: 1; /* Biarkan ul mengisi ruang yang tersedia */
            display: flex;
            flex-direction: column;
            justify-content: center; /* Menempatkan teks di tengah vertikal */
        }

        .sidebar ul li {
            margin-bottom: 20px;
            display: flex; /* Mengatur agar teks dan gambar sejajar */
            align-items: center; /* Memusatkan vertikal */
            text-align: left; /* Rata kiri untuk teks */
        }

        .sidebar ul li img {
            width: 86px; /* Ukuran gambar */
            height: 62px; /* Ukuran gambar */
            margin-right: 10px; /* Jarak antara gambar dan teks */
        }

        .sidebar ul li a {
            color: #111111;
            font-size: 18px; /* Mengatur ukuran font untuk teks */
            font-family: 'Baskervville', serif; /* Mengatur font untuk teks */
            text-decoration: none; /* Menghilangkan garis bawah */
            padding: 10px 0; /* Memberikan ruang pada teks */
            flex-grow: 1; /* Membuat tautan mengisi ruang yang tersedia */
            width: 247px; /* Lebar area teks */
            height: 31px; /* Tinggi area teks */
            display: flex; /* Mengatur agar link dapat menggunakan flex */
            align-items: center; /* Memusatkan teks secara vertikal */
        }

        .sidebar ul li a:hover {
            text-decoration: underline; /* Garis bawah saat hover */
        }

        /* Styling untuk paragraf dalam sidebar */
        .sidebar ul p {
            font-family: 'Baskerville', serif; /* Mengatur font */
            font-size: 22px; /* Ukuran font */
            line-height: 44px; /* Jarak antar garis */
            color: #111111; /* Warna teks */
            margin: 10px 0; /* Margin vertikal */
        }

        /* Main Content Styles */
        .main-content {
            flex-grow: 1; /* Membuat main content mengisi sisa ruang */
            padding: 0;
            background-color: #fff;
            display: flex;
            flex-direction: column; /* Mengatur konten utama dalam kolom */
        }

        /* Header Styles */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #02FF89;
            padding: 10px 20px;
            border-bottom: 3px solid #000000; /* Menambahkan batas bawah pada header */
        }

        .header .title-container {
            display: flex;
            align-items: center; /* Memastikan gambar dan teks sejajar vertikal */
        }

        .header img {
            width: 40px;
            height: 40px;
            margin-right: 10px; /* Jarak antara gambar dan teks */
        }

        .header .greenify {
            color: #000000;
            font-size: 26px;
            margin-right: 20px; /* Jarak antara Greenify dan Government */
            font-family: 'Baskervville', serif; /* Mengatur font menjadi Baskerville */
        }

        .header .government {
            color: #000000;
            font-size: 26px;
            font-family: 'Baskervville', serif; /* Mengatur font menjadi Baskerville */
        }

        /* Image Section Styles */
        .image-section {
            display: flex; /* Menampilkan gambar dalam flex */
            justify-content: center; /* Mengatur gambar agar terpusat */
            padding: 0; /* Menghilangkan padding untuk mengurangi ruang putih */
            margin: 0; /* Menghilangkan margin untuk mengurangi ruang putih */
        }

        .image-section img {
            width: 100%; /* Pastikan gambar menggunakan 100% lebar dari elemen parent */
            height: auto; /* Jaga agar tinggi otomatis */
            max-width: 900px; /* Maksimum lebar untuk layar besar */
            margin: 0; /* Menghilangkan margin di sekitar gambar */
        }

        /* Icon Section Styles */
        .icon-section {
            display: flex; /* Mengatur ikon dalam baris */
            flex-wrap: wrap; /* Membungkus item saat ruang tidak cukup */
            justify-content: space-around;
            padding: 20px 0; /* Padding atas dan bawah */
        }

        .icon-item {
            text-align: center;
            flex-basis: calc(25% - 20px); /* Menyusun 4 ikon dalam satu baris */
            margin-bottom: 20px; /* Spasi antar item */
        }

        .icon-item img {
            width: 100%; /* Gambar fleksibel mengikuti lebar icon-item */
            max-width: 206px; /* Maksimum ukuran gambar */
            height: auto; /* Jaga rasio gambar */
            object-fit: contain;
        }

        .icon-item p {
            font-family: 'Baskervville', serif;
            font-size: 18px; /* Sedikit kecil agar lebih sesuai layar kecil */
            margin-top: 10px;
            color: #111111;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .header, .sidebar {
                flex-direction: column;
                align-items: flex-start;
            }

            .icon-item {
                flex-basis: calc(50% - 20px); /* Dua ikon per baris pada layar kecil */
            }
        }

        @media (max-width: 480px) {
            .icon-item {
                flex-basis: 100%; /* Satu ikon per baris pada layar ekstra kecil */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <ul>
                <p>General</p>
                <li>
                    <img src="{{ asset('images/5.jpeg') }}" alt="Dashboard Icon">
                    <a href="/dashboard">Dashboard</a>
                </li>
                <p>Lokasi</p>
                <li>
                    <img src="{{ asset('images/4.jpeg') }}" alt="Lokasi Icon">
                    <a href="/lokasi">Kirim Lokasi</a>
                </li>
                <p>Atur Jadwal</p>
                <li>
                    <img src="{{ asset('images/3.jpeg') }}" alt="Jadwal Icon">
                    <a href="/jadwal">Penjadwalan</a>
                </li>
                <p>Notifikasi</p>
                <li>
                    <img src="{{ asset('images/2.jpeg') }}" alt="Pesan Icon">
                    <a href="/pesan">Pesan Masuk</a>
                </li>
                <p>Pengaduan</p>
                <li>
                    <img src="{{ asset('images/1.png') }}" alt="Saran Icon">
                    <a href="/saran">Kritik & Saran</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header">
                <div class="title-container">
                    <img src="{{ asset('images/gaia.png') }}" alt="Gaia Logo">
                    <span class="greenify">Greenify</span>
                </div>
                <div class="title-container">
                    <img src="{{ asset('images/woman.png') }}" alt="Woman Logo">
                    <span class="government">Government</span>
                </div>
            </div>

            <!-- Image Section -->
            <div class="image-section">
                <img src="{{ asset('images/BannerRW.png') }}" alt="Banner RW">
            </div>

            <!-- Icon Section -->
            <div class="icon-section">
                <div class="icon-item">
                    <img src="{{ asset('images/LOKASI.png') }}" alt="Lokasi Icon">
                    <p>Lokasi</p>
                </div>
                <div class="icon-item">
                    <img src="{{ asset('images/JADWAL.png') }}" alt="Jadwal Icon">
                    <p>Jadwal</p>
                </div>
                <div class="icon-item">
                    <img src="{{ asset('images/PESAN.png') }}" alt="Pesan Icon">
                    <p>Pesan</p>
                </div>
                <div class="icon-item">
                    <img src="{{ asset('images/SARAN.png') }}" alt="Saran Icon">
                    <p>Saran</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>