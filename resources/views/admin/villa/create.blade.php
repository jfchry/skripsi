@extends('layouts.admin')

@section('content_admin')
<div class="mb-4">
    <a href="{{ route('admin.villa.index') }}" class="text-decoration-none text-success fw-bold">
        ⬅️ Kembali ke Daftar Galeri
    </a>
    <h3 class="fw-bold text-dark mt-2">Unggah Foto Fasilitas Villa Baru</h3>
</div>

<div class="card shadow-sm border-0" style="max-width: 600px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.villa.store') }}" method="POST">
            @csrf

            <!-- Nama Fasilitas -->
            <div class="mb-3">
                <label for="title" class="form-label fw-bold small">Keterangan / Nama Fasilitas</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Contoh: Interior Kamar Sangraloka / Area Restoran Tepi Sungai" value="{{ old('title') }}" required autofocus>
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- Input Teks Nama File Gambar -->
            <div class="mb-4">
                <label for="image_name" class="form-label fw-bold small">Nama File Gambar</label>
                <input type="text" name="image_name" id="image_name" class="form-control @error('image_name') is-invalid @enderror" placeholder="Contoh: villa_pool.jpg" required>
                <div class="form-text small text-muted">Pastikan file gambar sudah diletakkan di dalam folder storage/villa_services/.</div>
                @error('image_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success fw-bold px-4">🚀 Ajukan ke Owner</button>
                <a href="{{ route('admin.villa.index') }}" class="btn btn-secondary px-3">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
