@extends('layouts.app')

@section('title', 'Kirim Lokasi')

@section('content')
    <div class="container">
    @section('content')
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <ul>
                <p>General</p>
                <li>
                    <img src="{{ asset('images/5.jpeg') }}" alt="Dashboard Icon">
                    <a href="/rw/dashboard">Dashboard</a>
                </li>
                <p>Lokasi</p>
                <li>
                    <img src="{{ asset('images/4.jpeg') }}" alt="Lokasi Icon">
                    <a href="/rw/lokasi">Kirim Lokasi</a>
                </li>
                <p>Atur Jadwal</p>
                <li>
                    <img src="{{ asset('images/3.jpeg') }}" alt="Jadwal Icon">
                    <a href="/rw/jadwal">Penjadwalan</a>
                </li>
                <p>Notifikasi</p>
                <li>
                    <img src="{{ asset('images/2.jpeg') }}" alt="Pesan Icon">
                    <a href="/rw/pesan">Pesan Masuk</a>
                </li>
                <p>Pengaduan</p>
                <li>
                    <img src="{{ asset('images/1.png') }}" alt="Saran Icon">
                    <a href="/rw/saran">Kritik & Saran</a>
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
                    <span class="RW">Rukun Warga</span>
                </div>
            </div>
        <div class="form-section">
            <h2>Kirim Lokasi</h2>

            <label for="nama-perumahan">Nama Perumahan</label>
            <input type="text" id="nama-perumahan" name="nama-perumahan" placeholder="Masukkan nama perumahan">

            <label for="kirim-lokasi">Kirim Lokasi</label>
            <input type="text" id="kirim-lokasi" name="kirim-lokasi" placeholder="Masukkan lokasi">

            <label for="nama-kecamatan">Nama Kecamatan</label>
            <input type="text" id="nama-kecamatan" name="nama-kecamatan" placeholder="Masukkan nama kecamatan">

            <label for="nama-kelurahan">Nama Kelurahan</label>
            <input type="text" id="nama-kelurahan" name="nama-kelurahan" placeholder="Masukkan nama kelurahan">

            <div class="map-section">
                <img src="https://via.placeholder.com/400x200?text=Google+Maps" alt="Google Maps">
            </div>

            <div class="buttons">
                <button class="submit">Kirim</button>
                <button class="cancel">Batal</button>
            </div>
        </div>
    </div>
@endsection
