@extends('layouts.admin')

@section('content_admin')
<div class="mb-4">
    <a href="{{ route('admin.itineraries.index') }}" class="text-decoration-none text-success fw-bold d-inline-flex align-items-center gap-1.5 transition-transform hover-translate-x">
        <i class="bi bi-arrow-left-short fs-5"></i> Kembali ke Daftar Itinerary
    </a>
    <h3 class="fw-bold text-dark mt-2 tracking-tight">Buat Itinerary Perjalanan Baru</h3>
</div>

<div class="card shadow-sm border-0 rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('admin.itineraries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-4">
                <!-- Sisi Kiri: Kolom Data Konten Tekstual Paket -->
                <div class="col-lg-8">
                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold small text-dark">Nama / Judul Itinerary <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Contoh: 2 Days 1 Night Jungle Trekking Adventure" value="{{ old('title') }}" required autofocus>
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="duration" class="form-label fw-bold small text-dark">Durasi Perjalanan <span class="text-danger">*</span></label>
                        <input type="text" name="duration" id="duration" class="form-control @error('duration') is-invalid @enderror" placeholder="Contoh: 2 Hari 1 Malam" value="{{ old('duration') }}" required>
                        @error('duration') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label fw-bold small text-dark">Rincian Perjalanan (Rundown Per Hari) <span class="text-danger">*</span></label>
                        <textarea name="content" id="content" rows="10" class="form-control @error('content') is-invalid @enderror" placeholder="Hari 1: Penjemputan di Bandara Kualanamu dan check-in resort...&#10;Hari 2: Trekking melihat Orangutan di kawasan TNGL dan river tubing..." required>{{ old('content') }}</textarea>
                        @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <!-- Sisi Kanan: Metode Ganda Lampiran Gambar (Dual-Method Input) -->
                <div class="col-lg-4">
                    <div class="p-3 rounded-3 bg-light border border-secondary border-opacity-10 shadow-sm">
                        <h6 class="fw-bold text-dark small mb-3 border-bottom pb-2">
                            <i class="bi bi-image text-success me-1"></i> Metode Unggah Foto Banner
                        </h6>

                        {{-- Opsi A: Ketik Nama File Manual --}}
                        <div class="mb-3">
                            <label for="image_name" class="form-label fw-bold small text-secondary" style="font-size: 11px;">Pilihan 1: Ketik Nama File Manual</label>
                            <input type="text" name="image_name" id="image_name" class="form-control @error('image_name') is-invalid @enderror" placeholder="Contoh: banner_trekking.jpg" value="{{ old('image_name') }}">
                            <div class="form-text small text-muted" style="font-size: 11px;">Gunakan ini jika berkas gambar sudah disalin ke dalam direktori server.</div>
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
                <a href="{{ route('admin.itineraries.index') }}" class="btn btn-secondary px-4 rounded-2">Batal</a>
                <button type="submit" class="btn btn-success px-4 fw-bold rounded-2 shadow-sm">
                    <i class="bi bi-cloud-arrow-up-fill me-1"></i> Simpan &amp; Terbitkan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
