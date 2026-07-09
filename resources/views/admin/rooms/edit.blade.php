@extends('layouts.admin')

@section('content_admin')
<div class="mb-4">
    <a href="{{ route('admin.rooms.index') }}" class="text-decoration-none text-success fw-bold d-inline-flex align-items-center gap-1.5 transition-transform hover-translate-x">
        <i class="bi bi-arrow-left-short fs-5"></i> Kembali ke Daftar Kamar
    </a>
    <h3 class="fw-bold text-dark mt-2 tracking-tight">Edit Spesifikasi Tipe Kamar</h3>
</div>

<div class="card shadow-sm border-0 rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('admin.rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-4">
                <!-- Sisi Kiri: Kolom Data Konten -->
                <div class="col-lg-8">
                    <div class="mb-3">
                        <label for="service_name" class="form-label fw-bold small text-dark">Nama Kamar <span class="text-danger">*</span></label>
                        <input type="text" name="service_name" id="service_name" class="form-control" value="{{ old('service_name', $room->service_name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label fw-bold small text-dark">Harga Per Malam (Angka saja) <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-muted fw-bold small">Rp</span>
                            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $room->price) }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold small text-dark">Deskripsi &amp; Rincian Fasilitas Kamar <span class="text-danger">*</span></label>
                        <textarea name="description" id="description" rows="8" class="form-control" required>{{ old('description', $room->description) }}</textarea>
                    </div>
                </div>

                <!-- Sisi Kanan: Komparasi Pratinjau & Metode Ganda Modifikasi Gambar -->
                <div class="col-lg-4">
                    <div class="p-3 rounded-3 bg-light border border-secondary border-opacity-10 shadow-sm">
                        <label class="form-label fw-bold small text-dark d-block mb-2"><i class="bi bi-card-image text-muted me-1"></i> Foto Kamar Saat Ini</label>
                        <div class="mb-3">
                            @if($room->icon_url)
                                <img src="{{ asset('storage/' . $room->icon_url) }}"
                                     alt="{{ $room->service_name }}"
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
                            <input type="text" name="image_name" id="image_name" class="form-control" placeholder="Contoh: room_deluxe_new.jpg" value="{{ old('image_name') }}">
                        </div>

                        <div class="text-center my-2 position-relative">
                            <hr class="my-2">
                            <span class="position-absolute top-50 start-50 translate-middle bg-light px-2 text-muted fw-bold small" style="font-size: 10px;">ATAU</span>
                        </div>

                        {{-- Ubah via Upload Komputer --}}
                        <div class="mb-2">
                            <label for="image_url" class="form-label fw-bold small text-secondary" style="font-size: 11px;">Metode 2: Ganti File Berkas Langsung</label>
                            <input type="file" name="image_url" id="image_url" class="form-control">
                            <div class="form-text small text-muted" style="font-size: 11px;">Format: JPG, JPEG, PNG (Maksimal 2MB).</div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="text-secondary opacity-25 my-4">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.rooms.index') }}" class="btn btn-secondary px-4 rounded-2">Batal</a>
                <button type="submit" class="btn btn-warning px-4 fw-bold text-white rounded-2 shadow-sm">
                    <i class="bi bi-check-circle-fill me-1"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
