<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Tourism Hub - Bukit Lawang</title>

    <!-- Google Font (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap Core CSS (Stabil v5.3.3) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons (Wajib Ada untuk Ikon di Landing Page & Modal) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Global Layout Styling -->
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
            background-color: #ffffff;
        }

        /* ==========================================================================
           Komponen Global Aplikasi
           ========================================================================== */

        /* Navigasi */
        .navbar {
            transition: all 0.3s ease-in-out;
            padding: 15px 0;
        }

        .navbar-brand {
            font-size: 1.3rem;
            letter-spacing: -0.5px;
        }

        .nav-link {
            font-weight: 500;
            margin-left: 10px;
            transition: all 0.2s ease-in-out;
        }

        /* Hero Header */
        /* Hero Header */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            /* TAMBAHKAN PADDING TOP UNTUK MENGANTISIPASI TINGGI NAVBAR */
            padding-top: 80px;

            background: linear-gradient(rgba(0, 0, 0, .55), rgba(0, 0, 0, .55)),
                        url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1920') no-repeat center center;
            background-size: cover;
            color: white;
        }

        /* Tata Letak Konten */
        .section-padding {
            padding: 90px 0;
        }

        /* Tombol & Aksi */
        .btn-success {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            transition: all 0.2s ease-in-out;
        }

        .btn-success:hover {
            background-color: var(--dark-green);
            border-color: var(--dark-green);
        }

        /* Floating Action Button (Tombol Kirim Pesan) */
        .fab-inquiry {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            z-index: 9999;
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .fab-inquiry:hover {
            transform: scale(1.1) rotate(5deg);
        }

        /* Kartu Wisata */
        .card {
            border: none;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        /* Media Queries (Responsive Grid Breakpoints) */
        @media (max-width: 992px) {
            .hero { text-align: center; }
            .hero h1 { font-size: 3rem; }
            .hero p { margin: auto; }
        }

        @media (max-width: 768px) {
            .hero h1 { font-size: 2.5rem; }
            .section-padding { padding: 60px 0; }
            .fab-inquiry { bottom: 20px; right: 20px; width: 50px; height: 50px; }
        }
    </style>
</head>

<body>

    <!-- SUNTIKAN KONTEN HALAMAN UTAMA -->
    @yield('content')

    <!-- COMPONENT: FLOATING ACTION BUTTON (FAB) INQUIRY -->
    <button type="button" class="btn btn-success rounded-circle shadow-lg d-flex align-items-center justify-content-center fab-inquiry"
            data-bs-toggle="modal" data-bs-target="#inquiryModal" title="Kirim Pertanyaan">
        <i class="bi bi-envelope-paper-fill fs-4 text-white"></i>
    </button>

    <!-- COMPONENT: MODAL FORM INQUIRY -->
    <div class="modal fade" id="inquiryModal" tabindex="-1" aria-labelledby="inquiryModalLabel" aria-hidden="true" style="z-index: 10000;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-3">
                <div class="modal-header bg-success text-white py-3">
                    <h5 class="modal-title fw-bold fs-6 d-flex align-items-center" id="inquiryModalLabel">
                        <i class="bi bi-leaf me-2"></i> Kirim Pesan / Pertanyaan Wisata
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('inquiries.store') }}" method="POST">
                    @csrf
                    <div class="modal-body p-4">
                        <p class="small text-muted mb-4" style="line-height: 1.5; text-align: justify;">
                            Punya kendala atau pertanyaan seputar akomodasi resort dan paket perjalanan di Bukit Lawang? Tinggalkan pesan Anda di bawah ini, tim operasional kami akan segera memberikan respons.
                        </p>

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-dark">Nama Lengkap <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-light text-muted"><i class="bi bi-person"></i></span>
                                <input type="text" name="name" class="form-control" placeholder="Contoh: Budi Santoso" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-dark">Alamat E-mail <span class="text-muted text-opacity-50">(Opsional)</span></label>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-light text-muted"><i class="bi bi-envelope"></i></span>
                                <input type="email" name="email" class="form-control" placeholder="Contoh: budi@gmail.com">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-dark">Nomor WhatsApp <span class="text-muted text-opacity-50">(Opsional)</span></label>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-light text-muted"><i class="bi bi-whatsapp"></i></span>
                                <input type="text" name="phone" class="form-control" placeholder="Contoh: 081234567xxx">
                            </div>
                        </div>

                        <div class="mb-0">
                            <label class="form-label small fw-bold text-dark">Isi Pesan / Pertanyaan <span class="text-danger">*</span></label>
                            <textarea name="message" rows="4" class="form-control form-control-sm" placeholder="Tuliskan detail pertanyaan atau rencana perjalanan Anda di sini..." required></textarea>
                        </div>
                    </div>

                    <div class="modal-footer bg-light border-top p-3">
                        <button type="button" class="btn btn-secondary btn-sm px-3 rounded-pill" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success btn-sm fw-bold px-4 rounded-pill shadow-sm">Kirim Pesan 🚀</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap Core JS JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
