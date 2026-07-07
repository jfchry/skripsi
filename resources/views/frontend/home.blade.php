@extends('layouts.frontend')

@section('content')
if()
<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark bg-opacity-75">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            Bukit Lawang
        </a>

        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#experience">Experience</a></li>
                <li class="nav-item"><a class="nav-link" href="#journey">Journey</a></li>
                <li class="nav-item"><a class="nav-link" href="#villa">Villa</a></li>
                <li class="nav-item"><a class="nav-link" href="#discover">Discover</a></li>
                
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
                                <a class="dropdown-menu-item dropdown-item" href="{{ route('admin.dashboard') }}">
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

<section class="hero py-5 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <p class="text-uppercase fw-bold text-success mb-2 small" style="letter-spacing: 1.5px;">
                            🌿 Your Ultimate Eco-Adventure Gateway
                        </p>
                        <h1 class="display-2 fw-bold text-white tracking-tight" style="letter-spacing: -1.5px; line-height: 1.1;">
                            Where the Wild Rainforest Meets Your Soul
                        </h1>
                        <p class="lead mt-4 text-white fs-5" style="line-height: 1.7; text-align: justify;">
                            Step into the untamed beauty of Gunung Leuser National Park. Encounter magnificent orangutans in their natural habitat, conquer the thrills of wild river tubing, and forge unforgettable memories in the heart of Sumatra's greenest paradise.
                        </p>
                        <a href="{{ route('destinations.index') }}" class="btn btn-success btn-lg mt-3 fw-bold shadow-sm px-4 rounded-pill">
                            Start Your Journey Now ➡️
                        </a>
                    </div>
                </div>
</section>

<section id="about" class="section-padding py-5">
    <div class="container text-center py-3">
        <h2 class="fw-bold mb-4 text-dark display-6" style="letter-spacing: -0.5px;">
            The Sacred Sanctuary of Sumatra's Wildlife
        </h2>
        <p class="lead mx-auto text-muted" style="max-width: 800px; line-height: 1.8; font-size: 1.1rem;">
            Bukit Lawang is not just a destination; it is the ultimate living frontier where global conservation meets raw, unbridled adventure. Nestled on the edge of the legendary Gunung Leuser National Park, this iconic haven invites you to witness the ancient cycle of the rainforest, protect endangered ecosystems, and immerse yourself in the authentic rhythm of riverside life.
        </p>
        <a href="{{ route('guides.index') }}" class="btn btn-outline-success mt-3 fw-bold px-4 rounded-pill btn-sm py-2 shadow-sm">
            Unlock the Insider Travel Guide 🗺️
        </a>
    </div>
</section>

<section id="experience" class="section-padding bg-light py-5">
    <div class="container py-2">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <p class="text-uppercase fw-bold text-success mb-2 small" style="letter-spacing: 1px;">
                    📸 Captured By Explorers
                </p>
                <h2 class="fw-bold mb-3 text-dark tracking-tight" style="letter-spacing: -0.5px;">
                    Visual Journeys Through the Wild
                </h2>
                <p class="text-muted small leading-relaxed" style="text-align: justify; line-height: 1.7;">
                    Saksikan lembar dokumentasi orisinal langsung dari sudut pandang para penjelajah dunia. Mulai dari kehangatan interaksi satwa di bawah kanopi hutan hujan purba, jernihnya riak jeram Bahorok, hingga fragmen petualangan magis yang terekam nyata di setiap sudut Bukit Lawang.
                </p>
                <a href="{{ route('destinations.index') }}" class="btn btn-success fw-bold px-4 rounded-pill shadow-sm btn-sm py-2 mt-2">
                    Explore Experiences ➡️
                </a>
            </div>

            <div class="col-lg-7">
                <div id="experienceCarousel" class="carousel slide shadow rounded-4 overflow-hidden border" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @forelse($experience_galleries as $index => $gallery)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $gallery->file_path) }}"
                                     class="d-block w-100"
                                     style="height: 400px; object-fit: cover;"
                                     alt="{{ $gallery->caption ?? 'Foto Experience' }}">

                                @if($gallery->caption)
                                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded py-2 px-3">
                                        <p class="mb-0 fw-semibold text-white small">{{ $gallery->caption }}</p>
                                    </div>
                                @endif
                            </div>
                        @empty
                            <div class="carousel-item active">
                                <img src="https://images.unsplash.com/photo-1540573133985-87b6da6d54a9?q=80&w=1200" class="d-block w-100" style="height: 400px; object-fit: cover;" alt="Default 1">
                            </div>
                            <div class="carousel-item">
                                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1200" class="d-block w-100" style="height: 400px; object-fit: cover;" alt="Default 2">
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

<section id="journey" class="section-padding py-5 bg-white">
    <div class="container py-2">
        <div class="text-center mb-5">
            <p class="text-uppercase fw-bold text-success mb-2 small" style="letter-spacing: 1px;">
                🌿 Tailored Expeditions
            </p>
            <h2 class="fw-bold text-dark tracking-tight" style="letter-spacing: -0.5px;">Choose Your Adventure Style</h2>
            <p class="text-muted small">Setiap rute dirancang untuk memberikan pengalaman terbaik sesuai ketersediaan waktu Anda.</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card shadow border-0 h-100 rounded-4 border border-light">
                    <div class="card-body p-4">
                        <h3 class="h5 fw-bold text-dark mb-3">⏱️ Efficient 1-Day Trip</h3>
                        <hr class="opacity-25">
                        <p class="small text-muted mb-0" style="text-align: justify; line-height: 1.6;">
                            Cocok untuk kunjungan kilat terencana. Mengoptimalkan waktu lapangan yang terbatas untuk mencakup poin esensial utama mulai dari trekking cepat hingga river tubing langsung.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow border-0 h-100 rounded-4 border border-light">
                    <div class="card-body p-4">
                        <h3 class="h5 fw-bold text-success mb-3">🛶 Balanced 2D1N Tour</h3>
                        <hr class="opacity-25">
                        <p class="small text-muted mb-0" style="text-align: justify; line-height: 1.6;">
                            Pilihan paling direkomendasikan untuk menyeimbangkan petualangan rimba dan kenyamanan istirahat. Merasakan eksotisme malam hutan hujan tanpa kelelahan fisik berlebih.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow border-0 h-100 rounded-4 border border-light">
                    <div class="card-body p-4">
                        <h3 class="h5 fw-bold text-dark mb-3">🐆 Complete 3D2N Survival</h3>
                        <hr class="opacity-25">
                        <p class="small text-muted mb-0" style="text-align: justify; line-height: 1.6;">
                            Dirancang khusus bagi pecinta alam murni dan backpacker sejati. Penjelajahan mendalam kawasan lindung, pengamatan satwa liar malam hari, dan interaksi ekosistem penuh.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('itinerary.index') }}" class="btn btn-success btn-lg fw-bold px-4 rounded-pill shadow-sm">
                Explore All Itineraries
            </a>
        </div>
    </div>
</section>

<section id="villa" class="section-padding bg-dark text-white py-5">
    <div class="container py-3">
        <div class="text-center mb-5">
            <p class="text-uppercase fw-bold text-success mb-2 small" style="letter-spacing: 1px;">
                🌲 Stay in Harmony
            </p>
            <h2 class="display-5 fw-bold text-white">Villa Etalauser Ecoresort</h2>
            <p class="lead text-light text-opacity-75 small">Escape into nature while enjoying modern comfort.</p>
        </div>

        <div class="row align-items-center g-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=1200" class="img-fluid rounded-4 shadow-lg" alt="Villa Etalauser Resort front view">
            </div>

            <div class="col-lg-6">
                <div class="row g-3 mb-4">
                <!-- Kolom 1 -->
                <div class="col-6">
                    <div class="p-3 border border-white border-opacity-10 rounded-4 bg-white bg-opacity-10 shadow-sm" style="backdrop-filter: blur(4px);">
                        <span class="d-block fw-bold text-success mb-1">🛏️ Comfortable Rooms</span>
                        <p class="text-white-50 small mb-0" style="font-size: 11px; line-height: 1.5;">Kamar bersih standar resort dengan fasilitas lengkap.</p>
                    </div>
                </div>
                <!-- Kolom 2 -->
                <div class="col-6">
                    <div class="p-3 border border-white border-opacity-10 rounded-4 bg-white bg-opacity-10 shadow-sm" style="backdrop-filter: blur(4px);">
                        <span class="d-block fw-bold text-success mb-1">🦅 Wild Nature View</span>
                        <p class="text-white-50 small mb-0" style="font-size: 11px; line-height: 1.5;">Suasana lanskap hijau leuser langsung di jendela Anda.</p>
                    </div>
                </div>
                <!-- Kolom 3 -->
                <div class="col-6">
                    <div class="p-3 border border-white border-opacity-10 rounded-4 bg-white bg-opacity-10 shadow-sm" style="backdrop-filter: blur(4px);">
                        <span class="d-block fw-bold text-success mb-1">☕ Authentic Restaurant</span>
                        <p class="text-white-50 small mb-0" style="font-size: 11px; line-height: 1.5;">Menu makanan segar khas lokal untuk memulihkan energi.</p>
                    </div>
                </div>
                <!-- Kolom 4 -->
                <div class="col-6">
                    <div class="p-3 border border-white border-opacity-10 rounded-4 bg-white bg-opacity-10 shadow-sm" style="backdrop-filter: blur(4px);">
                        <span class="d-block fw-bold text-success mb-1">🌐 Free Stable Wi-Fi</span>
                        <p class="text-white-50 small mb-0" style="font-size: 11px; line-height: 1.5;">Akses internet tanpa hambatan di area publik penginapan.</p>
                    </div>
                </div>
            </div>
                <a href="{{ route('villa') }}" class="btn btn-success fw-bold px-4 rounded-pill shadow-sm">
                    Discover The Resort
                </a>
            </div>
        </div>
    </div>
</section>

<section id="discover" class="section-padding bg-light py-5 border-bottom">
    <div class="container">
        <div class="text-center mb-5">
            <!-- Peningkatan Sub-header & Copywriting Headline -->
            <p class="text-uppercase fw-bold text-success mb-2 small" style="letter-spacing: 1px;">
                🗺️ Unveiling the Unseen
            </p>
            <h2 class="display-5 fw-bold text-dark tracking-tight" style="letter-spacing: -1px;">Beyond the Well-Trodden Paths</h2>
            <p class="lead text-muted small">Eksplorasi lebih jauh potongan surga tersembunyi dan pesona eksotis yang belum terjamah di sekitar Bukit Lawang.</p>
        </div>

        <div id="discoverCarousel" class="carousel slide shadow rounded-4 overflow-hidden" data-bs-ride="carousel">

            <div class="carousel-indicators">
                @forelse($discover_galleries as $index => $gallery)
                    <button type="button"
                            data-bs-target="#discoverCarousel"
                            data-bs-slide-to="{{ $index }}"
                            class="{{ $index === 0 ? 'active' : '' }}"
                            aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                            aria-label="Slide {{ $index + 1 }}">
                    </button>
                @empty
                    <button type="button" data-bs-target="#discoverCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#discoverCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                @endforelse
            </div>

            <div class="carousel-inner">
                @forelse($discover_galleries as $index => $gallery)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $gallery->file_path) }}"
                             class="d-block w-100"
                             style="height:500px; object-fit:cover;"
                             alt="{{ $gallery->caption ?? 'Discover Bukit Lawang' }}">

                        @if($gallery->caption)
                            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded px-3 py-2">
                                <h3 class="text-white fs-4 mb-1">{{ $gallery->caption }}</h3>
                                <p class="text-white-50 small mb-0">Dokumentasi keindahan destinasi alam bebas Bukit Lawang.</p>
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="carousel-item active">
                        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1200" class="d-block w-100" style="height:500px; object-fit:cover;" alt="River Adventure">
                        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded px-3 py-2">
                            <h3 class="text-white fs-4">River Adventure</h3>
                            <p class="text-white-50 small mb-0">Enjoy the beauty of Bahorok River surrounded by tropical rainforest.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1516026672322-bc52d61a55d5?q=80&w=1200" class="d-block w-100" style="height:500px; object-fit:cover;" alt="Tropical Jungle">
                        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded px-3 py-2">
                            <h3 class="text-white fs-4">Gunung Leuser Wilderness</h3>
                            <p class="text-white-50 small mb-0">Immerse yourself deep into one of the oldest rainforests in the world.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#discoverCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#discoverCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

<!-- CONTACT INFORMATION SECTION (Improvised with Icons & Modern Spacing) -->
<section class="section-padding bg-white py-5">
    <div class="container text-center py-2">
        <!-- Sub-header tipis khas platform profesional -->
        <p class="text-uppercase fw-bold text-success mb-2 small" style="letter-spacing: 1px;">
            📞 Get In Touch
        </p>
        <h2 class="fw-bold mb-4 text-dark tracking-tight" style="letter-spacing: -0.5px;">Contact Information</h2>
        
        <div class="d-flex flex-column gap-2 text-muted fs-6">
            <p class="mb-1">
                📍 Bukit Lawang, Langkat, North Sumatra, Indonesia
            </p>
            <p class="mb-1">
                ✉️ Email: <a href="mailto:info@bukitlawang.com" class="text-success text-decoration-none fw-semibold">info@bukitlawang.com</a>
            </p>
            <p class="mb-0">
                📞 Phone: <a href="tel:+6281234567890" class="text-success text-decoration-none fw-semibold">+62 812-3456-7890</a>
            </p>
        </div>
    </div>
</section>

<!-- FOOTER SECTION (Improvised with Dynamic PHP Copyright Year) -->
<footer class="bg-dark text-white-50 py-4 border-top border-secondary border-opacity-25">
    <div class="container text-center">
        <h5 class="text-white fw-bold mb-2">Smart Tourism Bukit Lawang</h5>
        <p class="mb-2 small tracking-wide">Explore Nature • Adventure • Eco Tourism</p>
        <hr class="mx-auto my-3 opacity-10" style="max-width: 150px;">
        <!-- Penambahan Dynamic Year: Menampilkan tahun saat ini secara otomatis -->
        <p class="mb-0 text-muted" style="font-size: 11px;">
            &copy; {{ date('Y') }} Smart Tourism Hub. All Rights Reserved.
        </p>
    </div>
</footer>

<style>
    .travel-card {
        transition: transform 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94), box-shadow 0.3s ease;
    }
    .travel-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 1rem 2rem rgba(0,0,0,.08) !important;
    }
</style>
@endsection
