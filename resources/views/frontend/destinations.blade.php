@extends('layouts.frontend')

@section('content')
<!-- 1. HERO SECTION (Layout Premium Alam Bebas) -->
<section class="text-white border-bottom" style="padding-top: 80px !important; padding-bottom: 3rem !important; background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)), url('https://images.unsplash.com/photo-1516026672322-bc52d61a55d5?q=80&w=1200') no-repeat center center !important; background-size: cover !important;">
    <div class="container py-4">
        <div class="row align-items-center">

            <!-- KOLOM KIRI: CIRI KHAS INFORMASI UTAMA Halaman -->
            <div class="col-lg-7">
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb small mb-0 bg-transparent p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}" class="text-white text-decoration-none fw-bold">🏠 Beranda</a>
                        </li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">Destinasi Wisata</li>
                    </ol>
                </nav>

                <p class="text-uppercase fw-bold text-success mb-2 tracking-wider small">
                    Platform Pariwisat Pintar • Keajaiban Alam Sumatra
                </p>

                <h1 class="display-3 fw-bold text-white tracking-tight">
                    Destinasi Wisata
                </h1>

                <p class="lead text-white-75 mt-3 fs-5" style="max-width: 650px;">
                    Jelajahi jajaran surga tersembunyi, ekosistem satwa liar endemik, dan spot petualangan air terbaik di sepanjang kawasan Taman Nasional Gunung Leuser.
                </p>

                <div class="d-flex flex-wrap gap-2 mt-4">
                    <a href="https://wa.me/6281234567890?text=Halo%20Villa%20Etalauser,%20saya%20butuh%20informasi%20rute%20dan%20pemandu%20menuju%20destinasi%20wisata."
                       target="_blank" rel="noopener noreferrer" class="btn btn-outline-light btn-lg fw-bold px-4 fs-6 rounded-pill">
                        🗺️ Tanya Rute &amp; Pemandu Lokal
                    </a>
                </div>
            </div>

            <!-- KOLOM KANAN: KARTU EDUKASI & ETIKA EKOWISATA -->
            <div class="col-lg-5 d-none d-lg-block">
                <div class="p-4 bg-success bg-opacity-10 rounded-4 border border-success border-opacity-10 shadow-sm" style="backdrop-filter: blur(4px);">
                    <h5 class="fw-bold text-success mb-2">🌿 Panduan Eksplorasi Aman</h5>
                    <p class="small text-white mb-3 text-opacity-75">Untuk pengalaman petualangan terbaik dan tetap menjaga kelestarian alam Bukit Lawang, perhatikan hal berikut:</p>
                    <div class="d-flex flex-column gap-2 small">
                        <div class="d-flex align-items-start gap-2 text-white">
                            <span class="mt-0.5">🥾</span>
                            <div><strong>Alat Keselamatan:</strong> Gunakan sepatu atau sandal gunung anti-slip saat melakukan trekking ke dalam hutan atau area sungai.</div>
                        </div>
                        <div class="d-flex align-items-start gap-2 text-white">
                            <span class="mt-0.5">🐒</span>
                            <div><strong>Aturan Lingkungan:</strong> Jaga jarak aman dengan Orangutan, dilarang keras memberi makan satwa liar tanpa izin komite pemandu.</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 2. MAIN DESTINATIONS SECTION (Zigzag Modern Layout) -->
<section class="py-5 bg-white">
    <div class="container py-4">

        @forelse ($destinations as $index => $destination)
            <!-- Logika Kondisional Menghasilkan Tata Letak Baris Zigzag Bergantian Otomatis -->
            <div class="row align-items-center g-5 mb-5 {{ $index % 2 != 0 ? 'flex-lg-row-reverse' : '' }}">

                <!-- Kolom Gambar dengan Efek Hover Zoom & Masking -->
                <div class="col-lg-6">
                    <div class="destination-img-wrapper position-relative overflow-hidden rounded-4 shadow-sm border border-light">
                        @if($destination->image_url)
                            <img src="{{ asset('storage/' . $destination->image_url) }}"
                                 class="img-fluid w-100 destination-img"
                                 style="max-height: 380px; object-fit: cover;"
                                 alt="{{ $destination->name }}">
                        @else
                            <img src="https://images.unsplash.com/photo-1540573133985-87b6da6d54a9?q=80&w=800"
                                 class="img-fluid w-100 destination-img"
                                 style="max-height: 380px; object-fit: cover;"
                                 alt="Gambar Default Destinasi">
                        @endif
                        <span class="position-absolute top-0 start-0 bg-success text-white px-3 py-1.5 m-3 fw-bold rounded-pill small shadow-sm" style="font-size: 11px; z-index: 10;">
                            📍 Wisata Alam
                        </span>
                    </div>
                </div>

                <!-- Kolom Informasi Dinamis dari Database -->
                <div class="col-lg-6 my-3 my-lg-0">
                    <div class="pe-lg-4 ps-lg-4">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="text-success fw-bold text-uppercase tracking-wider small" style="font-size: 11px;">
                                Destinasi Unggulan #{{ $index + 1 }}
                            </span>
                        </div>

                        <h2 class="fw-bold text-dark mb-3 display-6" style="letter-spacing: -0.5px;">
                            {{ $destination->name }}
                        </h2>

                        <!-- Garis Dekoratif Pendek -->
                        <div class="bg-success rounded" style="width: 50px; height: 4px; margin-bottom: 1.5rem;"></div>

                        <!-- Deskripsi Lokasi -->
                        <p class="text-muted leading-relaxed" style="text-align: justify; font-size: 0.975rem; line-height: 1.8;">
                            {{ $destination->location_description }}
                        </p>
                    </div>
                </div>

            </div>

            <!-- Pembatas antar baris esensial (Kecuali pada item iterasi terakhir) -->
            @if(!$loop->last)
                <hr class="my-5 opacity-25 text-muted">
            @endif

        @empty
            <!-- FALLBACK UI JIKA DATA DATABASE KOSONG -->
            <div class="text-center py-5 my-4">
                <div class="fs-1 mb-3">🏞️</div>
                <h4 class="fw-bold text-dark">Belum Ada Destinasi Wisata</h4>
                <p class="text-muted small mx-auto" style="max-width: 400px;">Data destinasi wisata dinamis belum diunggah oleh administrator ke dalam database sistem.</p>
                <a href="{{ url('/') }}" class="btn btn-success btn-sm px-4 rounded-pill fw-bold mt-2">
                    Kembali ke Beranda
                </a>
            </div>
        @endforelse

    </div>
</section>

<!-- 3. CUSTOM STYLING (Gaya Visual Interaktif) -->
<style>
    .destination-img-wrapper {
        transition: transform 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    .destination-img {
        transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    /* Efek Zoom-In Gambar saat Komponen di-Hover */
    .destination-img-wrapper:hover .destination-img {
        transform: scale(1.06);
    }
    .destination-img-wrapper:hover {
        transform: translateY(-4px);
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.1) !important;
    }
</style>
@endsection
