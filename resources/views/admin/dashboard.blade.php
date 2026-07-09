@extends('layouts.admin')

@section('content_admin')
{{-- 1. Card Ucapan Selamat Datang --}}
<div class="card shadow-sm border-0 mb-4 rounded-3 text-white" style="background: linear-gradient(135deg, #198754, #14532d);">
    <div class="card-body p-4 position-relative overflow-hidden">
        <div class="position-relative" style="z-index: 2;">
            <h3 class="fw-bold mb-2">Selamat Datang di CMS Smart Tourism Hub!</h3>
            <p class="mb-0 text-white-50 small" style="max-width: 700px; line-height: 1.6;">
                Melalui panel kendali ini, Anda memiliki otoritas penuh untuk mengelola modifikasi data informasi destinasi wisata Bukit Lawang serta memantau operasional promosi Villa Etalauser Ecoresort secara real-time.
            </p>
        </div>
        <!-- Ornamen Dekoratif Latar Belakang Kartu -->
        <div class="position-absolute end-0 bottom-0 opacity-10 text-white p-3 d-none d-md-block" style="font-size: 8rem; transform: translate(20px, 40px);">
            <i class="bi bi-shield-check"></i>
        </div>
    </div>
</div>

{{-- 2. Pembagian Layout Dua Kolom Berdampingan --}}
<div class="row">

    {{-- ==================== SISI KIRI: GRID CARD STATISTIK LENGKAP ==================== --}}
    <div class="col-lg-7 col-md-12">
        <div class="row g-4">

            {{-- Total Travel Guides --}}
            <div class="col-md-6">
                <div class="card shadow-sm border-0 h-100 rounded-3 text-white" style="background: linear-gradient(135deg, #0dcaf0, #0aa2c0);">
                    <div class="card-body p-4 d-flex align-items-center justify-content-between">
                        <div>
                            <div class="small fw-bold text-uppercase tracking-wider mb-1 text-white-50" style="font-size: 11px;">Panduan Wisata</div>
                            <div class="display-6 fw-bold mb-0">{{ $totalGuides ?? 0 }}</div>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-book fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Total Destinasi --}}
            <div class="col-md-6">
                <div class="card shadow-sm border-0 h-100 rounded-3 text-white" style="background: linear-gradient(135deg, #0d6efd, #0b5ed7);">
                    <div class="card-body p-4 d-flex align-items-center justify-content-between">
                        <div>
                            <div class="small fw-bold text-uppercase tracking-wider mb-1 text-white-50" style="font-size: 11px;">Destinasi Alam</div>
                            <div class="display-6 fw-bold mb-0">{{ $totalDestinations ?? 0 }}</div>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-tree fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Total Itineraries --}}
            <div class="col-md-6">
                <div class="card shadow-sm border-0 h-100 rounded-3 text-white" style="background: linear-gradient(135deg, #495057, #343a40);">
                    <div class="card-body p-4 d-flex align-items-center justify-content-between">
                        <div>
                            <div class="small fw-bold text-uppercase tracking-wider mb-1 text-white-50" style="font-size: 11px;">Paket Itinerary</div>
                            <div class="display-6 fw-bold mb-0">{{ $totalItineraries ?? 0 }}</div>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-calendar-week fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Total Tipe Kamar --}}
            <div class="col-md-6">
                <div class="card shadow-sm border-0 h-100 rounded-3 text-white" style="background: linear-gradient(135deg, #198754, #14532d);">
                    <div class="card-body p-4 d-flex align-items-center justify-content-between">
                        <div>
                            <div class="small fw-bold text-uppercase tracking-wider mb-1 text-white-50" style="font-size: 11px;">Tipe Kamar Villa</div>
                            <div class="display-6 fw-bold mb-0">{{ $totalRooms ?? 0 }}</div>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-door-closed fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Total Galeri Wisata --}}
            <div class="col-md-6">
                <div class="card shadow-sm border-0 h-100 rounded-3 text-white" style="background: linear-gradient(135deg, #6f42c1, #59359a); ">
                    <div class="card-body p-4 d-flex align-items-center justify-content-between">
                        <div>
                            <div class="small fw-bold text-uppercase tracking-wider mb-1 text-white-50" style="font-size: 11px;">Galeri Dokumentasi</div>
                            <div class="display-6 fw-bold mb-0">{{ $totalGalleries ?? 0 }}</div>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-images fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Total Pesan Masuk --}}
            <div class="col-md-6">
                <div class="card shadow-sm border-0 h-100 rounded-3 text-white" style="background: linear-gradient(135deg, #ffc107, #d39e00);">
                    <div class="card-body p-4 d-flex align-items-center justify-content-between">
                        <div>
                            <div class="small fw-bold text-uppercase tracking-wider mb-1 text-white-50" style="font-size: 11px;">Pesan Masuk Baru</div>
                            <div class="display-6 fw-bold mb-0">{{ $totalMessages ?? 0 }}</div>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-envelope-download fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- ==================== SISI KANAN: NOTIFIKASI SYSTEM ==================== --}}
    <div class="col-lg-5 col-md-12 mt-4 mt-lg-0">
        @include('partials.notifications')
    </div>

</div>
@endsection
