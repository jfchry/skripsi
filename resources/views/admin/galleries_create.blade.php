@extends('layouts.admin')

@section('content_admin')
<div class="mb-4">
    <a href="{{ route('admin.galleries.index') }}" class="text-decoration-none text-success fw-bold">
        ⬅️ Kembali ke Galeri
    </a>
    <h3 class="fw-bold text-dark mt-2">Unggah Foto Galeri Baru</h3>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-4">

        <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="parent_type" class="form-label fw-bold small">Pilih Penempatan Section Utama</label>
                <select name="parent_type" id="parent_type" class="form-select @error('parent_type') is-invalid @enderror" required autofocus>
                    <option value="" disabled selected>-- Pilih Posisi Tampilan Gambar --</option>

                    <option value="destination" {{ old('parent_type') === 'destination' ? 'selected' : '' }}>
                        ✨ Section Atas (Experience Bukit Lawang Carousel)
                    </option>

                    <option value="discover" {{ old('parent_type') === 'discover' ? 'selected' : '' }}>
                        🔍 Section Bawah (Discover More Component)
                    </option>
                </select>
                @error('parent_type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="caption" class="form-label fw-bold small">Judul Foto / Caption *(Opsional)</label>
                <input type="text" name="caption" id="caption"
                       class="form-control @error('caption') is-invalid @enderror"
                       placeholder="Masukkan deskripsi singkat atau judul foto..."
                       value="{{ old('caption') }}">
                @error('caption')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="file_path" class="form-label fw-bold small">Pilih File Gambar</label>
                <input type="file" name="file_path" id="file_path"
                       class="form-control @error('file_path') is-invalid @enderror" required>
                <div class="form-text small text-muted">Format berkas: JPG, JPEG, PNG, WEBP. Ukuran file maksimal batas server 3MB.</div>
                @error('file_path')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <hr class="text-secondary my-4">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary px-4">Batal</a>
                <button type="submit" class="btn btn-success px-4 fw-bold">Proses Unggah</button>
            </div>
        </form>

    </div>
</div>
@endsection
