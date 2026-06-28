@extends('layouts.admin')

@section('content_admin')
<div class="mb-4">
    <a href="{{ route('admin.guides.index') }}" class="text-decoration-none text-success fw-bold">
        ⬅️ Kembali ke Daftar Panduan
    </a>
    <h3 class="fw-bold text-dark mt-2">Ubah / Edit Artikel Panduan</h3>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-4">
        <form action="{{ route('admin.guides.update', $guide->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold small">Judul Artikel Panduan</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $guide->title) }}" required>
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="excerpt" class="form-label fw-bold small">Ringkasan Pendek *(Excerpt)</label>
                        <textarea name="excerpt" id="excerpt" rows="2" class="form-control @error('excerpt') is-invalid @enderror" required>{{ old('excerpt', $guide->excerpt) }}</textarea>
                        @error('excerpt') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label fw-bold small">Isi Lengkap Panduan Wisata</label>
                        <textarea name="content" id="content" rows="10" class="form-control @error('content') is-invalid @enderror" required>{{ old('content', $guide->content) }}</textarea>
                        @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mb-3 shadow-sm p-3 rounded bg-light border">
                        <label for="status" class="form-label fw-bold small text-warning">✏️ Status Konten</label>
                        <select name="status" id="status" class="form-select fw-bold" required>
                            <option value="published" {{ old('status', $guide->status) == 'published' ? 'selected' : '' }}>Set Aktif (Published)</option>
                            <option value="draft" {{ old('status', $guide->status) == 'draft' ? 'selected' : '' }}>Simpan sebagai Draft</option>
                        </select>
                    </div>

                    <div class="mb-3 shadow-sm p-3 rounded bg-light border">
                        <label class="form-label fw-bold small d-block">Foto Sampul Saat Ini</label>
                        <div class="mb-3">
                            <img src="{{ $guide->image_url ? asset('storage/' . $guide->image_url) : 'https://images.unsplash.com/photo-1540573133985-87b6da6d54a9?q=80&w=200' }}"
                                 class="img-thumbnail w-100 shadow-sm" style="height: 150px; object-fit: cover;" alt="Current Cover">
                        </div>

                        <label for="image_url" class="form-label fw-bold small">Ganti Foto Baru *(Kosongkan jika tetap)</label>
                        <input type="file" name="image_url" id="image_url" class="form-control @error('image_url') is-invalid @enderror">
                        @error('image_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            <hr class="text-secondary my-4">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.guides.index') }}" class="btn btn-secondary px-4">Batal</a>
                <button type="submit" class="btn btn-warning px-4 fw-bold">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
