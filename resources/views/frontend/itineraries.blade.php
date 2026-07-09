@extends('layouts.frontend')

@section('content')
<!-- 1. HERO SECTION (Layout Rencana Perjalanan Premium) -->
<section class="text-white border-bottom" style="padding-top: 80px !important; padding-bottom: 3rem !important; background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)), url('https://images.unsplash.com/photo-1441974231531-c6227db76b6e?q=80&w=1200') no-repeat center center !important; background-size: cover !important;">
    <div class="container py-4">
        <div class="row align-items-center">

            <!-- Kolom Kiri: Informasi Utama -->
            <div class="col-lg-7">
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb small mb-0 bg-transparent p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}" class="text-white text-decoration-none fw-bold">🏠 Beranda</a>
                        </li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">Rencana Perjalanan</li>
                    </ol>
                </nav>

                <p class="text-uppercase fw-bold text-success mb-2 tracking-wider small">
                    Platform Pariwisata Pintar • Rute Pilihan Terbaik
                </p>

                <h1 class="display-3 fw-bold text-white tracking-tight">
                    Temukan Rencana Perjalanan Anda
                </h1>

                <p class="lead text-white-75 mt-3 fs-5" style="max-width: 650px;">
                    Pilih rekomendasi rencana perjalanan terbaik yang dirancang khusus untuk mencocokkan preferensi dan gaya petualangan Anda di Bukit Lawang.
                </p>

                <div class="d-flex flex-wrap gap-2 mt-4">
                    <a href="#travel-plans" class="btn btn-success btn-lg fw-bold px-4 shadow-sm fs-6 rounded-pill">
                        📋 Lihat Rencana Paket
                    </a>
                    <a href="#duration-guide" class="btn btn-outline-light btn-lg fw-bold px-4 fs-6 rounded-pill">
                        💡 Panduan Durasi Wisata
                    </a>
                </div>
            </div>

            <!-- Kolom Kanan: Panduan Ringkas Durasi -->
            <div class="col-lg-5 d-none d-lg-block">
                <div class="p-4 bg-success bg-opacity-10 rounded-4 border border-success border-opacity-10 shadow-sm" style="backdrop-filter: blur(4px);">
                    <h5 class="fw-bold text-success mb-2">⏱️ Panduan Durasi Wisata</h5>
                    <p class="small text-white mb-3 text-opacity-75">Sesuaikan ketersediaan waktu luang Anda dengan tipe petualangan lapangan yang ideal berikut:</p>
                    <div class="d-flex flex-column gap-2 small">
                        <div class="d-flex align-items-start gap-2 text-white">
                            <span class="mt-0.5">⚡</span>
                            <div><strong>Singkat (1 Hari):</strong> Cocok untuk kunjungan kilat, trekking cepat, dan langsung kembali menyusuri jeram lewat river tubing.</div>
                        </div>
                        <div class="d-flex align-items-start gap-2 text-white">
                            <span class="mt-0.5">⛺</span>
                            <div><strong>Imersif (2D1N / 3D2N):</strong> Pilihan terbaik bagi yang ingin merasakan sensasi mendalam bermalam mendirikan tenda di jantung hutan.</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 2. RECOMMENDED TRAVEL PLANS SECTION -->
<section id="travel-plans" class="py-5 bg-white">
    <div class="container py-3">
        <div class="text-center mb-5">
            <span class="text-success fw-bold small text-uppercase tracking-wider d-block mb-1">Rencana Perjalanan Terpilih</span>
            <h2 class="fw-bold text-dark">Rekomendasi Rute Perjalanan</h2>
            <p class="text-muted small mx-auto" style="max-width: 650px;">
                Mulailah penjelajahan hebat tanpa pusing memikirkan manajemen waktu lapangan. Setiap itinerary di bawah ini siap menyuguhkan titik esensial terbaik kawasan konservasi.
            </p>
        </div>

        <div class="row g-4">
            @forelse($itineraries as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden travel-card border border-light">
                        <div class="position-relative">
                            @if ($item->image_url)
                                @if (str_starts_with($item->image_url, 'http://') || str_starts_with($item->image_url, 'https://'))
                                    <img src="{{ $item->image_url }}" class="card-img-top" alt="{{ $item->title }}" style="height: 200px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('storage/' . $item->image_url) }}" class="card-img-top" alt="{{ $item->title }}" style="height: 200px; object-fit: cover;">
                                @endif
                            @else
                                <img src="https://images.unsplash.com/photo-1540573133985-87b6da6d54a9?q=80&w=600" class="card-img-top" alt="{{ $item->title }}" style="height: 200px; object-fit: cover;">
                            @endif
                            <span class="position-absolute top-0 start-0 bg-success text-white px-3 py-1.5 m-3 fw-bold rounded-pill shadow-sm" style="font-size: 11px; letter-spacing: 0.5px;">
                                🌿 Ekowisata
                            </span>
                        </div>

                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <h4 class="fw-bold text-dark mb-2" style="font-size: 1.25rem;">{{ $item->title }}</h4>
                                <p class="text-muted small mb-0" style="text-align: justify; line-height: 1.6;">
                                    {{ Str::limit(strip_tags($item->body), 115) }}
                                </p>
                            </div>
                            <div class="mt-4 pt-3 border-top">
                                <button type="button" class="btn btn-success w-100 rounded-pill fw-bold btn-sm py-2 shadow-sm" data-bs-toggle="modal" data-bs-target="#itineraryModal-{{ $item->id }}">
                                    Lihat Detail Perjalanan ➡️
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- LAYOUT FLOATING MODAL DETAIL ITINERARY -->
                <div class="modal fade" id="itineraryModal-{{ $item->id }}" tabindex="-1" aria-hidden="true" style="z-index: 10500;">
                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                        <div class="modal-content rounded-4 border-0 shadow-lg">
                            <div class="modal-header bg-success text-white py-3 border-0">
                                <h5 class="modal-title fw-bold">🗺️ Detail Rencana: {{ $item->title }}</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                                @if ($item->image_url)
                                    <div class="mb-4 text-center rounded-3 overflow-hidden shadow-sm" style="max-height: 350px;">
                                        <img src="{{ (str_starts_with($item->image_url, 'http') ? $item->image_url : asset('storage/' . $item->image_url)) }}" class="img-fluid w-100" style="max-height: 350px; object-fit: cover;" alt="{{ $item->title }}">
                                    </div>
                                @endif
                                <div class="text-dark leading-relaxed border bg-light p-3 rounded-3" style="text-align: justify; white-space: pre-line; line-height: 1.8; font-size: 0.95rem;">
                                    {!! $item->body !!}
                                </div>
                            </div>
                            <div class="modal-footer border-top-0 p-3 bg-light rounded-bottom-4 d-flex justify-content-between align-items-center">
                                <span class="text-muted small ms-2">
                                    📅 Rilis: {{ $item->created_at ? $item->created_at->format('d M Y') : now()->format('d M Y') }}
                                </span>
                                <a href="https://wa.me/6281234567890?text=Halo%20Villa%20Etalauser,%20saya%20tertarik%20booking%20paket%20itinerary%20{{ urlencode($item->title) }}."
                                   target="_blank" rel="noopener noreferrer" class="btn btn-success fw-bold px-4 rounded-pill btn-sm">
                                    💬 Ambil Paket Tour Ini
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="fs-1 mb-2">📋</div>
                    <h5 class="text-muted fw-bold">Belum Ada Rencana Perjalanan</h5>
                    <p class="text-muted small">Data paket itinerary belum diterbitkan ke dalam database.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- 3. CLASSIFICATION DURATION GUIDE SECTION -->
<section id="duration-guide" class="py-5 bg-light border-top border-bottom">
    <div class="container py-3">
        <div class="text-center mb-5">
            <span class="text-success fw-bold small text-uppercase tracking-wider d-block mb-1">Panduan Durasi Kunjungan</span>
            <h2 class="fw-bold text-dark">Mana Perjalanan yang Cocok untuk Anda?</h2>
            <p class="text-muted small mx-auto" style="max-width: 550px;">Pahami klasifikasi durasi waktu berikut untuk menentukan ritme petualangan terbaik Anda di Bukit Lawang.</p>
        </div>

        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm p-4 rounded-4 h-100 bg-white">
                    <div class="fs-1 mb-2">⚡</div>
                    <h4 class="fw-bold text-dark h5 mb-2">Perjalanan 1 Hari</h4>
                    <p class="text-muted small mb-0" style="line-height: 1.6;">Cocok bagi pengunjung kilat yang menginginkan petualangan cepat namun berkesan. Efisien, padat, dan mencakup poin esensial utama tepi hutan.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm p-4 rounded-4 h-100 bg-white border border-success border-opacity-25 shadow">
                    <div class="fs-1 mb-2">⛺</div>
                    <h4 class="fw-bold text-success h5 mb-2">2 Hari 1 Malam</h4>
                    <p class="text-muted small mb-0" style="line-height: 1.6;">Sangat direkomendasikan bagi penjelajah yang menginginkan pengalaman paling seimbang. Merasakan atmosfer malam rimba tanpa kelelahan fisik berlebih.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm p-4 rounded-4 h-100 bg-white">
                    <div class="fs-1 mb-2">🐒</div>
                    <h4 class="fw-bold text-dark h5 mb-2">3 Hari 2 Malam</h4>
                    <p class="text-muted small mb-0" style="line-height: 1.6;">Terbaik bagi pengunjung yang ingin sepenuhnya menyatu dengan alam bebas. Penjelajahan area terdalam, observasi flora fauna, dan metode survival tak terlupakan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. CALL TO ACTION SECTION -->
<section class="py-5 bg-white">
    <div class="container text-center py-2">
        <h3 class="fw-bold text-dark mb-2">Lengkapi Petualangan Anda</h3>
        <p class="text-muted small mb-4 mx-auto" style="max-width: 600px;">
            Optimalkan pengalaman berwisata Anda di Bukit Lawang dengan memesan akomodasi terbaik di Villa Etalauser Ecoresort. Sempurnakan waktu istirahat Anda setelah seharian penuh menjelajahi belantara.
        </p>
        <a href="{{ route('villa') }}" class="btn btn-success btn-lg fw-bold px-4 rounded-pill shadow-sm py-2 fs-6">
            🏨 Jelajahi Kamar Villa Etalauser
        </a>
    </div>
</section>

<!-- Custom Interactive Cards Styling -->
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
