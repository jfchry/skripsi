@extends('layouts.admin')

@section('content_admin')
<div class="mb-4">
    <a href="{{ route('admin.villa.index') }}" class="text-decoration-none text-success fw-bold d-inline-flex align-items-center gap-1.5 transition-transform hover-translate-x">
        <i class="bi bi-arrow-left-short fs-5"></i> Kembali ke Daftar Galeri
    </a>
    <h3 class="fw-bold text-dark mt-2 tracking-tight">Unggah Foto Fasilitas Villa Baru</h3>
</div>

<div class="card shadow-sm border-0 rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('admin.villa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-4">
                <!-- Sisi Kiri: Deskripsi Konten Teks (Lebar 8) -->
                <div class="col-lg-8">
                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold small text-dark">Keterangan / Nama Fasilitas <span class="text-danger">*</span></label>
                        <textarea name="title" id="title" rows="5" class="form-control @error('title') is-invalid @enderror" placeholder="Contoh: Eksterior lanskap kolam renang outdoor ecoresort pada waktu senja / Tata ruang interior tipe kamar Sangraloka." required autofocus>{{ old('title') }}</textarea>
                        <div class="form-text small text-muted">Berikan deskripsi detail foto untuk memudahkan pengunjung memahami tata letak fasilitas resort.</div>
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                            <input type="text" name="image_name" id="image_name" class="form-control @error('image_name') is-invalid @enderror" placeholder="Contoh: villa_pool.jpg" value="{{ old('image_name') }}">
                            <div class="form-text small text-muted" style="font-size: 11px;">Gunakan opsi ini jika aset berkas gambar sudah dimasukkan di folder <code class="text-danger">storage/villa_services/</code>.</div>
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
                            <div class="form-text small text-muted" style="font-size: 11px;">Format: JPG, JPEG, PNG (Maksimal 2MB).</div>
                            @error('image_url') <div class="invalid-feedback" style="display: block;">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
            </div>

            <hr class="text-secondary opacity-25 my-4">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.villa.index') }}" class="btn btn-secondary px-4 rounded-2">Batal</a>
                <button type="submit" class="btn btn-success px-4 fw-bold rounded-2 shadow-sm">
                    <i class="bi bi-cloud-arrow-up-fill me-1"></i> 🚀 Ajukan ke Owner
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
