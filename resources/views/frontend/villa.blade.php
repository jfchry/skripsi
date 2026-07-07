@extends('layouts.frontend')

@section('content')
<!-- 1. HERO SECTION (Layout Premium Dua Kolom Khusus Villa) -->
<section class="text-white border-bottom" style="padding-top: 5.5rem !important; padding-bottom: 3rem !important; background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)), url('https://images.unsplash.com/photo-1571896349842-33c89424de2d?q=80&w=1200') no-repeat center center !important; background-size: cover !important;">
    <div class="container py-4">
        <div class="row align-items-center">

            <!-- Kolom Kiri: Judul Utama -->
            <div class="col-lg-7">
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb small mb-0 bg-transparent p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}" class="text-white text-decoration-none fw-bold">🏠 Home</a>
                        </li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">Villa & Services</li>
                    </ol>
                </nav>

                <p class="text-uppercase fw-bold text-success mb-2 tracking-wider small">
                    Smart Tourism Platform • Hospitality Hub
                </p>

                <h1 class="display-3 fw-bold text-white tracking-tight">
                    Villa Etalauser Ecoresort
                </h1>

                <p class="lead text-white-75 mt-3 fs-5" style="max-width: 650px;">
                    Eco-friendly accommodation & adventure services terintegrasi tepat di jantung kenyamanan alam liar kawasan Bukit Lawang.
                </p>

                <div class="d-flex flex-wrap gap-2 mt-4">
                    <a href="#accommodation" class="btn btn-success btn-lg fw-bold px-4 shadow-sm">
                        🏨 Lihat Pilihan Kamar
                    </a>
                    <a href="#services" class="btn btn-outline-light btn-lg fw-bold px-4">
                        🛠️ Layanan & Aktivitas
                    </a>
                </div>
            </div>

            <!-- Kolom Kanan: Quick Info Card Khas Villa -->
            <div class="col-lg-5 d-none d-lg-block">
                <div class="p-4 bg-success bg-opacity-10 rounded-4 border border-success border-opacity-10 shadow-sm" style="backdrop-filter: blur(4px);">
                    <h5 class="fw-bold text-success mb-2">🌿 Informasi Check-In</h5>
                    <p class="small text-white mb-3">Nikmati jaminan layanan akomodasi ramah lingkungan terbaik dengan ketentuan standar berikut:</p>
                    <div class="d-flex flex-column gap-2 small">
                        <div class="d-flex align-items-start gap-2 text-white">
                            <span>🔑</span>
                            <div><strong>Waktu:</strong> Standard Check-In dimulai pukul 14.00 WIB, dan Check-Out maksimal pukul 12.00 WIB.</div>
                        </div>
                        <div class="d-flex align-items-start gap-2 text-white">
                            <span>🌱</span>
                            <div><strong>Eco-Policy:</strong> Pengurangan sampah plastik sekali pakai, disarankan membawa botol minum (*tumbler*) sendiri.</div>
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
                <img src="https://images.unsplash.com/photo-1540555700478-4be289fbecef?q=80&w=800" class="img-fluid rounded-4 shadow-sm border" alt="Villa Etalauser Exterior">
            </div>
            <div class="col-lg-6">
                <span class="text-success fw-bold text-uppercase tracking-wider small" style="font-size: 11px;">Smart Tourism & Sustainable Stay</span>
                <h2 class="fw-bold text-dark my-2 display-6" style="letter-spacing: -0.5px;">Harmonizing Comfort with Nature</h2>
                <p class="text-muted small leading-relaxed" style="text-align: justify; line-height: 1.8;">
                    Villa Etalauser Ecoresort menyediakan pengalaman menginap yang nyaman dan berorientasi alam bagi para wisatawan yang berkunjung ke Bukit Lawang dan Taman Nasional Gunung Leuser. Kami mengusung konsep pariwisata berkelanjutan, meminimalkan dampak lingkungan negatif, sekaligus memaksimalkan kenyamanan Anda menikmati panorama alam tropis Sumatera Utara yang autentik.
                </p>
                <div class="row g-3 mt-2">
                    <div class="col-sm-6">
                        <h5 class="fw-bold text-dark h6 mb-1">🌲 Eco-Friendly Approach</h5>
                        <p class="small text-muted mb-0">Pengelolaan akomodasi hijau di sekitar kawasan konservasi leuser.</p>
                    </div>
                    <div class="col-sm-6">
                        <h5 class="fw-bold text-dark h6 mb-1">🗺️ Strategic Location</h5>
                        <p class="small text-muted mb-0">Akses terbaik ke tepi sungai dan jalur masuk kawasan satwa liar.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. SERVICES SECTION -->
<section id="services" class="py-5 bg-dark text-white">
    <div class="container py-3">
        <div class="text-center mb-5">
            <span class="text-success fw-bold small text-uppercase tracking-wider">Adventure & Convenience</span>
            <h2 class="fw-bold text-white mt-1">Exclusive Services & Activities</h2>
            <p class="text-white-50 mx-auto small mt-2" style="max-width: 600px;">Lengkapi petualangan Anda di Bukit Lawang dengan deretan layanan terintegrasi langsung dari kami.</p>
        </div>

        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="p-4 rounded-4 bg-secondary bg-opacity-10 h-100 border border-secondary border-opacity-25 shadow-sm">
                    <div class="fs-1 mb-3">🦧</div>
                    <h4 class="fw-bold text-success h5">Jungle Trekking</h4>
                    <p class="small text-white-50 mb-0">Petualangan menjelajahi Taman Nasional Gunung Leuser bersama pemandu tersertifikasi untuk melihat Orangutan langsung di habitat aslinya.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded-4 bg-secondary bg-opacity-10 h-100 border border-secondary border-opacity-25 shadow-sm">
                    <div class="fs-1 mb-3">🚣</div>
                    <h4 class="fw-bold text-success h5">Tube Rafting</h4>
                    <p class="small text-white-50 mb-0">Merasakan sensasi arus jeram Sungai Bahorok menggunakan ban karet (*river tubing*) tradisional yang aman dan menyenangkan sebagai penutup rute trekking.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded-4 bg-secondary bg-opacity-10 h-100 border border-secondary border-opacity-25 shadow-sm">
                    <div class="fs-1 mb-3">🚐</div>
                    <h4 class="fw-bold text-success h5">Airport Shuttle</h4>
                    <p class="small text-white-50 mb-0">Layanan penjemputan dan pengantaran privat yang nyaman langsung dari Bandara Internasional Kualanamu atau Kota Medan menuju Bukit Lawang.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. ACCOMMODATION LIST SECTION -->
<section id="accommodation" class="py-5 bg-light border-bottom">
    <div class="container py-3">
        <div class="text-center mb-5">
            <span class="text-success fw-bold small text-uppercase tracking-wider">Accommodations</span>
            <h2 class="fw-bold text-dark mt-1">Our Cabins & Villas</h2>
            <p class="text-muted mx-auto small mt-2" style="max-width: 600px;">Detail rincian tipe kamar, kapasitas rombongan, serta fasilitas lengkap untuk kenyamanan bermalam Anda.</p>
        </div>

        
        <div class="row g-4">
            @foreach($room_services as $room)
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden travel-card border border-light">
                        <div class="position-relative">
                            <img src="{{ asset('storage/' . $room->icon_url) }}" class="card-img-top" style="height: 220px; object-fit: cover;" alt="{{ $room->service_name }}">
                            <span class="position-absolute top-0 end-0 bg-success text-white px-3 py-1.5 m-3 fw-bold rounded-pill small shadow-sm" style="font-size: 11px;">
                                Rp{{ number_format($room->price, 0, ',', '.') }} / night
                            </span>
                        </div>
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <h4 class="fw-bold text-dark mb-3 h5">{{ $room->service_name }}</h4>
                                <div class="text-muted small" style="text-align: justify; line-height: 1.6;">
                                    {!! nl2br(e($room->description)) !!}
                                </div>
                            </div>
                            <div class="mt-4">
                                <hr class="opacity-25">
                                <a href="https://wa.me/6281234567890?text=Halo%20Villa%20Etalauser,%20saya%20ingin%20bertanya%20ketersediaan%20Tipe%20Kamar%20{{ urlencode($room->service_name) }}" target="_blank" class="btn btn-outline-success btn-sm py-2 w-100 fw-bold rounded-pill">
                                    💬 Booking via WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
                                🌐 <strong>Free Wi-Fi Area</strong>
                                <span class="d-block text-white-50 small mt-1" style="font-size: 11px;">Akses internet andalan di area publik resort.</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 rounded-3 bg-white bg-opacity-10 small h-100">
                                ☕ <strong>Riverside Restaurant</strong>
                                <span class="d-block text-white-50 small mt-1" style="font-size: 11px;">Menu hidangan lezat santai tepat di bibir Sungai Bahorok.</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 rounded-3 bg-white bg-opacity-10 small h-100">
                                🤝 <strong>Certified Local Guides</strong>
                                <span class="d-block text-white-50 small mt-1" style="font-size: 11px;">Jaringan pemandu lokal resmi terpercaya.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- 5. RESORT GALLERY SECTION (Terfilter Murni Milik Kamar/Kabin) -->
<section class="py-5 bg-light">
    <div class="container py-2">
        <div class="text-center mb-5">
            <span class="text-success fw-bold small text-uppercase tracking-wider">Captured Moments</span>
            <h2 class="fw-bold text-dark mt-1">Resort Gallery & Facilities</h2>
            <p class="text-muted mx-auto small mt-2" style="max-width: 600px;">
                Murni menyuguhkan jajaran dokumentasi orisinal khusus tata ruang fasilitas kamar, struktur kabin, dan lanskap internal ecoresort.
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

<!-- 6. 🌟 BARU: GOOGLE MAPS REVIEWS MOCKUP SECTION -->
<section class="py-5 bg-white border-bottom">
    <div class="container py-2">
        <div class="text-center mb-5">
            <span class="text-primary fw-bold small text-uppercase tracking-wider">Testimonials</span>
            <h2 class="fw-bold text-dark mt-1">What Guests Say on Google Reviews</h2>
            <p class="text-muted mx-auto small mt-2" style="max-width: 500px;">Ulasan autentik bintang 5 langsung dari para pengunjung internasional maupun lokal.</p>
        </div>

        <div class="row g-4">
            <!-- Review 1 -->
            <div class="col-md-4">
                <div class="p-4 rounded-4 bg-light shadow-sm h-100 border border-light">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=100" class="rounded-circle shadow-sm" style="width: 45px; height: 45px; object-fit: cover;" alt="Reviewer">
                        <div>
                            <h6 class="fw-bold text-dark mb-0 small">Sarah Jenkins</h6>
                            <span class="text-muted" style="font-size: 11px;">Google Local Guide • 2 weeks ago</span>
                        </div>
                    </div>
                    <div class="text-warning small mb-2">⭐⭐⭐⭐⭐</div>
                    <p class="text-muted small mb-0" style="text-align: justify; line-height: 1.6;">
                        "An absolute paradise! The cabins are very clean and the riverside restaurant is incredible. Getting to see orangutans and then arriving back at the villa via tubing was an unforgettable experience!"
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
                            <span class="text-muted" style="font-size: 11px;">Wisatawan Domestik • 1 month ago</span>
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
                            <span class="text-muted" style="font-size: 11px;">Backpacker Germany • 3 d ago</span>
                        </div>
                    </div>
                    <div class="text-warning small mb-2">⭐⭐⭐⭐⭐</div>
                    <p class="text-muted small mb-0" style="text-align: justify; line-height: 1.6;">
                        "Best eco-resort in Bukit Lawang! The certified local guides here are very professional. They helped us customize our 2D1N jungle trekking perfectly. Will definitely come back next year."
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 7. LOCATION & MAPS SECTION -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <h3 class="fw-bold text-dark tracking-tight">Lokasi & Kontak Villa</h3>
                <p class="text-muted small leading-relaxed">Terintegrasi langsung ke pusat informasi Bukit Lawang untuk memudahkan perencanaan rute transportasi logistik Anda.</p>
                <hr class="opacity-25">
                <p class="mb-2 text-muted small"><strong class="text-dark">📍 Alamat:</strong> Kawasan Wisata Bukit Lawang, Kecamatan Bahorok, Kabupaten Langkat, Sumatera Utara.</p>
                <p class="mb-2 text-muted small"><strong class="text-dark">📞 Telepon/WA:</strong> +62 812-3456-7890</p>
                <p class="mb-4 text-muted small"><strong class="text-dark">✉️ E-mail:</strong> info@villaetalauser.com</p>

                <div class="d-flex flex-wrap gap-2">
                    <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-success fw-bold px-4 btn-sm rounded-pill">
                        💬 Hubungi Layanan Pelanggan
                    </a>
                    <a href="https://www.google.com/maps/place/etalauser+ecoresort/data=!4m2!3m1!1s0x3030b930cf99845f:0x80e722404e97ef62?sa=X&ved=1t:242&ictx=111" target="_blank" class="btn btn-outline-primary fw-bold px-4 btn-sm rounded-pill">
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

<!-- 8. CUSTOM ANIMATION STYLE -->
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
