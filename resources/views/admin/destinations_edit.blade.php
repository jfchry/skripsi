@extends('layouts.admin')

@section('content_admin')
<div class="mb-4">
    <a href="{{ route('admin.destinations.index') }}" class="text-decoration-none text-success fw-bold d-inline-flex align-items-center gap-1.5 transition-transform hover-translate-x">
        <i class="bi bi-arrow-left-short fs-5"></i> Kembali ke Daftar Destinasi
    </a>
    <h3 class="fw-bold text-dark mt-2 tracking-tight">Ubah / Edit Destinasi Wisata</h3>
</div>

<div class="card shadow-sm border-0 rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('admin.destinations.update', $destination->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-4">
                <!-- Sisi Kiri: Kolom Data Konten -->
                <div class="col-lg-8">
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold small text-dark">Nama Destinasi Wisata <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $destination->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="location_description" class="form-label fw-bold small text-dark">Deskripsi Lengkap Lokasi <span class="text-danger">*</span></label>
                        <textarea name="location_description" id="location_description" rows="10"
                                  class="form-control @error('location_description') is-invalid @enderror" required>{{ old('location_description', $destination->location_description) }}</textarea>
                        @error('location_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Sisi Kanan: Komparasi Pratinjau & Metode Ganda Modifikasi Gambar (SAMA DENGAN GUIDES) -->
                <div class="col-lg-4">
                    <div class="p-3 rounded-3 bg-light border border-secondary border-opacity-10 shadow-sm">
                        <label class="form-label fw-bold small text-dark d-block mb-2"><i class="bi bi-card-image text-muted me-1"></i> Foto Destinasi Saat Ini</label>
                        <div class="mb-3">
                            @if($destination->image_url)
                                <img src="{{ asset('storage/' . $destination->image_url) }}"
                                     alt="{{ $destination->name }}"
                                     class="rounded-3 border shadow-sm img-thumbnail w-100"
                                     style="height: 140px; object-fit: cover;">
                            @else
                                <div class="p-3 bg-white border rounded-3 text-muted small text-center d-flex align-items-center justify-content-center gap-2" style="height: 140px;">
                                    <i class="bi bi-image-alt"></i> Belum ada foto.
                                </div>
                            @endif
                        </div>

                        <h6 class="fw-bold text-dark mb-3 border-bottom pb-1" style="font-size: 12px;">Modifikasi Gambar</h6>

                        {{-- Ubah via Nama File Teks --}}
                        <div class="mb-3">
                            <label for="image_name" class="form-label fw-bold small text-secondary" style="font-size: 11px;">Metode 1: Ubah via Nama File Baru</label>
                            <input type="text" name="image_name" id="image_name" class="form-control @error('image_name') is-invalid @enderror" placeholder="Contoh: wisata_baru.jpg" value="{{ old('image_name') }}">
                            @error('image_name') <div class="invalid-feedback" style="display: block;">{{ $message }}</div> @enderror
                        </div>

                        <div class="text-center my-2 position-relative">
                            <hr class="my-2">
                            <span class="position-absolute top-50 start-50 translate-middle bg-light px-2 text-muted fw-bold small" style="font-size: 10px;">ATAU</span>
                        </div>

                        {{-- Ubah via Upload Komputer --}}
                        <div class="mb-2">
                            <label for="image_url" class="form-label fw-bold small text-secondary" style="font-size: 11px;">Metode 2: Ganti File Berkas Langsung</label>
                            <input type="file" name="image_url" id="image_url" class="form-control @error('image_url') is-invalid @enderror">
                            <div class="form-text small text-muted" style="font-size: 11px;">Format: JPG, JPEG, PNG (Maksimal 2MB).</div>
                            @error('image_url') <div class="invalid-feedback" style="display: block;">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
            </div>

            <hr class="text-secondary opacity-25 my-4">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.destinations.index') }}" class="btn btn-secondary px-4 rounded-2">Batal</a>
                <button type="submit" class="btn btn-warning px-4 fw-bold text-white rounded-2 shadow-sm">
                    <i class="bi bi-check-circle-fill me-1"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
