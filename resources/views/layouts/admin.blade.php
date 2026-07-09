<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - Smart Tourism Bukit Lawang</title>

    <!-- Bootstrap Core CSS (Stabil v5.3.3) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons (Wajib Ada untuk Ikon Menu Navigasi Modern) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* CSS Khusus Peningkatan Estetika Sidebar CMS Admin */
        .sidebar {
            min-height: 100vh;
            background-color: #1e2229; /* Warna gelap arsitektur dashboard premium */
            box-shadow: inset -1px 0 0 rgba(255, 255, 255, 0.05);
        }

        .sidebar .nav-link {
            color: #b8bec5;
            font-weight: 500;
            font-size: 0.925rem;
            padding: 10px 15px;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.2s ease-in-out;
        }

        /* Efek Interaktif Transisi Bergeser Lembut saat Navigasi Di-Sorot */
        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.05);
            color: #ffffff;
            border-radius: 6px;
            padding-left: 20px;
        }

        /* Style Menu Navigasi Status Aktif */
        .sidebar .nav-link.active {
            background-color: #198754; /* Warna hijau alam khas Bukit Lawang */
            color: #ffffff;
            border-radius: 6px;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(25, 135, 84, 0.25);
        }

        .main-content {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- BAR KOMPONEN SIDEBAR -->
        <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse p-3">
            <div class="position-sticky">
                <h5 class="text-white text-center fw-bold mb-4 py-3 border-bottom border-secondary border-opacity-25 letter-spacing-1">
                    <i class="bi bi-shield-lock-fill text-success me-1"></i> Admin CMS
                </h5>

                <ul class="nav flex-column">
                    {{-- 1. Dashboard --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    </li>

                    {{-- 2. Travel Guides --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/guides*') ? 'active' : '' }}" href="{{ route('admin.guides.index') }}">
                            <i class="bi bi-book"></i> Kelola Panduan
                        </a>
                    </li>

                    {{-- 3. Destinations (Destinasi Wisata) --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/destinations*') ? 'active' : '' }}" href="{{ route('admin.destinations.index') }}">
                            <i class="bi bi-tree"></i> Destinasi Wisata
                        </a>
                    </li>

                    {{-- 4. Itineraries --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/itineraries*') ? 'active' : '' }}" href="{{ route('admin.itineraries.index') }}">
                            <i class="bi bi-calendar-week"></i> Kelola Itinerary
                        </a>
                    </li>

                    {{-- 5. Villa Room (Tipe Kamar) --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/villa-rooms*') ? 'active' : '' }}" href="{{ route('admin.rooms.index') }}">
                            <i class="bi bi-door-closed"></i> Tipe Kamar Villa
                        </a>
                    </li>

                    {{-- 6. Villa Gallery --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/villa-galleries*') ? 'active' : '' }}" href="{{ route('admin.villa.index') }}">
                            <i class="bi bi-images"></i> Galeri Resort
                        </a>
                    </li>

                    {{-- 7. Gallery (Galeri Umum) --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/galleries*') ? 'active' : '' }}" href="{{ route('admin.galleries.index') }}">
                            <i class="bi bi-camera"></i> Galeri Umum
                        </a>
                    </li>

                    {{-- 8. Pesan Masuk --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/inquiries*') ? 'active' : '' }}" href="{{ route('admin.inquiries.index') }}">
                            <i class="bi bi-envelope"></i> Pesan Masuk
                        </a>
                    </li>
                </ul>

                <hr class="text-secondary opacity-25 my-4">

                <!-- FORM LOGOUT AKUN -->
                <form action="{{ route('logout') }}" method="POST" class="px-2">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm w-100 rounded-2 d-flex align-items-center justify-content-center gap-2 py-2 fw-semibold shadow-sm">
                        <i class="bi bi-box-arrow-left"></i> Keluar Aplikasi
                    </button>
                </form>
            </div>
        </nav>

        <!-- AREA KONTEN UTAMA DASHBOARD -->
        <main class="col-md-9 col-lg-10 ms-sm-auto px-md-4 main-content" style="min-height: 100vh;">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom border-secondary border-opacity-10">
                <h1 class="h2 fw-bold text-dark tracking-tight">Panel Kendali Sistem</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-2 rounded-pill small fw-bold">
                        <i class="bi bi-person-circle me-1"></i> Sesi: Admin Etalauser
                    </span>
                </div>
            </div>

            <!-- TEMPAT MENYUNTIKKAN VIEW KONTEN MODUL ADMIN -->
            <div class="py-2">
                @yield('content_admin')
            </div>
        </main>
    </div>
</div>

<!-- Bootstrap JS Core Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
