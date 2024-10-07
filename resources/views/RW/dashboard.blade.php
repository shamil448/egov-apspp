@extends('layouts.app')  <!-- Menggunakan layout yang benar -->

@section('title', 'Dashboard - Greenify')

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
@endsection
