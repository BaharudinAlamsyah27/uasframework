@extends('landing.layouts.app')

@section('sub_page')
 class="sub_page"
 @endsection
@section('content')
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container">
                    <a class="navbar-brand" href="index.html">
                        <span>
                            alam Rent
                        </span>
                    </a>
                    <div class="navbar-collapse" id="">
                        <div class="custom_menu-btn">
                            <button onclick="openNav()">
                                <span class="s-1"> </span>
                                <span class="s-2"> </span>
                                <span class="s-3"> </span>
                            </button>
                        </div>
                        <div id="myNav" class="overlay">
                            <div class="overlay-content">
                                 <a href="{{ route('landing.index') }}">Beranda</a>

                                <a href="{{ route('landing.kendaraan') }}">Mobil</a>

                                 <a href="{{ route('admin.dashboard') }}">Dashboard</a>

                                <a href="#tentang">Tentang Kami</a>

                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->
    </div>


    <section class="car_section layout_padding2-top layout_padding-bottom">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Cara Terbaik Menemukan Mobil Favorit Anda
                </h2>
                <p>
                    Sudah menjadi fakta umum bahwa pembaca akan teralihkan oleh konten yang dapat dibaca.
                </p>
            </div>
            <div class="car_container">
                <div class="box">
                    <div class="img-box">
                        <img src="{{ asset('landing/images/c-1') }}.png" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            Pilih Mobil Anda
                        </h5>
                        <p>
                            Kami menyediakan berbagai pilihan armada yang siap menemani perjalanan Anda dengan nyaman dan
                            aman.
                        </p>
                        <a href="">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
                <div class="box">
                    <div class="img-box">
                        <img src="{{ asset('landing/images/c-2') }}.png" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            Dapatkan Mobil Anda
                        </h5>
                        <p>
                            Proses pemesanan yang mudah dan cepat tanpa ribet untuk kebutuhan transportasi Anda.
                        </p>
                        <a href="">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
                <div class="box">
                    <div class="img-box">
                        <img src="{{ asset('landing/images/c-3') }}.png" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            Hubungi Dealer Kami
                        </h5>
                        <p>
                            Tim kami siap membantu menjawab pertanyaan dan memberikan solusi sewa mobil terbaik untuk Anda.
                        </p>
                        <a href="">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- end best section -->

     <section class="best_section">
        <div class="container">
            <div class="book_now">
                <div class="detail-box">
                    <h2>
                        Mobil Terbaik Kami
                    </h2>
                    <p>
                        Pilihan armada unggulan dengan harga kompetitif untuk segala keperluan Anda.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="rent_section layout_padding">
        <div class="container">
            <div class="rent_container">

                @forelse ($kendaraans as $kendaraan)
                    <div class="box">
                        <div class="img-box">
                            <img src="{{ asset('storage/kendaraan/' . $kendaraan->gambar) }}"
                                alt="{{ $kendaraan->nama_kendaraan }}">
                        </div>
                        <div class="price">
                            <a href="{{ route('landing.kendaraan.detail', $kendaraan->id) }}">
                                Sewa Rp {{ number_format($kendaraan->harga, 0, ',', '.') }}/hari
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-center">
                        Tidak ada kendaraan tersedia saat ini.
                    </p>
                @endforelse

            </div>

        </div>
    </section>
@endsection
