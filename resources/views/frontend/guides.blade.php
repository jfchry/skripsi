@extends('layouts.frontend')

@section('content')
<!-- 1. HERO SECTION (Layout Dua Kolom Megah & Asimetris) -->
<section class="text-white border-bottom" style="padding-top: 5.5rem !important; padding-bottom: 3rem !important; background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)), url('https://images.unsplash.com/photo-1516026672322-bc52d61a55d5?q=80&w=1200') no-repeat center center !important; background-size: cover !important;">
    <div class="container py-4">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb small mb-0 bg-transparent p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}" class="text-white text-decoration-none fw-bold">🏠 Home</a>
                        </li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">Travel Guide</li>
                    </ol>
                </nav>

                <p class="text-uppercase fw-bold text-success mb-2 tracking-wider small">
                    Smart Tourism Platform • Information Hub
                </p>

                <h1 class="display-3 fw-bold text-white tracking-tight">
                    Travel Information Center
                </h1>

                <p class="lead text-white-75 mt-3 fs-5" style="max-width: 650px;">
                    Semua jawaban praktis dan esensial yang wajib Anda ketahui sebelum memulai petualangan hebat menjelajahi ekosistem alam Bukit Lawang.
                </p>

                <div class="d-flex flex-wrap gap-2 mt-4">
                    <a href="#essential-guides" class="btn btn-success btn-lg fw-bold px-4 shadow-sm">
                        📖 Baca Panduan Saku
                    </a>
                    <a href="https://wa.me/6281234567890?text=Halo%20Villa%20Etalauser,%20saya%20butuh%20informasi%20tambahan%20mengenai%20akses%20ke%20Bukit%20Lawang."
                       target="_blank" class="btn btn-outline-dark btn-lg fw-bold px-4">
                        💬 Konsultasi Perjalanan
                    </a>
                </div>
            </div>

            <!-- Kolom Kanan: Quick Tips Card -->
            <div class="col-lg-5 d-none d-lg-block">
                <div class="p-4 bg-success bg-opacity-10 rounded-4 border border-success border-opacity-10 shadow-sm">
                    <h5 class="fw-bold text-success mb-2">💡 Tips Cepat Wisatawan</h5>
                    <p class="small text-white mb-3">Bukit Lawang adalah kawasan pedesaan di tepi hutan hujan tropis. Perhatikan dua aspek krusial logistik lapangan berikut:</p>
                    <div class="d-flex flex-column gap-2 small">
                        <div class="d-flex align-items-start gap-2 text-white">
                            <span>💵</span>
                            <div><strong>Uang Tunai:</strong> Tidak ada ATM bersama di dalam area desa wisata, siapkan cash secukupnya.</div>
                        </div>
                        <div class="d-flex align-items-start gap-2 text-white">
                            <span>📶</span>
                            <div><strong>Koneksi:</strong> Sinyal operator Telkomsel adalah yang paling stabil dan memiliki cakupan 4G terluas di sini.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. MAIN HUB SECTION -->
<section id="essential-guides" class="py-5 bg-white">
    <div class="container">

        <div class="row g-4">

            <!-- DATA DINAMIS + INTEGRASI FLOATING MODAL DETAIL -->
            @forelse($guides as $guide)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden travel-card border border-light">
                        <div class="position-relative">
                            <img src="{{ $guide->image_url ? asset('storage/' . $guide->image_url) : 'https://images.unsplash.com/photo-1540573133985-87b6da6d54a9?q=80&w=600' }}"
                                 class="card-img-top"
                                 style="height: 200px; object-fit: cover;"
                                 alt="{{ $guide->title }}">
                            <span class="position-absolute top-0 start-0 bg-success text-white px-3 py-1.5 m-3 fw-bold rounded-pill small shadow-sm" style="font-size: 11px;">
                                🗺️ Info Wisata
                            </span>
                        </div>
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <h4 class="fw-bold text-dark mb-2" style="font-size: 1.25rem;">{{ $guide->title }}</h4>
                                <!-- 🌟 PEMOTONGAN KUTIPAN OTOMATIS DARI KOLOM BODY -->
                                <p class="text-muted small">
                                    {{ Str::limit(strip_tags($guide->body), 110) }}
                                </p>
                            </div>
                            <div class="mt-3 pt-3 border-top d-flex justify-content-between align-items-center">
                                <span class="text-muted small">
                                    <i class="bi bi-clock"></i> {{ \Carbon\Carbon::parse($guide->created_at)->format('d M Y') }}
                                </span>

                                <!-- Tombol Pemicu Floating Modal Dinamis -->
                                <button type="button"
                                        class="btn btn-outline-success btn-sm px-3 rounded-pill fw-bold"
                                        data-bs-toggle="modal"
                                        data-bs-target="#guideModal{{ $guide->id }}">
                                    Lihat Selengkapnya ➡️
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STRUCTURE FLOATING MODAL DETAIL PANDUAN WISATA -->
                <div class="modal fade" id="guideModal{{ $guide->id }}" tabindex="-1" aria-labelledby="guideModalLabel{{ $guide->id }}" aria-hidden="true" style="z-index: 10500;">
                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                        <div class="modal-content border-0 shadow-lg rounded-4">

                            <!-- Header Modal -->
                            <div class="modal-header bg-success text-white p-3.5">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="fs-4">📋</span>
                                    <h5 class="modal-title fw-bold mb-0" id="guideModalLabel{{ $guide->id }}">
                                        Detail Informasi Wisata
                                    </h5>
                                </div>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <!-- Isi Modal (Mendukung Teks Panjang dari kolom body) -->
                            <div class="modal-body p-4 text-start">
                                @if($guide->image_url)
                                    <div class="mb-4 text-center rounded-3 overflow-hidden shadow-sm" style="max-height: 320px;">
                                        <img src="{{ asset('storage/' . $guide->image_url) }}" class="img-fluid w-100" style="object-fit: cover; max-height: 320px;" alt="{{ $guide->title }}">
                                    </div>
                                @endif

                                <h3 class="fw-bold text-dark mb-2">{{ $guide->title }}</h3>
                                <p class="text-muted small mb-3 border-bottom pb-2">
                                    📅 Dipublikasikan pada: {{ \Carbon\Carbon::parse($guide->created_at)->format('d F Y') }}
                                </p>

                                <!-- 🌟 FIX: Kolom pemanggilan diubah menjadi body sesuai struktur database asli -->
                                <div class="text-dark leading-relaxed font-normal" style="white-space: pre-line; font-size: 0.95rem;">
                                    {{ $guide->body }}
                                </div>
                            </div>

                            <!-- Footer Modal -->
                            <div class="modal-footer bg-light p-2.5">
                                <button type="button" class="btn btn-secondary btn-sm px-4 fw-bold rounded-pill" data-bs-dismiss="modal">
                                    Tutup Panduan
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <!-- 3. FALLBACK ESSENTIAL POCKET GUIDES (Otomatis Muncul Jika DB Kosong) -->
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden bg-light p-2">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <span class="fs-2">🚐</span>
                                <h4 class="fw-bold text-dark mb-0">Transportasi & Waktu Tempuh</h4>
                            </div>
                            <h6 class="fw-bold text-dark mt-3">Berapa lama perjalanan dari Medan?</h6>
                            <p class="text-muted small">Dari Bandara Kualanamu atau Kota Medan memakan waktu sekitar <strong>3.5 hingga 4 jam berkendara</strong> melewati Binjai dan Kuala.</p>

                            <h6 class="fw-bold text-dark mt-3">Bagaimana cara terbaik menuju Bukit Lawang?</h6>
                            <ul class="text-muted small ps-3 mb-0">
                                <li class="mb-1"><strong>Private Shuttle (Direkomendasikan):</strong> Penjemputan langsung dari Bandara Kualanamu oleh tim Villa Etalauser demi kenyamanan maksimal.</li>
                                <li class="mb-1"><strong>Bus Umum:</strong> Naik Bus Damri ke Terminal Pinang Baris Medan, dilanjutkan Bus ALS kecil jurusan Bukit Lawang.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden bg-light p-2">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <span class="fs-2">☀️</span>
                                <h4 class="fw-bold text-dark mb-0">Kesiapan Sebelum Berangkat</h4>
                            </div>
                            <h6 class="fw-bold text-dark mt-3">Kapan waktu terbaik berkunjung?</h6>
                            <p class="text-muted small">Musim kemarau antara <strong>Mei hingga September</strong> adalah waktu paling ideal agar jalur trekking tidak licin dan satwa liar (Orangutan) lebih mudah terlihat jelas.</p>

                            <h6 class="fw-bold text-dark mt-3">Apa saja yang wajib dibawa?</h6>
                            <div class="d-flex flex-wrap gap-1 mt-2">
                                <span class="badge bg-white text-dark border small">👟 Sepatu Gunung / Trekking</span>
                                <span class="badge bg-white text-dark border small">🦟 Lotion Anti Nyamuk</span>
                                <span class="badge bg-white text-dark border small">🧥 Jas Hujan Ringan</span>
                                <span class="badge bg-white text-dark border small">🔌 Powerbank</span>
                                <span class="badge bg-white text-dark border small">💵 Uang Tunai Secukupnya</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse

        </div>
    </div>
</section>

<!-- 4. FAQ ASSISTANCE BANNER -->
<section class="py-5 bg-white border-top">
    <div class="container text-center">
        <h4 class="fw-bold text-dark mb-2">Masih memiliki pertanyaan khusus lainnya?</h4>
        <p class="text-muted small mb-4 mx-auto" style="max-width: 550px;">Jangan ragu untuk mengklik tombol pesan melayang di pojok kanan bawah atau langsung berkonsultasi gratis dengan tim pelayanan wisata kami.</p>
        <a href="https://wa.me/6281234567890?text=Halo%20Villa%20Etalauser,%20saya%20ingin%20bertanya%20mengenai%20panduan%20perjalanan%20ke%20Bukit%20Lawang." target="_blank" class="btn btn-success fw-bold px-4 rounded-pill shadow-sm">
            💬 Tanyakan Lewat WhatsApp Official
        </a>
    </div>
</section>

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
