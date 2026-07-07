<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Smart Tourism Bukit Lawang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* CSS Minimalis untuk mempertahankan Sidebar tetap penuh ke bawah */
        .sidebar {
            min-height: 100vh;
            background-color: #212529; /* Warna gelap standar admin */
        }
        .sidebar .nav-link {
            color: #dee2e6;
            margin-bottom: 5px;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: #198754; /* Warna hijau sukses biar senada dengan tema Bukit Lawang */
            color: white;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse p-3">
            <div class="position-sticky">
                <h5 class="text-white text-center fw-bold mb-4 py-2 border-bottom border-secondary">
                    Admin CMS
                </h5>
                <ul class="nav flex-column">
                    {{-- 1. Dashboard --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                            📊 Dashboard
                        </a>
                    </li>

                    {{-- 2. Travel Guides --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/guides*') ? 'active' : '' }}" href="{{ route('admin.guides.index') }}">
                            🗺️ Kelola Travel Guides
                        </a>
                    </li>

                    {{-- 3. Destinations (Destinasi Wisata) --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/destinations*') ? 'active' : '' }}" href="{{ route('admin.destinations.index') }}">
                            🌳 Destinasi Wisata
                        </a>
                    </li>

                    {{-- 4. Itineraries --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/itineraries*') ? 'active' : '' }}" href="{{ route('admin.itineraries.index') }}">
                            📅 Kelola Itineraries
                        </a>
                    </li>

                    {{-- 5. Villa Room (Tipe Kamar) --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/villa-rooms*') ? 'active' : '' }}" href="{{ route('admin.rooms.index') }}">
                            🛏️ Kelola Tipe Kamar
                        </a>
                    </li>

                    {{-- 6. Villa Gallery --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/villa-galleries*') ? 'active' : '' }}" href="{{ route('admin.villa.index') }}">
                            🏡 Kelola Galeri Villa
                        </a>
                    </li>

                    {{-- 7. Gallery (Galeri Umum) --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/galleries*') ? 'active' : '' }}" href="{{ route('admin.galleries.index') }}">
                            📸 Kelola Galeri
                        </a>
                    </li>

                    {{-- 8. Pesan Masuk --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/inquiries*') ? 'active' : '' }}" href="{{ route('admin.inquiries.index') }}">
                            📥 Pesan Masuk
                        </a>
                    </li>
                </ul>

                <hr class="text-secondary">

                <form action="{{ route('logout') }}" method="POST" class="px-2">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm w-100">
                        🚪 Logout
                    </button>
                </form>
            </div>
        </nav>

        <main class="col-md-9 col-lg-10 ms-sm-auto px-md-4 bg-light" style="min-height: 100vh;">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 fw-bold">Panel Kendali</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <span class="badge bg-secondary p-2">Halo, Admin Etalauser</span>
                </div>
            </div>

            <div class="py-2">
                @yield('content_admin')
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
