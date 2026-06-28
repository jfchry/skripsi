@extends('layouts.admin')

@section('content_admin')
<div class="mb-4">
    <a href="{{ route('admin.itineraries.index') }}" class="text-decoration-none text-success fw-bold">
        ⬅️ Kembali ke Daftar Itinerary
    </a>
    <h3 class="fw-bold text-dark mt-2">Buat Itinerary Perjalanan Baru</h3>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-4">
        <form action="{{ route('admin.itineraries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold small">Nama / Judul Itinerary</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Contoh: 2 Days 1 Night Jungle Trekking Adventure" value="{{ old('title') }}" required autofocus>
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="excerpt" class="form-label fw-bold small">Ringkasan Singkat Paket</label>
                        <textarea name="excerpt" id="excerpt" rows="2" class="form-control @error('excerpt') is-invalid @enderror" placeholder="Tulis deskripsi singkat penarik minat wisatawan...">{{ old('excerpt') }}</textarea>
                        @error('excerpt') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label fw-bold small">Rincian Perjalanan (Rundown Per Hari)</label>
                        <textarea name="content" id="content" rows="10" class="form-control @error('content') is-invalid @enderror" placeholder="Day 1: Penjemputan di Medan, Perjalanan ke Bukit Lawang, Check-in Villa Etalauser...&#10;Day 2: Trekking Taman Nasional, Bertemu Orangutan, River Tubing..." required>{{ old('content') }}</textarea>
                        @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mb-3 shadow-sm p-3 rounded bg-light border">
                        <label for="status" class="form-label fw-bold small text-success">🟢 Status Publikasi</label>
                        <select name="status" id="status" class="form-select fw-bold" required>
                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Set Aktif (Published)</option>
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Simpan sebagai Draft</option>
                        </select>
                    </div>

                    <div class="mb-3 shadow-sm p-3 rounded bg-light border">
                        <label for="image_url" class="form-label fw-bold small">Foto Banner Paket Perjalanan</label>
                        <input type="file" name="image_url" id="image_url" class="form-control @error('image_url') is-invalid @enderror">
                        <div class="form-text small text-muted">Format gambar: JPG/PNG/WEBP (Maksimal 3MB).</div>
                        @error('image_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            <hr class="text-secondary my-4">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.itineraries.index') }}" class="btn btn-secondary px-4">Batal</a>
                <button type="submit" class="btn btn-success px-4 fw-bold">Simpan & Terbitkan</button>
            </div>
        </form>
    </div>
</div>
@endsection
