@extends('landing.layouts.app')

@section('content')
    <div class="hero_area">
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container">
                    <a class="navbar-brand" href="index.html">
                        <span>
                            Nabil Rent
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
        <section class=" slider_section position-relative">
            <div class="slider_container">
                <div class="img-box">
                    <img src="{{ asset('landing/images/hero-img') }}.jpg" alt="">
                </div>
                <div class="detail_container">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="detail-box">
                                    <h1>
                                        Layanan <br>
                                        Ahli Sewa <br>
                                        Mobil
                                    </h1>
                                    <a href="">
                                        Hubungi Kami
                                    </a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="detail-box">
                                    <h1>
                                        Layanan <br>
                                        Ahli Sewa <br>
                                        Mobil
                                    </h1>
                                    <a href="">
                                        Hubungi Kami
                                    </a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="detail-box">
                                    <h1>
                                        Layanan <br>
                                        Ahli Sewa <br>
                                        Mobil
                                    </h1>
                                    <a href="">
                                        Hubungi Kami
                                    </a>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="sr-only">Sebelumnya</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="sr-only">Berikutnya</span>
                        </a>
                    </div>

                </div>
            </div>
        </section>
    </div>
    <section class="book_section">
        <div class="form_container">
            <form action="">
                <div class="form-row">
                    <div class="col-lg-8">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="parkingName">Lokasi Penjemputan</label>
                                <input type="text" class="form-control" placeholder="Masukkan lokasi">
                            </div>
                            <div class="col-md-6">
                                <label for="parkingNumber">Lokasi Pengembalian</label>
                                <input type="text" class="form-control" placeholder="Masukkan lokasi">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="parkingName">Tanggal Jemput</label>
                                <input type="text" class="form-control" placeholder="07/09/2020">
                            </div>
                            <div class="col-md-6">
                                <label for="parkingNumber">Tanggal Kembali</label>
                                <input type="text" class="form-control" placeholder="07/09/2020">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="btn-container">
                            <button type="submit" class="">
                                Cari
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <div class="img-box">
            <img src="{{ asset('landing/images/book-car') }}.png" alt="">
        </div>
    </section>

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
                <div class="btn-box">
                    <a href="">
                        Pesan Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="rent_section layout_padding">
        <div class="container">
            <div class="rent_container">

                @forelse ($kendaraanTerbaru as $kendaraan)
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

            <div class="btn-box">
                <a href="{{ route('landing.kendaraan') }}">
                    Lihat Semua Kendaraan
                </a>
            </div>
        </div>
    </section>

    <section class="about_section layout_padding-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 px-0">
                    <div class="img-box">
                        <img src="{{ asset('landing/images/about-img') }}.png" alt="">
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="detail-box">
                        <h2>
                            Tentang Mobil Kami
                        </h2>
                        <p>
                            Nabil Rent berkomitmen memberikan layanan sewa mobil berkualitas dengan kondisi armada yang
                            prima dan terawat demi kenyamanan pelanggan.
                        </p>
                        <a href="">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="us_section">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Mengapa Memilih Kami
                </h2>
                <p>
                    Keunggulan yang membuat pelanggan setia menggunakan layanan Nabil Rent.
                </p>
            </div>
        </div>
        <div class="us_container layout_padding2">
            <div class="content_box">
                <div class="box">
                    <div class="img-box">
                        <img src="{{ asset('landing/images/u-1') }}.png" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            Sewa Murah
                        </h5>
                    </div>
                </div>
                <div class="box">
                    <div class="img-box">
                        <img src="{{ asset('landing/images/u-2') }}.png" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            Mobil Cepat
                        </h5>
                    </div>
                </div>
                <div class="box">
                    <div class="img-box">
                        <img src="{{ asset('landing/images/u-3') }}.png" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            Mobil Aman
                        </h5>
                    </div>
                </div>
                <div class="box">
                    <div class="img-box">
                        <img src="{{ asset('landing/images/u-4') }}.png" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            Dukungan Cepat
                        </h5>
                    </div>
                </div>
            </div>
            <div class="btn-box">
                <a href="">
                    Baca Selengkapnya
                </a>
            </div>
        </div>
    </section>

    <section class="client_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Apa Kata Pelanggan
                </h2>
                <p>
                    Testimoni asli dari pelanggan yang telah menggunakan layanan kami.
                </p>
            </div>
            <div class="layout_padding2-top">
                <div class="carousel-wrap ">
                    <div class="owl-carousel">
                        <div class="item">
                            <div class="box">
                                <div class="detail-box">
                                    <p>
                                        Layanan yang sangat memuaskan, mobilnya bersih dan proses sewanya sangat cepat.
                                        Sangat direkomendasikan untuk siapa saja yang butuh kendaraan.
                                    </p>
                                </div>
                                <div class="client_id">
                                    <div class="img-box">
                                        <img src="{{ asset('landing/images/client-1') }}.png" alt=""
                                            class="img-1">
                                        <img src="{{ asset('landing/images/client-1') }}-white.png" alt=""
                                            class="img-2">
                                    </div>
                                    <div class="name">
                                        <h6>
                                            Andi Pratama
                                        </h6>
                                        <p>
                                            Pelanggan Setia
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="box">
                                <div class="detail-box">
                                    <p>
                                        Harga sewa di Nabil Rent sangat bersahabat dibanding tempat lain. Kondisi mesin
                                        mobil sangat prima untuk perjalanan jauh.
                                    </p>
                                </div>
                                <div class="client_id">
                                    <div class="img-box">
                                        <img src="{{ asset('landing/images/client-2') }}.png" alt=""
                                            class="img-1">
                                        <img src="{{ asset('landing/images/client-2') }}-white.png" alt=""
                                            class="img-2">
                                    </div>
                                    <div class="name">
                                        <h6>
                                            Siti Aminah
                                        </h6>
                                        <p>
                                            Pengusaha
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="box">
                                <div class="detail-box">
                                    <p>
                                        Sangat terbantu dengan respon tim dukungan yang cepat saat saya membutuhkan bantuan
                                        di jalan. Terima kasih Nabil Rent!
                                    </p>
                                </div>
                                <div class="client_id">
                                    <div class="img-box">
                                        <img src="{{ asset('landing/images/client-1') }}.png" alt=""
                                            class="img-1">
                                        <img src="{{ asset('landing/images/client-1') }}-white.png" alt=""
                                            class="img-2">
                                    </div>
                                    <div class="name">
                                        <h6>
                                            Budi Santoso
                                        </h6>
                                        <p>
                                            Wisatawan
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="contact_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Minta Panggilan Balik
                </h2>
            </div>
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="form_container">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="inputName4" placeholder="Nama ">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="inputSubject4" placeholder="Telepon">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <input type="email" class="form-control" id="inputEmail4"
                                        placeholder="Alamat Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="inputMessage" placeholder="Pesan">
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="contact_items">

                <a href="">
                    <div class="img-box">
                        <img src="{{ asset('landing/images/location.png') }}" alt="">
                    </div>
                    <h6>
                        Jl. Alamat Contoh No. 123<br>
                        Jakarta, Indonesia
                    </h6>
                </a>
                <a href="">
                    <div class="img-box">
                        <img src="{{ asset('landing/images/call.png') }}" alt="">
                    </div>
                    <h6>
                        (+62 8123456789)
                    </h6>
                </a>
                <a href="">
                    <div class="img-box">
                        <img src="{{ asset('landing/images/mail.png') }}" alt="">
                    </div>
                    <h6>
                        info@nabilrent.com
                    </h6>
                </a>

            </div>
            <div class="social_container">
                <div class="social-box">
                    <div>
                        <a href="">
                            <img src="{{ asset('landing/images/fb.png') }}" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <img src="images/twitter.png" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <img src="images/linkedin.png" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <img src="images/insta.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="map_section">
        <div class="map_container">
            <div class="map-responsive">
                <iframe
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France"
                    width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%"
                    allowfullscreen></iframe>
            </div>
        </div>
    </section>
@endsection
