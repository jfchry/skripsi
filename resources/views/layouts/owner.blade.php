<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Pemilik - Smart Tourism Bukit Lawang</title>

    <!-- Bootstrap Core CSS (Stabil v5.3.3) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons (Satu Ekosistem Ikon Terpadu dengan Sisi Admin) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* CSS Khusus Peningkatan Estetika Sidebar CMS Owner */
        .sidebar {
            min-height: 100vh;
            background-color: #1e293b; /* Warna Slate Grey Premium bawaan Anda */
            box-shadow: inset -1px 0 0 rgba(255, 255, 255, 0.05);
        }

        .sidebar .nav-link {
            color: #cbd5e1;
            font-weight: 500;
            font-size: 0.925rem;
            padding: 12px 15px;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.2s ease-in-out;
        }

        /* Efek Interaktif Transisi Bergeser Lembut Khusus Menu Owner */
        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.05);
            color: #ffffff;
            border-radius: 6px;
            padding-left: 20px;
        }

        /* Gaya Menu Navigasi Sisi Aktif (Owner Sky Blue Identity) */
        .sidebar .nav-link.active {
            background-color: #0284c7; /* Warna Biru Sky bawaan Anda */
            color: #ffffff;
            border-radius: 6px;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(2, 132, 199, 0.25);
        }

        .main-content {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- BAR KOMPONEN SIDEBAR OWNER -->
        <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse p-3">
            <div class="position-sticky">
                <h5 class="text-white text-center fw-bold mb-4 py-3 border-bottom border-secondary border-opacity-25 letter-spacing-1">
                    <i class="bi bi-person-badge-fill text-info me-1"></i> Owner Panel
                </h5>

                <ul class="nav flex-column">
                    {{-- 1. Persetujuan Data --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('owner/dashboard*') || Request::is('owner/approval*') ? 'active' : '' }}" href="{{ route('owner.dashboard') }}">
                            <i class="bi bi-check2-all fs-5"></i> Persetujuan Data
                        </a>
                    </li>

                    {{-- 2. Riwayat Aktivitas (Log) --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('owner/history*') ? 'active' : '' }}" href="{{ route('owner.history') }}">
                            <i class="bi bi-clock-history"></i> Riwayat Aktivitas
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

        <!-- AREA KONTEN UTAMA VERIFIKASI -->
        <main class="col-md-9 col-lg-10 ms-sm-auto px-md-4 main-content" style="min-height: 100vh;">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom border-secondary border-opacity-10">
                <h1 class="h2 fw-bold text-dark tracking-tight">Verifikasi Data Website</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <span class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25 px-3 py-2 rounded-pill small fw-bold">
                        <i class="bi bi-person-bounding-box me-1"></i> Halo, {{ Auth::user()->full_name ?? 'Owner Utama' }}
                    </span>
                </div>
            </div>

            <!-- TEMPAT MENYUNTIKKAN VIEW KONTEN MODUL OWNER -->
            <div class="py-2">
                @yield('content')
            </div>
        </main>
    </div>
</div>

<!-- Bootstrap JS Core Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
