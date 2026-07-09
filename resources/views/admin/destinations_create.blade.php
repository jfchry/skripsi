@extends('layouts.admin')

@section('content_admin')
<div class="mb-4">
    <a href="{{ route('admin.destinations.index') }}" class="text-decoration-none text-success fw-bold d-inline-flex align-items-center gap-1.5 transition-transform hover-translate-x">
        <i class="bi bi-arrow-left-short fs-5"></i> Kembali ke Daftar Destinasi
    </a>
    <h3 class="fw-bold text-dark mt-2 tracking-tight">Tambah Destinasi Wisata Baru</h3>
</div>

<div class="card shadow-sm border-0 rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('admin.destinations.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-4">
                <!-- Sisi Kiri: Data Tekstual Destinasi -->
                <div class="col-lg-8">
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold small text-dark">Nama Destinasi Wisata <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name"
                               class="form-control @error('name') is-invalid @enderror"
                               placeholder="Contoh: Orangutan Trekking Bukit Lawang"
                               value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="location_description" class="form-label fw-bold small text-dark">Deskripsi Lengkap Lokasi <span class="text-danger">*</span></label>
                        <textarea name="location_description" id="location_description" rows="10"
                                  class="form-control @error('location_description') is-invalid @enderror"
                                  placeholder="Tuliskan cerita, daya tarik, keasrian ekosistem, dan informasi mendetail mengenai destinasi di sini..." required>{{ old('location_description') }}</textarea>
                        @error('location_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Sisi Kanan: Metode Ganda Lampiran Gambar (Dual-Method Input - SAMA DENGAN GUIDES) -->
                <div class="col-lg-4">
                    <div class="p-3 rounded-3 bg-light border border-secondary border-opacity-10 shadow-sm">
                        <h6 class="fw-bold text-dark small mb-3 border-bottom pb-2">
                            <i class="bi bi-image text-success me-1"></i> Metode Unggah Foto Destinasi
                        </h6>

                        {{-- Opsi A: Ketik Nama File Manual --}}
                        <div class="mb-3">
                            <label for="image_name" class="form-label fw-bold small text-secondary" style="font-size: 11px;">Pilihan 1: Ketik Nama File Manual</label>
                            <input type="text" name="image_name" id="image_name" class="form-control @error('image_name') is-invalid @enderror" placeholder="Contoh: wisata1.jpg" value="{{ old('image_name') }}">
                            <div class="form-text small text-muted" style="font-size: 11px;">Gunakan ini jika file sudah berada di dalam folder <code class="text-danger">public/storage</code>.</div>
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
                <a href="{{ route('admin.destinations.index') }}" class="btn btn-secondary px-4 rounded-2">Batal</a>
                <button type="submit" class="btn btn-success px-4 fw-bold rounded-2 shadow-sm">
                    <i class="bi bi-cloud-arrow-up-fill me-1"></i> Simpan Destinasi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
