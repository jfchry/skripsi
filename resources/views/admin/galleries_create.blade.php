@extends('layouts.admin')

@section('content_admin')
<div class="mb-4">
    <a href="{{ route('admin.galleries.index') }}" class="text-decoration-none text-success fw-bold d-inline-flex align-items-center gap-1.5 transition-transform hover-translate-x">
        <i class="bi bi-arrow-left-short fs-5"></i> Kembali ke Daftar Galeri
    </a>
    <h3 class="fw-bold text-dark mt-2 tracking-tight">Unggah Foto Galeri Baru</h3>
</div>

<div class="card shadow-sm border-0 rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-4">
                <!-- Sisi Kiri: Data Tekstual Galeri (Lebar 8) -->
                <div class="col-lg-8">

                    {{-- Input Judul / Caption Foto --}}
                    <div class="mb-4">
                        <label for="caption" class="form-label fw-bold small text-dark">Judul / Keterangan Foto (Caption) <span class="text-danger">*</span></label>
                        <input type="text" name="caption" id="caption" class="form-control @error('caption') is-invalid @enderror" placeholder="Contoh: Keseruan Wisatawan Internasional Saat River Tubing di Sungai Bahorok" value="{{ old('caption') }}" required autofocus>
                        <div class="form-text small text-muted">Keterangan ini akan muncul sebagai teks deskripsi saat foto diklik oleh pengunjung di halaman depan.</div>
                        @error('caption') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Input Pemetaan Section / Penempatan Komponen Halaman --}}
                    <div class="mb-3 p-3 rounded-3 bg-light border border-secondary border-opacity-10">
                        <label for="parent_type" class="form-label fw-bold small text-dark d-flex align-items-center gap-1.5">
                            <i class="bi bi-layers-half text-success"></i> Penempatan Komponen Halaman <span class="text-danger">*</span>
                        </label>
                        <select name="parent_type" id="parent_type" class="form-select fw-bold" required>
                            <option value="destination" {{ old('parent_type') == 'destination' ? 'selected' : '' }}>Tampilkan di Section Atas (Hero Banner / Sorotan Utama)</option>
                            <option value="general" {{ old('parent_type') == 'general' ? 'selected' : '' }}>Tampilkan di Section Bawah (Kluster Dokumentasi Pengalaman)</option>
                        </select>
                        <div class="form-text small text-muted mt-2" style="font-size: 11px; line-height: 1.4;">
                            Sistem akan menggunakan parameter ini untuk merender posisi grid gambar pada *landing page* secara otomatis sesuai konfigurasi template.
                        </div>
                    </div>

                </div>

                <!-- Sisi Kanan: Metode Ganda Lampiran Gambar (Lebar 4 - Identik 100%) -->
                <div class="col-lg-4">
                    <div class="p-3 rounded-3 bg-light border border-secondary border-opacity-10 shadow-sm">
                        <h6 class="fw-bold text-dark small mb-3 border-bottom pb-2">
                            <i class="bi bi-camera-fill text-success me-1"></i> Metode Lampiran Berkas
                        </h6>

                        {{-- Opsi A: Ketik Nama File Manual --}}
                        <div class="mb-3">
                            <label for="image_name" class="form-label fw-bold small text-secondary" style="font-size: 11px;">Pilihan 1: Ketik Nama File Manual</label>
                            <input type="text" name="image_name" id="image_name" class="form-control @error('image_name') is-invalid @enderror" placeholder="Contoh: galeri_trekking1.jpg" value="{{ old('image_name') }}">
                            <div class="form-text small text-muted" style="font-size: 11px;">Gunakan opsi ini jika aset gambar sudah dimasukkan ke folder direktori <code class="text-danger">storage/</code> server.</div>
                            @error('image_name') <div class="invalid-feedback" style="display: block;">{{ $message }}</div> @enderror
                        </div>

                        <div class="text-center my-2 position-relative">
                            <hr class="my-2">
                            <span class="position-absolute top-50 start-50 translate-middle bg-light px-2 text-muted fw-bold small" style="font-size: 10px;">ATAU</span>
                        </div>

                        {{-- Opsi B: Browse File dari Komputer --}}
                        <div class="mb-2">
                            <label for="image_url" class="form-label fw-bold small text-secondary" style="font-size: 11px;">Pilihan 2: Unggah Berkas dari Komputer</label>
                            <input type="file" name="image_url" id="image_url" class="form-control @error('image_url') is-invalid @enderror">
                            <div class="form-text small text-muted" style="font-size: 11px;">Format berkas yang didukung: JPG, JPEG, PNG (Maksimal kapasitas file 2MB).</div>
                            @error('image_url') <div class="invalid-feedback" style="display: block;">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
            </div>

            <hr class="text-secondary opacity-25 my-4">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary px-4 rounded-2">Batal</a>
                <button type="submit" class="btn btn-success px-4 fw-bold rounded-2 shadow-sm">
                    <i class="bi bi-cloud-arrow-up-fill me-1"></i> Unggah Foto Galeri
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
