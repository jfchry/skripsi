@extends('layouts.admin')

@section('content_admin')
<div class="mb-4">
    <a href="{{ route('admin.rooms.index') }}" class="text-decoration-none text-success fw-bold d-inline-flex align-items-center gap-1.5 transition-transform hover-translate-x">
        <i class="bi bi-arrow-left-short fs-5"></i> Kembali ke Daftar Kamar
    </a>
    <h3 class="fw-bold text-dark mt-2 tracking-tight">Tambah Tipe Kamar Baru</h3>
</div>

<div class="card shadow-sm border-0 rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-4">
                <!-- Sisi Kiri: Data Tekstual Komoditas Kamar (Lebar 8) -->
                <div class="col-lg-8">
                    <div class="mb-3">
                        <label for="service_name" class="form-label fw-bold small text-dark">Nama Kamar <span class="text-danger">*</span></label>
                        <input type="text" name="service_name" id="service_name" class="form-control" placeholder="Contoh: Sangraloka, Gibbon, Siamang Suite" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label fw-bold small text-dark">Harga Per Malam (Angka saja) <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-muted fw-bold small">Rp</span>
                            <input type="number" name="price" id="price" class="form-control" placeholder="Contoh: 1500000" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold small text-dark">Deskripsi &amp; Rincian Fasilitas Kamar <span class="text-danger">*</span></label>
                        <textarea name="description" id="description" rows="8" class="form-control" placeholder="Tulis kapasitas ranjang, fasilitas kamar mandi, AC/Kipas, balkon tepi sungai, dan rincian kenyamanan lainnya (Gunakan Enter untuk baris baru)..." required></textarea>
                    </div>
                </div>

                <!-- Sisi Kanan: Metode Ganda Lampiran Gambar (Lebar 4 - Identik 100%) -->
                <div class="col-lg-4">
                    <div class="p-3 rounded-3 bg-light border border-secondary border-opacity-10 shadow-sm">
                        <h6 class="fw-bold text-dark small mb-3 border-bottom pb-2">
                            <i class="bi bi-image text-success me-1"></i> Metode Unggah Foto Utama
                        </h6>

                        {{-- Opsi A: Ketik Nama File Manual --}}
                        <div class="mb-3">
                            <label for="image_name" class="form-label fw-bold small text-secondary" style="font-size: 11px;">Pilihan 1: Ketik Nama File Manual</label>
                            <input type="text" name="image_name" id="image_name" class="form-control" placeholder="Contoh: room_deluxe.jpg">
                            <div class="form-text small text-muted" style="font-size: 11px;">Gunakan ini jika berkas gambar aset sudah tersimpan di repositori server.</div>
                        </div>

                        <div class="text-center my-2 position-relative">
                            <hr class="my-2">
                            <span class="position-absolute top-50 start-50 translate-middle bg-light px-2 text-muted fw-bold small" style="font-size: 10px;">ATAU</span>
                        </div>

                        {{-- Opsi B: Browse File dari Komputer --}}
                        <div class="mb-2">
                            <label for="image_url" class="form-label fw-bold small text-secondary" style="font-size: 11px;">Pilihan 2: Unggah Berkas dari Komputer</label>
                            <input type="file" name="image_url" id="image_url" class="form-control">
                            <div class="form-text small text-muted" style="font-size: 11px;">Format: JPG, JPEG, PNG (Maksimal 2MB).</div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="text-secondary opacity-25 my-4">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.rooms.index') }}" class="btn btn-secondary px-4 rounded-2">Batal</a>
                <button type="submit" class="btn btn-success px-4 fw-bold rounded-2 shadow-sm">
                    <i class="bi bi-cloud-arrow-up-fill me-1"></i> Ajukan Kamar Baru
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
