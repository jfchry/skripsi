@extends('layouts.frontend')

@section('content')
<!-- 1. HERO SECTION (Layout Premium Dua Kolom Khusus Villa) -->
<section class="text-white border-bottom" style="padding-top: 80px !important; padding-bottom: 3rem !important; background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)), url('https://q-xx.bstatic.com/xdata/images/hotel/max1024x768/470030124.jpg?k=f3d8d281d48dfc1387bb062bf680a5951e307dfea378ea58f63d0b385c6ee796&o=&s=1024x') no-repeat center center !important; background-size: cover !important;">
    <div class="container py-4">
        <div class="row align-items-center">

            <!-- Kolom Kiri: Judul Utama Halaman -->
            <div class="col-lg-7">
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb small mb-0 bg-transparent p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}" class="text-white text-decoration-none fw-bold">🏠 Beranda</a>
                        </li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">Penginapan &amp; Layanan</li>
                    </ol>
                </nav>

                <p class="text-uppercase fw-bold text-success mb-2 tracking-wider small">
                    Platform Pariwisata Pintar • Pusat Layanan Akomodasi
                </p>

                <h1 class="display-3 fw-bold text-white tracking-tight">
                    Villa Etalauser Ecoresort
                </h1>

                <p class="lead text-white-75 mt-3 fs-5" style="max-width: 650px;">
                    Penginapan ramah lingkungan dan layanan petualangan terintegrasi tepat di jantung kenyamanan alam liar kawasan Bukit Lawang.
                </p>

                <div class="d-flex flex-wrap gap-2 mt-4">
                    <a href="#accommodation" class="btn btn-success btn-lg fw-bold px-4 shadow-sm fs-6 rounded-pill">
                        🏨 Lihat Pilihan Kamar
                    </a>
                    <a href="#services" class="btn btn-outline-light btn-lg fw-bold px-4 fs-6 rounded-pill">
                        🛠️ Layanan &amp; Aktivitas Wisata
                    </a>
                </div>
            </div>

            <!-- Kolom Kanan: Quick Info Card Khas Villa -->
            <div class="col-lg-5 d-none d-lg-block">
                <div class="p-4 bg-success bg-opacity-10 rounded-4 border border-success border-opacity-10 shadow-sm" style="backdrop-filter: blur(4px);">
                    <h5 class="fw-bold text-success mb-2">🌿 Informasi Registrasi (Check-In)</h5>
                    <p class="small text-white mb-3 text-opacity-75">Nikmati jaminan layanan akomodasi ramah lingkungan terbaik dengan ketentuan standar berikut:</p>
                    <div class="d-flex flex-column gap-2 small">
                        <div class="d-flex align-items-start gap-2 text-white">
                            <span class="mt-0.5">🔑</span>
                            <div><strong>Ketentuan Waktu:</strong> Batas standar Check-In dimulai pukul 14.00 WIB, dan Check-Out maksimal pukul 12.00 WIB.</div>
                        </div>
                        <div class="d-flex align-items-start gap-2 text-white">
                            <span class="mt-0.5">🌱</span>
                            <div><strong>Kebijakan Lingkungan:</strong> Pengurangan sampah plastik sekali pakai, wisatawan sangat disarankan membawa botol minum (*tumbler*) sendiri.</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 2. EXPLANATION SECTION -->
<section class="py-5 bg-white">
    <div class="container py-2">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <img src="https://plus.unsplash.com/premium_photo-1663945117134-671b859fd182?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjV8fGp1bmdsZSUyMGhvdXNlfGVufDB8fDB8fHww" class="img-fluid rounded-4 shadow-sm border" alt="Eksterior Villa Etalauser">
            </div>
            <div class="col-lg-6">
                <span class="text-success fw-bold text-uppercase tracking-wider small" style="font-size: 11px;">Pariwisata Pintar &amp; Hunian Berkelanjutan</span>
                <h2 class="fw-bold text-dark my-2 display-6" style="letter-spacing: -0.5px;">Menyelaraskan Kenyamanan Dengan Alam</h2>
                <p class="text-muted small leading-relaxed" style="text-align: justify; line-height: 1.8;">
                    Villa Etalauser Ecoresort menyediakan pengalaman menginap yang nyaman dan berorientasi alam bagi para wisatawan yang berkunjung ke Bukit Lawang dan Taman Nasional Gunung Leuser. Kami mengusung konsep pariwisata berkelanjutan, meminimalkan dampak lingkungan negatif, sekaligus memaksimalkan kenyamanan Anda menikmati panorama alam tropis Sumatera Utara yang autentik.
                </p>
                <div class="row g-3 mt-2">
                    <div class="col-sm-6">
                        <h5 class="fw-bold text-dark h6 mb-1">🌲 Pendekatan Ramah Lingkungan</h5>
                        <p class="small text-muted mb-0">Pengelolaan akomodasi hijau di sekitar kawasan sabuk hijau konservasi Leuser.</p>
                    </div>
                    <div class="col-sm-6">
                        <h5 class="fw-bold text-dark h6 mb-1">🗺️ Lokasi Strategis Belantara</h5>
                        <p class="small text-muted mb-0">Akses terbaik tepat di bibir sungai dan pintu masuk pelacakan satwa liar.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. SERVICES & ACTIVITIES SECTION (EKSPANSI AKTIVITAS BARU) -->
<section id="services" class="py-5 bg-dark text-white">
    <div class="container py-3">
        <div class="text-center mb-5">
            <p class="text-success fw-bold small text-uppercase tracking-wider mb-1">Petualangan &amp; Kemudahan Layanan</p>
            <h2 class="fw-bold text-white mt-1">Layanan Eksklusif &amp; Aktivitas Lapangan</h2>
            <p class="text-white-50 mx-auto small mt-2" style="max-width: 600px;">Lengkapi memori petualangan hebat Anda di kawasan Bukit Lawang melalui deretan paket aktivitas terintegrasi langsung dari resort kami.</p>
        </div>

        <!-- Baris 1: Aktivitas Utama Alam Liar -->
        <div class="row g-4 text-center mb-4">
            <div class="col-md-4">
                <div class="p-4 rounded-4 bg-secondary bg-opacity-10 h-100 border border-secondary border-opacity-25 shadow-sm">
                    <div class="fs-1 mb-3">🦧</div>
                    <h4 class="fw-bold text-success h5">Jungle Trekking</h4>
                    <p class="small text-white-50 mb-0" style="line-height: 1.6;">Petualangan menjelajahi Taman Nasional Gunung Leuser bersama pemandu lokal tersertifikasi untuk melihat Orangutan langsung di habitat aslinya.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded-4 bg-secondary bg-opacity-10 h-100 border border-secondary border-opacity-25 shadow-sm">
                    <div class="fs-1 mb-3">🚣</div>
                    <h4 class="fw-bold text-success h5">Arung Jeram Tradisional</h4>
                    <p class="small text-white-50 mb-0" style="line-height: 1.6;">Merasakan sensasi riak jeram Sungai Bahorok menggunakan ban karet (*river tubing*) tradisional yang aman sebagai penutup jalur penjelajahan hutan.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded-4 bg-secondary bg-opacity-10 h-100 border border-secondary border-opacity-25 shadow-sm">
                    <div class="fs-1 mb-3">🚐</div>
                    <h4 class="fw-bold text-success h5">Antar-Jemput Bandara</h4>
                    <p class="small text-white-50 mb-0" style="line-height: 1.6;">Layanan penjemputan dan pengantaran privat yang nyaman menggunakan armada khusus langsung dari Bandara Kualanamu atau Kota Medan.</p>
                </div>
            </div>
        </div>

        <!-- Baris 2: Aktivitas Tambahan Baru (Village Tour, Bat Cave, Camping Ground) -->
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="p-4 rounded-4 bg-secondary bg-opacity-10 h-100 border border-secondary border-opacity-25 shadow-sm">
                    <div class="fs-1 mb-3">🚲</div>
                    <h4 class="fw-bold text-success h5">Village Tour (Tur Pedesaan)</h4>
                    <p class="small text-white-50 mb-0" style="line-height: 1.6;">Berinteraksi erat dengan kearifan lokal penduduk desa pelindung hutan, melihat proses pembuatan kerajinan tradisional, serta kuliner otentik setempat.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded-4 bg-secondary bg-opacity-10 h-100 border border-secondary border-opacity-25 shadow-sm">
                    <div class="fs-1 mb-3">🦇</div>
                    <h4 class="fw-bold text-success h5">Bat Cave Tour (Eksplorasi Gua)</h4>
                    <p class="small text-white-50 mb-0" style="line-height: 1.6;">Petualangan seru menyusuri ruang bawah tanah purba Gua Kelelawar untuk mengagumi keindahan ornamen stalaktit alami yang eksotis.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded-4 bg-secondary bg-opacity-10 h-100 border border-secondary border-opacity-25 shadow-sm">
                    <div class="fs-1 mb-3">⛺</div>
                    <h4 class="fw-bold text-success h5">Camping Ground Khusus</h4>
                    <p class="small text-white-50 mb-0" style="line-height: 1.6;">Fasilitas area berkemah aman di tepi sungai bagi para pencinta alam murni yang ingin mendengarkan nyanyian malam hutan hujan tropis.</p>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- 4. ACCOMMODATION LIST SECTION (LAYOUT GLOBAL RESERVASI) -->
<section id="accommodation" class="py-5 bg-light border-bottom">
    <div class="container py-3">

        <!-- Header Section -->
        <div class="text-center mb-5">
            <span class="text-success fw-bold small text-uppercase tracking-wider">Pilihan Akomodasi</span>
            <h2 class="fw-bold text-dark mt-1">Kabin &amp; Villa Hunian Kami</h2>
            <p class="text-muted mx-auto small mt-2" style="max-width: 600px;">Detail rincian tipe kamar, kapasitas rombongan, serta fasilitas lengkap untuk kenyamanan bermalam Anda.</p>
        </div>

        <!-- Jajaran Kartu Kamar Dinamis (Maksimal 3 Tipe Kamar) -->
        <div class="row g-4 justify-content-center">
            @foreach($room_services as $room)
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden travel-card border border-light">
                        <div class="position-relative">
                            <img src="{{ asset('storage/' . $room->icon_url) }}" class="card-img-top" style="height: 220px; object-fit: cover;" alt="{{ $room->service_name }}">
                            <span class="position-absolute top-0 end-0 bg-success text-white px-3 py-1.5 m-3 fw-bold rounded-pill small shadow-sm" style="font-size: 11px;">
                                Rp{{ number_format($room->price, 0, ',', '.') }} / malam
                            </span>
                        </div>
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <h4 class="fw-bold text-dark mb-2 h5">{{ $room->service_name }}</h4>
                                <div class="text-muted small" style="text-align: justify; line-height: 1.6;">
                                    {!! nl2br(e($room->description)) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- TOMBOL RESERVASI UTAMA (DIPINDAHKAN KE BAWAH ROW KARTU) -->
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 text-center">
                <p class="small text-muted mb-3">Siap untuk memesan? Pilih metode reservasi instan di bawah ini:</p>
                <div class="d-flex flex-column sm-flex-row justify-content-center gap-3">
                    <a href="https://wa.me/6281234567890?text=Halo%20Villa%20Etalauser,%20saya%20ingin%20menanyakan%20ketersediaan%20kamar%20dan%20melakukan%20booking."
                       target="_blank" rel="noopener noreferrer" class="btn btn-success btn-lg fw-bold px-5 rounded-pill shadow-sm fs-6 py-2.5">
                        <i class="bi bi-whatsapp"></i> Hubungi &amp; Pesan via WhatsApp
                    </a>
                    <a href="https://www.agoda.com/id-id/"
                       target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary btn-lg fw-bold px-5 rounded-pill fs-6 py-2.5">
                        <i class="bi bi-box-arrow-up-right"></i> Periksa Ketersediaan di Agoda
                    </a>
                </div>
            </div>
        </div>

        <!-- Extra Facilities Banner -->
        <div class="card border-0 bg-success text-white p-4 shadow-sm rounded-4 mt-5">
            <div class="row align-items-center">
                <div class="col-lg-4 mb-3 mb-lg-0">
                    <h5 class="fw-bold mb-2 text-white">🌿 Fasilitas Tambahan Ecoresort</h5>
                    <p class="small text-white-50 mb-0">Layanan penunjang kenyamanan mobilitas dan pemenuhan kebutuhan rencana perjalanan Anda selama bermalam.</p>
                </div>
                <div class="col-lg-8">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="p-3 rounded-3 bg-white bg-opacity-10 small h-100">
                                🌐 <strong>Kawasan Wi-Fi Gratis</strong>
                                <span class="d-block text-white-50 small mt-1" style="font-size: 11px;">Akses jaringan internet tanpa hambatan di ruang publik utama.</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 rounded-3 bg-white bg-opacity-10 small h-100">
                                ☕ <strong>Restoran Tepi Sungai</strong>
                                <span class="d-block text-white-50 small mt-1" style="font-size: 11px;">Menu makanan segar lokal disajikan tepat di bibir jeram Sungai Bahorok.</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 rounded-3 bg-white bg-opacity-10 small h-100">
                                🤝 <strong>Pemandu Lokal Berlisensi</strong>
                                <span class="d-block text-white-50 small mt-1" style="font-size: 11px;">Didukung penuh oleh jaringan pemandu resmi pemegang lisensi konservasi nasional.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- 5. RESORT GALLERY SECTION -->
<section class="py-5 bg-light">
    <div class="container py-2">
        <div class="text-center mb-5">
            <span class="text-success fw-bold small text-uppercase tracking-wider">Dokumentasi Lensa</span>
            <h2 class="fw-bold text-dark mt-1">Galeri Fasilitas &amp; Kawasan Villa</h2>
            <p class="text-muted mx-auto small mt-2" style="max-width: 600px;">
                Menyuguhkan jajaran dokumentasi orisinal khusus tata ruang fasilitas kamar, struktur kabin natural, dan keasrian lanskap internal ecoresort.
            </p>
        </div>

        <div class="row g-4">
            @forelse($villa_galleries as $photo)
                <div class="col-md-4 col-sm-6">
                    <div class="card border-0 shadow-sm overflow-hidden rounded-4 h-100 travel-card border border-light">
                        <img src="{{ asset('storage/' . $photo->file_path) }}"
                             class="img-fluid"
                             style="height: 240px; width: 100%; object-fit: cover;"
                             alt="{{ $photo->caption }}">
                        <div class="p-3 bg-white border-top text-center">
                            <h6 class="fw-bold text-dark mb-0 small">{{ $photo->caption ?? 'Fasilitas Eksklusif Villa' }}</h6>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-4 text-muted">
                    <p class="small">Belum ada dokumentasi khusus galeri fasilitas villa yang diunggah dari dashboard admin.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- 6. GOOGLE MAPS REVIEWS MOCKUP SECTION -->
<section class="py-5 bg-white border-bottom">
    <div class="container py-2">
        <div class="text-center mb-5">
            <span class="text-success fw-bold small text-uppercase tracking-wider">Testimoni Pengunjung</span>
            <h2 class="fw-bold text-dark mt-1">Apa Kata Mereka di Google Reviews?</h2>
            <p class="text-muted mx-auto small mt-2" style="max-width: 500px;">Ulasan autentik bintang 5 langsung disadur dari ulasan riil para pengunjung internasional maupun lokal.</p>
        </div>

        <div class="row g-4">
            <!-- Review 1 -->
            <div class="col-md-4">
                <div class="p-4 rounded-4 bg-light shadow-sm h-100 border border-light">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=100" class="rounded-circle shadow-sm" style="width: 45px; height: 45px; object-fit: cover;" alt="Reviewer">
                        <div>
                            <h6 class="fw-bold text-dark mb-0 small">Sarah Jenkins</h6>
                            <span class="text-muted" style="font-size: 11px;">Pemandu Lokal Google • 2 minggu lalu</span>
                        </div>
                    </div>
                    <div class="text-warning small mb-2">⭐⭐⭐⭐⭐</div>
                    <p class="text-muted small mb-0" style="text-align: justify; line-height: 1.6;">
                        "Benar-benar surga dunia! Kondisi kabin huniannya sangat bersih dan restoran tepi sungainya luar biasa mengesankan. Kesempatan melihat orangutan lalu pulang kembali ke villa naik tubing adalah momen petualangan tak terlupakan!"
                    </p>
                </div>
            </div>
            <!-- Review 2 -->
            <div class="col-md-4">
                <div class="p-4 rounded-4 bg-light shadow-sm h-100 border border-light">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=100" class="rounded-circle shadow-sm" style="width: 45px; height: 45px; object-fit: cover;" alt="Reviewer">
                        <div>
                            <h6 class="fw-bold text-dark mb-0 small">Budi Santoso</h6>
                            <span class="text-muted" style="font-size: 11px;">Wisatawan Domestik • 1 bulan lalu</span>
                        </div>
                    </div>
                    <div class="text-warning small mb-2">⭐⭐⭐⭐⭐</div>
                    <p class="text-muted small mb-0" style="text-align: justify; line-height: 1.6;">
                        "Pelayanan ramah banget, kamarnya nyaman dan asri pas di pinggir sungai. Sinyal Telkomsel di area villa juga lancar jadi tetap bisa kerja remote sambil denger suara air sungai. Sangat direkomendasikan!"
                    </p>
                </div>
            </div>
            <!-- Review 3 -->
            <div class="col-md-4">
                <div class="p-4 rounded-4 bg-light shadow-sm h-100 border border-light">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=100" class="rounded-circle shadow-sm" style="width: 45px; height: 45px; object-fit: cover;" alt="Reviewer">
                        <div>
                            <h6 class="fw-bold text-dark mb-0 small">Markus Weber</h6>
                            <span class="text-muted" style="font-size: 11px;">Backpacker Jerman • 3 hari lalu</span>
                        </div>
                    </div>
                    <div class="text-warning small mb-2">⭐⭐⭐⭐⭐</div>
                    <p class="text-muted small mb-0" style="text-align: justify; line-height: 1.6;">
                        "Ecoresort terbaik di Bukit Lawang! Jaringan pemandu lokal di sini sangat profesional dalam menyusun draf rute trekking 2 hari 1 malam kami di tengah hutan Leuser secara aman. Saya pasti akan kembali lagi tahun depan."
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- TOMBOL AJAKAN ULASAN GLOBAL -->
        <div class="text-center mt-5">
            <p class="small text-muted mb-2">Punya pengalaman berkesan saat menginap di sini?</p>
            <a href="https://www.google.com/maps/place/etalauser+ecoresort/data=!4m2!3m1!1s0x3030b930cf99845f:0x80e722404e97ef62"
               target="_blank" rel="noopener noreferrer" class="btn btn-outline-success btn-sm px-4 rounded-pill fw-bold transition-transform">
                <i class="bi bi-google"></i> Tulis Ulasan Anda di Google Maps
            </a>
        </div>
</section>

<!-- 7. LOCATION & MAPS SECTION -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <h3 class="fw-bold text-dark tracking-tight">Lokasi &amp; Kontak Resmi</h3>
                <p class="text-muted small leading-relaxed">Terintegrasi langsung ke peta digital pariwisata Bukit Lawang untuk memudahkan penentuan koordinat peta navigasi logistik perjalanan Anda.</p>
                <hr class="opacity-25">
                <p class="mb-2 text-muted small"><strong class="text-dark">📍 Alamat:</strong> Kawasan Wisata Bukit Lawang, Kecamatan Bahorok, Kabupaten Langkat, Sumatera Utara.</p>
                <p class="mb-2 text-muted small"><strong class="text-dark">📞 Telepon/WA:</strong> +62 812-3456-7890</p>
                <p class="mb-4 text-muted small"><strong class="text-dark">✉️ Surel Resmi:</strong> info@villaetalauser.com</p>

                <div class="d-flex flex-wrap gap-2">
                    <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" class="btn btn-success fw-bold px-4 btn-sm rounded-pill shadow-sm">
                        💬 Hubungi Layanan Pelanggan
                    </a>
                    <a href="https://www.google.com/maps/place/etalauser+ecoresort/data=!4m2!3m1!1s0x3030b930cf99845f:0x80e722404e97ef62?sa=X&amp;ved=1t:242&amp;ictx=111"
                       target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary fw-bold px-4 btn-sm rounded-pill">
                        🗺️ Buka di Google Maps
                    </a>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ratio ratio-21x9 rounded-4 shadow-sm border overflow-hidden">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.0863836371497!2d98.1182283!3d3.5443908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3030b930cf99845f%3A0x80e722404e97ef62!2sEtalauser%20Ecoresort!5e0!3m2!1sid!2sid!4v1719535000000!5m2!1sid!2sid"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 8. CUSTOM INTERACTIVE STYLE -->
<style>
    .travel-card {
        transition: transform 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94), box-shadow 0.3s ease;
    }
    .travel-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 1rem 2.5rem rgba(0,0,0,.08) !important;
    }
</style>
@endsection
