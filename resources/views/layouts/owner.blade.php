<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Panel - Smart Tourism Bukit Lawang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Tetap mempertahankan Sidebar penuh ke bawah */
        .sidebar {
            min-height: 100vh;
            background-color: #1e293b; /* Warna Slate Grey Premium agar beda dari Admin */
        }
        .sidebar .nav-link {
            color: #cbd5e1;
            margin-bottom: 5px;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: #0284c7; /* Warna Biru Sky untuk membedakan identitas Owner */
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
                    Owner Panel
                </h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('owner/dashboard*') || Request::is('owner/approval*') ? 'active' : '' }}" href="{{ route('owner.dashboard') }}">
                            📋 Persetujuan Data
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('owner/history*') ? 'active' : '' }}" href="{{ route('owner.history') }}">
                            📜 Riwayat Aktivitas (Log)
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
                <h1 class="h2 fw-bold">Verifikasi Website</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <span class="badge bg-info text-dark p-2">Halo, {{ Auth::user()->full_name ?? 'Owner Utama' }}</span>
                </div>
            </div>

            <div class="py-2">
                @yield('content')
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
