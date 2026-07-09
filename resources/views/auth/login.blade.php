<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Portal - Smart Tourism Bukit Lawang</title>

    <!-- Bootstrap Core CSS (Stabil v5.3.3) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* Gaya Visual Premium Bertema Ekowisata Bukit Lawang */
        body {
            background: linear-gradient(135deg, #1e2229 0%, #111418 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: system-ui, -apple-system, sans-serif;
            position: relative;
            overflow: hidden;
        }

        /* Ornamen Dekoratif Lingkaran Latar Belakang */
        body::before {
            content: "";
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(25, 135, 84, 0.15) 0%, rgba(0,0,0,0) 70%);
            top: -100px;
            right: -100px;
            z-index: 1;
        }

        body::after {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(20, 83, 45, 0.1) 0%, rgba(0,0,0,0) 70%);
            bottom: -150px;
            left: -150px;
            z-index: 1;
        }

        .login-container {
            position: relative;
            z-index: 2;
        }

        /* Kartu Login Frosted Glass Modern */
        .card-login {
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }

        .brand-icon-wrapper {
            width: 65px;
            height: 65px;
            background-color: rgba(25, 135, 84, 0.1);
            color: #198754;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            margin: 0 auto 20px auto;
        }

        /* Efek Interaktif Fokus Form Input */
        .form-control:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.15);
        }

        .btn-submit-login {
            background-color: #198754;
            border: none;
            transition: all 0.2s ease-in-out;
        }

        .btn-submit-login:hover {
            background-color: #14532d;
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(25, 135, 84, 0.3);
        }

        /* Navigasi Link Kembali Ke Home */
        .back-to-home-link {
            color: #6c757d;
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.2s ease-in-out;
        }

        .back-to-home-link:hover {
            color: #198754;
        }
    </style>
</head>
<body>

<div class="container login-container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6 col-lg-4">

            <div class="card card-login border-0 p-3 m-2">
                <div class="card-body">

                    <!-- Simbol Identitas Sistem -->
                    <div class="brand-icon-wrapper shadow-sm">
                        <i class="bi bi-shield-lock-fill fs-3"></i>
                    </div>

                    <h4 class="fw-bold text-center text-dark mb-1 tracking-tight">CMS PORTAL</h4>
                    <p class="text-muted text-center small mb-4" style="font-size: 12px;">Smart Tourism Bukit Lawang &amp; Villa Etalauser</p>

                    <!-- BLOK PENANGANAN ERROR VALIDASI -->
                    @if ($errors->any())
                        <div class="alert alert-danger border-0 bg-danger bg-opacity-10 text-danger rounded-3 p-3 small mb-4 shadow-sm" role="alert">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-exclamation-triangle-fill"></i>
                                <div>{{ $errors->first() }}</div>
                            </div>
                        </div>
                    @endif

                    <!-- FORM PROSES AUTENTIKASI -->
                    <form action="{{ route('login.process') }}" method="POST">
                        @csrf

                        <!-- Username Field -->
                        <div class="mb-3">
                            <label for="username" class="form-label small fw-bold text-secondary">Nama Pengguna (Username)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-person"></i></span>
                                <input type="text" name="username" id="username"
                                       class="form-control border-start-0 bg-light bg-opacity-20"
                                       placeholder="Ketik username Anda"
                                       value="{{ old('username') }}" required autofocus>
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="mb-4">
                            <label for="password" class="form-label small fw-bold text-secondary">Kata Sandi (Password)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-key"></i></span>
                                <input type="password" name="password" id="password"
                                       class="form-control border-start-0 bg-light bg-opacity-20"
                                       placeholder="Ketik password Anda" required>
                            </div>
                        </div>

                        <!-- Submit Action Button -->
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success btn-submit-login w-100 py-2.5 fw-bold rounded-2 text-white shadow-sm d-flex align-items-center justify-content-center gap-2">
                                <i class="bi bi-box-arrow-in-right"></i> Masuk Ke Dashboard
                            </button>
                        </div>
                    </form>

                    <!-- GARIS PEMISAH & NAVIGASI KEMBALI KE HOME -->
                    <div class="text-center mt-3 pt-2 border-top border-secondary border-opacity-10">
                        <a href="{{ url('/') }}" class="back-to-home-link d-inline-flex align-items-center gap-1.5">
                            <i class="bi bi-house-door-fill"></i> Kembali ke Halaman Utama
                        </a>
                    </div>

                </div>
            </div>

            <!-- Teks Hak Cipta Kaki Halaman Mini -->
            <p class="text-center text-white-50 small mt-3 mb-0" style="font-size: 11px; opacity: 0.4;">
                &copy; {{ date('Y') }} Smart Tourism Bukit Lawang. Hak Cipta Dilindungi.
            </p>

        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
