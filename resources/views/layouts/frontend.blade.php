<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Tourism Bukit Lawang</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #198754;
            --dark-green: #14532d;
            --light-bg: #f8f5f0;
            --dark-color: #212529;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--dark-color);
            overflow-x: hidden;
        }

        /* =========================
           Navbar
        ========================= */

        .navbar {
            background: rgba(0, 0, 0, 0.35);
            backdrop-filter: blur(10px);
            transition: 0.3s;
            padding: 15px 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.3rem;
        }

        .nav-link {
            color: white !important;
            font-weight: 500;
            margin-left: 10px;
            transition: .3s;
        }

        .nav-link:hover {
            color: #d4edda !important;
        }

        /* =========================
           Hero
        ========================= */

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;

            background:
                linear-gradient(
                    rgba(0, 0, 0, .45),
                    rgba(0, 0, 0, .45)
                ),
                url('https://images.unsplash.com/photo-1506744038136-46273834b3fb');

            background-size: cover;
            background-position: center;
            color: white;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: 800;
            line-height: 1.1;
        }

        .hero p {
            max-width: 650px;
            font-size: 1.15rem;
        }

        /* =========================
           Section
        ========================= */

        .section-padding {
            padding: 120px 0;
        }

        .section-title {
            font-weight: 700;
            margin-bottom: 20px;
        }

        /* =========================
           Buttons
        ========================= */

        .btn-success {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-success:hover {
            background-color: var(--dark-green);
            border-color: var(--dark-green);
        }

        /* =========================
           Cards
        ========================= */

        .card {
            border: none;
            overflow: hidden;
            transition: .35s ease;
        }

        .card img {
            transition: .35s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card:hover img {
            transform: scale(1.05);
        }

        /* =========================
           Images
        ========================= */

        .img-fluid {
            border-radius: 12px;
        }

        /* =========================
           Footer
        ========================= */

        footer {
            background: #111;
        }

        /* =========================
           Responsive
        ========================= */

        @media (max-width: 992px) {

            .hero {
                text-align: center;
            }

            .hero h1 {
                font-size: 3rem;
            }

            .hero p {
                margin: auto;
            }
        }

        @media (max-width: 768px) {

            .hero h1 {
                font-size: 2.5rem;
            }

            .section-padding {
                padding: 80px 0;
            }
        }
    </style>

    <button type="button" class="btn btn-success rounded-circle shadow-lg d-flex align-items-center justify-content-center"
        data-bs-toggle="modal" data-bs-target="#inquiryModal"
        style="position: fixed; bottom: 30px; right: 30px; width: 60px; height: 60px; z-index: 9999; transition: transform 0.2s;">
    <span class="fs-3">📩</span>
</button>

<div class="modal fade" id="inquiryModal" tabindex="-1" aria-labelledby="inquiryModalLabel" aria-hidden="true" style="z-index: 10000;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title fw-bold" id="inquiryModalLabel">🌿 Kirim Pesan / Pertanyaan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('inquiries.store') }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <p class="small text-muted mb-3">Punya pertanyaan seputar akomodasi atau paket wisata? Tinggalkan pesan Anda di bawah ini, tim kami akan segera merespons.</p>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control form-control-sm" placeholder="Contoh: Budi Santoso" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Alamat E-mail</label>
                        <input type="email" name="email" class="form-control form-control-sm" placeholder="Contoh: budi@gmail.com" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Nomor WhatsApp *(Opsional)</label>
                        <input type="text" name="phone" class="form-control form-control-sm" placeholder="Contoh: 0812345678xx">
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Isi Pesan / Pertanyaan</label>
                        <textarea name="message" rows="4" class="form-control form-control-sm" placeholder="Tuliskan pesan Anda di sini..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer bg-light p-3">
                    <button type="button" class="btn btn-secondary btn-sm px-3" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success btn-sm fw-bold px-4">Kirim Pesan 🚀</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    button[data-bs-target="#inquiryModal"]:hover {
        transform: scale(1.1);
        background-color: #198754 !important;
    }
</style>

</head>

<body>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
