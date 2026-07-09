@extends('layouts.admin')

@section('content_admin')
<div class="mb-4">
    <a href="{{ route('admin.guides.index') }}" class="text-decoration-none text-success fw-bold d-inline-flex align-items-center gap-1.5 transition-transform hover-translate-x">
        <i class="bi bi-arrow-left-short fs-5"></i> Kembali ke Daftar Panduan
    </a>
    <h3 class="fw-bold text-dark mt-2 tracking-tight">Ubah / Edit Artikel Panduan</h3>
</div>

<div class="card shadow-sm border-0 rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('admin.guides.update', $guide->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-4">
                <!-- Sisi Kiri: Kolom Data Konten -->
                <div class="col-lg-8">
                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold small text-dark">Judul Artikel Panduan <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $guide->title) }}" required>
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label fw-bold small text-dark">Isi Lengkap Panduan Wisata <span class="text-danger">*</span></label>
                        <textarea name="content" id="content" rows="10" class="form-control @error('content') is-invalid @enderror" required>{{ old('content', $guide->body) }}</textarea>
                        @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <!-- Sisi Kanan: Komparasi Pratinjau & Metode Ganda Modifikasi Gambar -->
                <div class="col-lg-4">
                    <div class="p-3 rounded-3 bg-light border border-secondary border-opacity-10 shadow-sm">
                        <label class="form-label fw-bold small text-dark d-block mb-2"><i class="bi bi-card-image text-muted me-1"></i> Foto Sampul Saat Ini</label>
                        <div class="mb-3">
                            <img src="{{ $guide->image_url ? asset('storage/' . $guide->image_url) : 'https://images.unsplash.com/photo-1540573133985-87b6da6d54a9?q=80&w=200' }}"
                                 class="img-thumbnail w-100 shadow-sm rounded-2" style="height: 140px; object-fit: cover;" alt="Current Cover">
                        </div>

                        <h6 class="fw-bold text-dark mb-3 border-bottom pb-1" style="font-size: 12px;">Modifikasi Gambar</h6>

                        {{-- Ubah via Nama File Teks --}}
                        <div class="mb-3">
                            <label for="image_name" class="form-label fw-bold small text-secondary" style="font-size: 11px;">Metode 1: Ubah via Nama File Baru</label>
                            <input type="text" name="image_name" id="image_name" class="form-control @error('image_name') is-invalid @enderror" placeholder="Contoh: guide_baru.jpg" value="{{ old('image_name') }}">
                        </div>

                        <div class="text-center my-2 position-relative">
                            <hr class="my-2">
                            <span class="position-absolute top-50 start-50 translate-middle bg-light px-2 text-muted fw-bold small" style="font-size: 10px;">ATAU</span>
                        </div>

                        {{-- Ubah via Upload Komputer --}}
                        <div class="mb-2">
                            <label for="image_url" class="form-label fw-bold small text-secondary" style="font-size: 11px;">Metode 2: Ganti File Berkas Langsung</label>
                            <input type="file" name="image_url" id="image_url" class="form-control @error('image_url') is-invalid @enderror">
                            @error('image_url') <div class="invalid-feedback" style="display: block;">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
            </div>

            <hr class="text-secondary opacity-25 my-4">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.guides.index') }}" class="btn btn-secondary px-4 rounded-2">Batal</a>
                <button type="submit" class="btn btn-warning px-4 fw-bold text-white rounded-2 shadow-sm">
                    <i class="bi bi-check-circle-fill me-1"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
