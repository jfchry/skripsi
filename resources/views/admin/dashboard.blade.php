@extends('layouts.admin')

@section('content_admin')
{{-- 1. Card Ucapan Selamat Datang --}}
<div class="card shadow-sm border-0 mb-4">
    <div class="card-body p-4">
        <h3 class="fw-bold text-success">Selamat Datang di CMS Smart Tourism!</h3>
        <p class="text-muted mb-0">
            Melalui panel ini, Anda dapat mengelola data informasi destinasi wisata Bukit Lawang dan promosi Villa Etalauser Ecoresort secara real-time.
        </p>
    </div>
</div>

{{-- 2. Pembagian Layout Dua Kolom Berdampingan --}}
<div class="row">

    {{-- ==================== SISI KIRI: GRID CARD STATISTIK LENGKAP ==================== --}}
    <div class="col-lg-7 col-md-12">
        <div class="row">

            {{-- Total Travel Guides --}}
            <div class="col-md-6 mb-4">
                <div class="card bg-info text-white shadow border-0 h-100">
                    <div class="card-body py-3">
                        <div class="small font-weight-bold text-uppercase mb-1" style="opacity: 0.85;">🗺️ Travel Guides</div>
                        <div class="h2 fw-bold mb-0">{{ $totalGuides ?? 0 }}</div>
                    </div>
                </div>
            </div>

            {{-- Total Destinasi --}}
            <div class="col-md-6 mb-4">
                <div class="card bg-primary text-white shadow border-0 h-100">
                    <div class="card-body py-3">
                        <div class="small font-weight-bold text-uppercase mb-1" style="opacity: 0.85;">🌳 Destinasi Wisata</div>
                        <div class="h2 fw-bold mb-0">{{ $totalDestinations }}</div>
                    </div>
                </div>
            </div>

            {{-- Total Itineraries --}}
            <div class="col-md-6 mb-4">
                <div class="card bg-secondary text-white shadow border-0 h-100">
                    <div class="card-body py-3">
                        <div class="small font-weight-bold text-uppercase mb-1" style="opacity: 0.85;">📅 Itineraries</div>
                        <div class="h2 fw-bold mb-0">{{ $totalItineraries ?? 0 }}</div>
                    </div>
                </div>
            </div>

            {{-- Total Tipe Kamar --}}
            <div class="col-md-6 mb-4">
                <div class="card bg-success text-white shadow border-0 h-100">
                    <div class="card-body py-3">
                        <div class="small font-weight-bold text-uppercase mb-1" style="opacity: 0.85;">🛏️ Tipe Kamar Villa</div>
                        <div class="h2 fw-bold mb-0">{{ $totalRooms }}</div>
                    </div>
                </div>
            </div>

            {{-- Total Galeri Wisata (Gabungan) --}}
            <div class="col-md-6 mb-4">
                <div class="card text-white shadow border-0 h-100" style="background-color: #6f42c1;">
                    <div class="card-body py-3">
                        <div class="small font-weight-bold text-uppercase mb-1" style="opacity: 0.85;">📸 Galeri Wisata</div>
                        <div class="h2 fw-bold mb-0">{{ $totalGalleries ?? 0 }}</div>
                    </div>
                </div>
            </div>

            {{-- Total Pesan Masuk (Ubah ke col-md-6 agar sejajar dan menutup grid) --}}
            <div class="col-md-6 mb-4">
                <div class="card bg-warning text-white shadow border-0 h-100">
                    <div class="card-body py-3">
                        <div class="small font-weight-bold text-uppercase mb-1" style="opacity: 0.85;">📥 Pesan Masuk Baru</div>
                        <div class="h2 fw-bold mb-0">{{ $totalMessages }}</div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- ==================== SISI KANAN: NOTIFIKASI SYSTEM ==================== --}}
    <div class="col-lg-5 col-md-12">
        @include('partials.notifications')
    </div>

</div>
@endsection
