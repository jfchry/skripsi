@extends('layouts.frontend')

@section('content')
<!-- SECTION NAVIGASI (NAVBAR) -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark bg-opacity-75">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            Bukit Lawang
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
                <li class="nav-item"><a class="nav-link" href="#experience">Pengalaman</a></li>
                <li class="nav-item"><a class="nav-link" href="#journey">Itinerary</a></li>
                <li class="nav-item"><a class="nav-link" href="#villa">Penginapan</a></li>
                <li class="nav-item"><a class="nav-link" href="#discover">Galeri</a></li>

                <li class="nav-item d-none d-lg-block mx-2 text-secondary">|</li>

                {{-- Cek Jika Pengunjung Belum Login --}}
                @guest
                    <li class="nav-item">
                        <a class="btn btn-outline-light btn-sm px-3" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right"></i> Login Admin
                        </a>
                    </li>
                @endguest

                {{-- Cek Jika Admin Sudah Login --}}
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> Admin
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                    Dashboard
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- SECTION HERO -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <p class="text-uppercase fw-bold text-success mb-2 small" style="letter-spacing: 1.5px;">
                    🌿 Gerbang Petualangan Ekowisata Terbaik Anda
                </p>
                <h1 class="display-2 fw-bold text-white tracking-tight" style="letter-spacing: -1.5px; line-height: 1.1;">
                    Di Mana Hutan Hujan Liar Menyatu dengan Jiwa Anda
                </h1>
                <p class="lead mt-4 text-white fs-5" style="line-height: 1.7; text-align: justify;">
                    Melangkah masuk ke dalam keindahan alami Taman Nasional Gunung Leuser. Temui orangutan megah di habitat asli mereka, taklukkan jeram liar sungai tubing, dan ukir kenangan tak terlupakan di jantung surga hijau Sumatra.
                </p>
                <a href="{{ route('destinations.index') }}" class="btn btn-success btn-lg mt-3 fw-bold shadow-sm px-4 rounded-pill">
                    Mulai Petualangan Anda Sekarang ➡️
                </a>
            </div>
        </div>
    </div>
</section>

<!-- SECTION TENTANG (ABOUT) -->
<section id="about" class="section-padding py-5 bg-light border-bottom">
    <div class="container py-3">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-dark display-6" style="letter-spacing: -0.5px;">
                Suaka Suci Perlindungan Satwa Liar Sumatra
            </h2>
            <div class="mx-auto bg-success rounded" style="width: 60px; height: 3px;"></div>
        </div>

        <div class="row g-4 align-items-stretch">
            <!-- KOLOM KIRI: KONSERVASI GLOBAL & EKOSISTEM -->
            <div class="col-md-6">
                <div class="card h-100 border-0 bg-white shadow-sm p-4 rounded-3 border-start border-4 border-success">
                    <h5 class="fw-bold text-dark mb-3 d-flex align-items-center">
                        <span class="me-2">🌿</span> Konservasi Global & Petualangan Alam Belantara
                    </h5>
                    <p class="text-muted" style="line-height: 1.8; font-size: 1.05rem; text-align: justify;">
                        Bukit Lawang bukan sekadar destinasi pariwisata biasa; kawasan ini merupakan garda terdepan internasional tempat bertemunya misi konservasi global dengan petualangan alam yang murni. Terletak strategis di ambang pintu Taman Nasional Gunung Leuser (TNGL) yang legendaris, suaka ini menjadi rumah bagi keanekaragaman hayati dunia yang tak ternilai, termasuk flora langka dan fauna endemik. Melalui integrasi pariwisata berkelanjutan, kawasan ini mengajak para wisatawan dari berbagai belahan dunia untuk menyaksikan langsung siklus hidup kuno hutan hujan tropis purba, berkontribusi aktif dalam memitigasi kerusakan ekosistem yang terancam punah, serta mengadopsi sekaligus menghargai ritme kearifan lokal kehidupan masyarakat yang menetap di sepanjang tepian daerah aliran Sungai Bahorok.
                    </p>
                </div>
            </div>

            <!-- KOLOM KANAN: SEJARAH & REHABILITASI ORANGUTAN -->
            <div class="col-md-6">
                <div class="card h-100 border-0 bg-white shadow-sm p-4 rounded-3 border-start border-4 border-success">
                    <h5 class="fw-bold text-dark mb-3 d-flex align-items-center">
                        <span class="me-2">📜</span> Warisan Sejarah Panjang & Pusat Rehabilitasi (Sejak 1973)
                    </h5>
                    <p class="text-muted mb-0" style="line-height: 1.8; font-size: 1.05rem; text-align: justify;">
                        Silsilah ekowisata di kawasan ini berakar kuat sejak tahun <strong>1973</strong>, ketika sepasang ahli zoologi berkebangsaan Swiss, Monica Borner Regina and Regina Frey, memprakarsai berdirinya pusat rehabilitasi orangutan resmi. Fokus utama dari proyek monumental tersebut adalah melakukan proses karantina, perawatan medis, dan pelatihan intensif bagi Orangutan Sumatra (<em>Pongo abelii</em>) korban eksploitasi maupun peliharaan ilegal agar mereka mampu mengembalikan insting liar dan bertahan hidup secara mandiri sebelum dilepasliarkan kembali ke habitat aslinya. Seiring berjalannya dekade, fondasi konservasi yang kokoh ini berhasil mentransformasi sebuah desa terpencil menjadi kiblat ekowisata berbasis komunitas (*community-based ecotourism*) berskala internasional, yang secara harmonis menjembatani pelestarian satwa liar dengan pemberdayaan ekonomi masyarakat setempat.
                    </p>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('guides.index') }}" class="btn btn-success fw-bold px-4 rounded-pill btn-sm py-2 shadow-sm transition-transform" style="letter-spacing: 0.3px;">
                Buka Panduan Perjalanan Eksklusif 🗺️
            </a>
        </div>
    </div>
</section>

<!-- SECTION PENGALAMAN (EXPERIENCE CAROUSEL) -->
<section id="experience" class="section-padding bg-light py-5">
    <div class="container py-2">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <p class="text-uppercase fw-bold text-success mb-2 small" style="letter-spacing: 1px;">
                    📸 Diabadikan Oleh Penjelajah
                </p>
                <h2 class="fw-bold mb-3 text-dark tracking-tight" style="letter-spacing: -0.5px;">
                    Perjalanan Visual Menembus Belantara
                </h2>
                <p class="text-muted small leading-relaxed" style="text-align: justify; line-height: 1.7;">
                    Saksikan lembar dokumentasi orisinal yang merekam keindahan autentik Bukit Lawang langsung dari sudut pandang para penjelajah dunia. Kolase visual ini merangkum tiga pilar utama ekowisata kami: kehangatan interaksi satwa endemik di bawah kanopi fajar, derasnya tantangan jeram Sungai Bahorok, serta fragmen petualangan magis yang terekam nyata. Gulirkan gambar untuk melihat detail momentum epik di setiap sudut surga hijau Sumatra.
                </p>
                <a href="{{ route('destinations.index') }}" class="btn btn-success fw-bold px-4 rounded-pill shadow-sm btn-sm py-2 mt-2">
                    Lihat Pengalaman Wisata ➡️
                </a>
            </div>

            <div class="col-lg-7">
                <div id="experienceCarousel" class="carousel slide shadow rounded-4 overflow-hidden border" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @forelse($experience_galleries as $index => $gallery)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $gallery->file_path) }}" class="d-block w-100" style="height: 400px; object-fit: cover;" alt="{{ $gallery->caption ?? 'Foto Pengalaman' }}">
                                @if($gallery->caption)
                                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded py-2 px-3">
                                        <p class="mb-0 fw-semibold text-white small">{{ $gallery->caption }}</p>
                                    </div>
                                @endif
                            </div>
                        @empty
                            <div class="carousel-item active">
                                <img src="https://images.unsplash.com/photo-1540573133985-87b6da6d54a9?q=80&w=1200" class="d-block w-100" style="height: 400px; object-fit: cover;" alt="Gambar Default 1">
                            </div>
                            <div class="carousel-item">
                                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1200" class="d-block w-100" style="height: 400px; object-fit: cover;" alt="Gambar Default 2">
                            </div>
                        @endforelse
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#experienceCarousel" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span></button>
                    <button class="carousel-control-next" type="button" data-bs-target="#experienceCarousel" data-bs-slide="next"><span class="carousel-control-next-icon"></span></button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION PAKET WISATA (JOURNEY) -->
<section id="journey" class="section-padding py-5 bg-white">
    <div class="container py-2">
        <div class="text-center mb-5">
            <p class="text-uppercase fw-bold text-success mb-2 small" style="letter-spacing: 1px;">
                🌿 Rencana Perjalanan Wisata
            </p>
            <h2 class="fw-bold text-dark tracking-tight" style="letter-spacing: -0.5px;">Pilih Gaya Petualangan Anda</h2>
            <p class="text-muted small">Setiap rute dirancang secara komprehensif guna memberikan pengalaman ekowisata terbaik sesuai ketersediaan waktu Anda.</p>
        </div>

        <div class="row g-4">
            <!-- PAKET 1 HARI -->
            <div class="col-lg-4">
                <div class="card shadow border-0 h-100 rounded-4 border border-light travel-card">
                    <div class="card-body p-4 d-flex flex-column">
                        <h3 class="h5 fw-bold text-dark mb-2">⏱️ Paket Kilat (1-Day Trip)</h3>
                        <span class="badge bg-success-subtle text-success border border-success border-opacity-25 align-self-start mb-3 px-2 py-1 rounded">Eksplorasi Singkat</span>
                        <hr class="opacity-25 my-2">
                        <p class="small text-muted mb-4" style="text-align: justify; line-height: 1.6;">
                            Dirancang khusus bagi wisatawan dengan keterbatasan waktu lapangan namun tetap ingin merasakan esensi utama belantara Sumatra. Paket efisien ini mengoptimalkan lini masa kunjungan untuk mencakup poin-poin krusial dalam satu hari penuh tanpa mengorbankan keamanan.
                        </p>
                        <div class="mt-auto">
                            <h6 class="fw-bold text-dark small mb-2">Aktivitas Utama:</h6>
                            <ul class="list-unstyled small text-muted mb-0 class-gap-1">
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Jungle Trekking Durasi 3-4 Jam</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Pengamatan Orangutan Sumatra</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Tradisional River Tubing Sungai Bahorok</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Pemandu Wisata (Guide) Berlisensi</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PAKET 2D1N -->
            <div class="col-lg-4">
                <div class="card shadow border-0 h-100 rounded-4 border border-light travel-card border-start border-4 border-success">
                    <div class="card-body p-4 d-flex flex-column">
                        <h3 class="h5 fw-bold text-success mb-2">🛶 Paket Populer (2D1N Tour)</h3>
                        <span class="badge bg-warning-subtle text-warning-emphasis border border-warning border-opacity-25 align-self-start mb-3 px-2 py-1 rounded">Paling Direkomendasikan</span>
                        <hr class="opacity-25 my-2">
                        <p class="small text-muted mb-4" style="text-align: justify; line-height: 1.6;">
                            Opsi ideal yang menyeimbangkan antara aktivitas petualangan fisik belantara dengan kenyamanan relaksasi. Wisatawan diajak untuk merasakan transisi eksotisme suasana hutan hujan tropis dari siang hingga malam hari dengan akomodasi penginapan yang representatif.
                        </p>
                        <div class="mt-auto">
                            <h6 class="fw-bold text-dark small mb-2">Aktivitas & Fasilitas:</h6>
                            <ul class="list-unstyled small text-muted mb-0 class-gap-1">
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Edukasi Konservasi & Tracking Mendalam</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Menginap 1 Malam di Ecoresort Pilihan</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Makan Malam Tradisional & Sarapan</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Pengamatan Satwa Nokturnal Terpandu</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PAKET 3D2N -->
            <div class="col-lg-4">
                <div class="card shadow border-0 h-100 rounded-4 border border-light travel-card">
                    <div class="card-body p-4 d-flex flex-column">
                        <h3 class="h5 fw-bold text-dark mb-2">🐆 Paket Penyintas (3D2N Survival)</h3>
                        <span class="badge bg-danger-subtle text-danger border border-danger border-opacity-25 align-self-start mb-3 px-2 py-1 rounded">Pencinta Alam Murni</span>
                        <hr class="opacity-25 my-2">
                        <p class="small text-muted mb-4" style="text-align: justify; line-height: 1.6;">
                            Diformulasikan secara mendalam bagi para backpacker sejati, peneliti, maupun pencinta alam murni yang ingin merasakan esensi bertahan hidup di dalam hutan. Paket ini menawarkan ekspedisi total menyusuri area lindung terdalam yang jarang terjamah oleh wisatawan umum.
                        </p>
                        <div class="mt-auto">
                            <h6 class="fw-bold text-dark small mb-2">Aktivitas & Fasilitas:</h6>
                            <ul class="list-unstyled small text-muted mb-0 class-gap-1">
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Navigasi & Jungle Survival Course</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Camping Ground di Tengah Belantara Leuser</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Manajemen Logistik Berkelanjutan</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Identifikasi Flora Medis & Fauna Langka</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('itinerary.index') }}" class="btn btn-success btn-lg fw-bold px-4 rounded-pill shadow-sm">
                Jelajahi Semua Jadwal Perjalanan
            </a>
        </div>
    </div>
</section>

<!-- SECTION PENGINAPAN (VILLA) -->
<section id="villa" class="section-padding bg-dark text-white py-5">
    <div class="container py-3">
        <div class="text-center mb-5">
            <p class="text-uppercase fw-bold text-success mb-2 small" style="letter-spacing: 1px;">
                🌲 Hidup Harmonis dengan Alam
            </p>
            <h2 class="display-5 fw-bold text-white">Villa Etalauser Ecoresort</h2>
            <p class="lead text-light text-opacity-75 small">Pengalaman menginap ramah lingkungan di tepi Sungai Bahorok yang memadukan kemurnian ekosistem tropis Leuser langsung dari jendela kamar Anda, tanpa kehilangan harmoni fasilitas modern yang autentik.</p>
        </div>

        <div class="row align-items-center g-5">
            <!-- KOLOM KIRI: VISUAL UTAMA VILLA -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="https://q-xx.bstatic.com/xdata/images/hotel/max1024x768/451840137.jpg?k=aab6ab8f1a5f8f0cb19a4a64798cc0953da4b2f137b157ccfd441e0024f9f910&o=&s=1024x" class="img-fluid rounded-4 shadow-lg" alt="Tampak depan Villa Etalauser Resort front view">
            </div>

            <!-- KOLOM KANAN: HIGHLIGHT 4 FASILITAS UNGGULAN -->
            <div class="col-lg-6">
                <div class="row g-3 mb-4">
                    <!-- FASILITAS 1: KAMAR NATURAL -->
                    <div class="col-6">
                        <div class="p-3 border border-white border-opacity-10 rounded-4 bg-white bg-opacity-10 h-100 shadow-sm" style="backdrop-filter: blur(4px);">
                            <span class="d-block fw-bold text-success mb-1">🛏️ Kamar &amp; Villa Natural</span>
                            <p class="text-white-50 small mb-0" style="font-size: 11px; line-height: 1.5; text-align: justify;">
                                Unit penginapan berkonsep arsitektur semi-terbuka menggunakan material organik alami, namun tetap menjamin kenyamanan istirahat standar resort.
                            </p>
                        </div>
                    </div>

                    <!-- FASILITAS 2: KANTIN JUNGLE BAMBU -->
                    <div class="col-6">
                        <div class="p-3 border border-white border-opacity-10 rounded-4 bg-white bg-opacity-10 h-100 shadow-sm" style="backdrop-filter: blur(4px);">
                            <span class="d-block fw-bold text-success mb-1">🎋 Kantin Bertema Hutan</span>
                            <p class="text-white-50 small mb-0" style="font-size: 11px; line-height: 1.5; text-align: justify;">
                                Area restoran dan tempat bersantai komunal yang dirancang estetis penuh ornamen bambu tradisional dengan atmosfer lanskap hutan hujan tropis.
                            </p>
                        </div>
                    </div>

                    <!-- FASILITAS 3: AKSES SUNGAI -->
                    <div class="col-6">
                        <div class="p-3 border border-white border-opacity-10 rounded-4 bg-white bg-opacity-10 h-100 shadow-sm" style="backdrop-filter: blur(4px);">
                            <span class="d-block fw-bold text-success mb-1">🌊 Akses Sungai Dekat</span>
                            <p class="text-white-50 small mb-0" style="font-size: 11px; line-height: 1.5; text-align: justify;">
                                Lokasi strategis tepat di bibir daerah aliran Sungai Bahorok, memudahkan wisatawan menjangkau area aktivitas air hanya dalam beberapa langkah kaki.
                            </p>
                        </div>
                    </div>

                    <!-- FASILITAS 4: KONEKTIVITAS INTERNET -->
                    <div class="col-6">
                        <div class="p-3 border border-white border-opacity-10 rounded-4 bg-white bg-opacity-10 h-100 shadow-sm" style="backdrop-filter: blur(4px);">
                            <span class="d-block fw-bold text-success mb-1">🌐 Jaringan Internet Stabil</span>
                            <p class="text-white-50 small mb-0" style="font-size: 11px; line-height: 1.5; text-align: justify;">
                                Infrastruktur jaringan Wi-Fi yang merata dan terjangkau di area publik penginapan untuk mendukung kebutuhan komunikasi digital Anda.
                            </p>
                        </div>
                    </div>
                </div>

                <a href="{{ route('villa') }}" class="btn btn-success fw-bold px-4 rounded-pill shadow-sm">
                    Telusuri Area Resort Selengkapnya
                </a>
            </div>
        </div>
    </div>
</section>

<!-- SECTION JELAJAH (DISCOVER CAROUSEL) -->
<section id="discover" class="section-padding bg-light py-5 border-bottom">
    <div class="container">
        <div class="text-center mb-5">
            <p class="text-uppercase fw-bold text-success mb-2 small" style="letter-spacing: 1px;">
                🗺️ Menyingkap Keindahan Bukit Lawang
            </p>
            <h2 class="display-5 fw-bold text-dark tracking-tight" style="letter-spacing: -1px;">Jelajahi Sudut Surga Tersembunyi</h2>
            <p class="lead text-muted small mx-auto" style="max-width: 750px;">Yuk jelajahi sudut-sudut surga tersembunyi yang masih asri, mulai dari tenangnya aliran sungai berbatu hingga magisnya suasana gua alami di sekitar Bukit Lawang.</p>
        </div>

        <div id="discoverCarousel" class="carousel slide shadow rounded-4 overflow-hidden" data-bs-ride="carousel">
            <!-- CAROUSEL INDICATORS -->
            <div class="carousel-indicators">
                @forelse($discover_galleries as $index => $gallery)
                    <button type="button" data-bs-target="#discoverCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}">
                    </button>
                @empty
                    <button type="button" data-bs-target="#discoverCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#discoverCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                @endforelse
            </div>

            <!-- CAROUSEL CONTENT -->
            <div class="carousel-inner">
                @forelse($discover_galleries as $index => $gallery)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $gallery->file_path) }}" class="d-block w-100" style="height:500px; object-fit:cover;" alt="{{ $gallery->caption ?? 'Jelajahi Destinasi Bukit Lawang' }}">
                        @if($gallery->caption)
                            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded px-3 py-2">
                                <h3 class="text-white fs-4 mb-1">{{ $gallery->caption }}</h3>
                                <p class="text-white-50 small mb-0">Dokumentasi destinasi alternatif terbaik di kawasan Bukit Lawang.</p>
                            </div>
                        @endif
                    </div>
                @empty
                    {{-- DATA DEFAULT 1: LANDAK RIVER --}}
                    <div class="carousel-item active">
                        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1200" class="d-block w-100" style="height:500px; object-fit:cover;" alt="Landak River Adventure">
                        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded px-3 py-2">
                            <h3 class="text-white fs-4 mb-1">Jernihnya Aliran Landak River</h3>
                            <p class="text-white-50 small mb-0">Temukan kedamaian di tepi sungai berbatu yang tenang, jauh dari hiruk-pikuk perkotaan.</p>
                        </div>
                    </div>
                    {{-- DATA DEFAULT 2: GUA KELELAWAR --}}
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1516026672322-bc52d61a55d5?q=80&w=1200" class="d-block w-100" style="height:500px; object-fit:cover;" alt="Gua Kelelawar Bukit Lawang">
                        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded px-3 py-2">
                            <h3 class="text-white fs-4 mb-1">Misteri Ornamen Gua Kelelawar</h3>
                            <p class="text-white-50 small mb-0">Petualangan seru menyusuri indahnya stalaktit alami di dalam ruang bawah tanah purba.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- CAROUSEL CONTROLS -->
            <button class="carousel-control-prev" type="button" data-bs-target="#discoverCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Sebelumnya</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#discoverCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Selanjutnya</span>
            </button>
        </div>
    </div>
</section>

<!-- SECTION KONTAK -->
<section class="section-padding bg-white py-5 border-top">
    <div class="container text-center py-3">
        <p class="text-uppercase fw-bold text-success mb-2 small" style="letter-spacing: 1.5px;">📞 Hubungi Kami</p>
        <h2 class="fw-bold mb-4 text-dark tracking-tight" style="letter-spacing: -0.5px;">Informasi Kontak & Layanan</h2>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8 text-muted">
                <div class="d-flex flex-column gap-3 justify-content-center align-items-center fs-6">
                    <p class="mb-0">
                        <i class="bi bi-geo-alt-fill text-success me-2"></i> <strong>Lokasi:</strong> Kecamatan Bahorok, Kabupaten Langkat, Sumatera Utara, Indonesia
                    </p>
                    <p class="mb-0">
                        <i class="bi bi-envelope-fill text-success me-2"></i> <strong>Email:</strong> <a href="mailto:support@etalauser-resort.com" class="text-success text-decoration-none fw-semibold border-bottom border-success border-opacity-25 pb-1">support@etalauser-resort.com</a>
                    </p>
                    <p class="mb-0">
                        <i class="bi bi-whatsapp text-success me-2"></i> <strong>Layanan Informasi:</strong> <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" class="text-success text-decoration-none fw-semibold border-bottom border-success border-opacity-25 pb-1">+62 812-xxxx-xxxx</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION FOOTER -->
<footer class="bg-dark text-white-50 py-5 border-top border-secondary border-opacity-25">
    <div class="container text-center">
        <!-- Brand & Slogan -->
        <h5 class="text-white fw-bold mb-2">Smart Tourism Hub Bukit Lawang</h5>
        <p class="mb-4 small text-white-50 tracking-wide">Eksplorasi Hutan Hujan Purba • Konservasi Satwa • Petualangan Ekowisata</p>

        <!-- Penambahan Quick Links Demi Standardisasi UI/UX (Heuristic Evaluation) -->
        <div class="d-flex justify-content-center flex-wrap gap-4 mb-4" style="font-size: 13px;">
            <a href="#about" class="text-white-50 text-decoration-none hover-white">Tentang</a>
            <a href="#experience" class="text-white-50 text-decoration-none hover-white">Pengalaman</a>
            <a href="#journey" class="text-white-50 text-decoration-none hover-white">Paket Itinerary</a>
            <a href="#villa" class="text-white-50 text-decoration-none hover-white">Resort &amp; Villa</a>
            <a href="#discover" class="text-white-50 text-decoration-none hover-white">Galeri</a>
        </div>

        <hr class="mx-auto my-4 opacity-10" style="max-width: 250px;">

        <!-- Informasi Hak Cipta Dinamis Berbasis Waktu Server Laravel -->
        <p class="mb-0 text-muted" style="font-size: 11px; letter-spacing: 0.5px;">
            &copy; {{ date('Y') }} Smart Tourism Hub. Hak Cipta Dilindungi Undang-Undang.
        </p>
    </div>
</footer>

<style>
    /* Transisi Halus pada Link Footer */
    .hover-white {
        transition: color 0.2s ease-in-out;
    }
    .hover-white:hover {
        color: #ffffff !important;
    }
</style>
@endsection
