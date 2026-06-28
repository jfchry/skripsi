@extends('layouts.admin')

@section('content_admin')
<div class="mb-4">
    <a href="{{ route('admin.destinations.index') }}" class="text-decoration-none text-success fw-bold">
        ⬅️ Kembali ke Daftar Destinasi
    </a>
    <h3 class="fw-bold text-dark mt-2">Ubah / Edit Destinasi Wisata</h3>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-4">

        <form action="{{ route('admin.destinations.update', $destination->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <div class="mb-3">
                <label for="name" class="form-label fw-bold small">Nama Destinasi Wisata</label>
                <input type="text" name="name" id="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name', $destination->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="location_description" class="form-label fw-bold small">Deskripsi Lengkap Lokasi</label>
                <textarea name="location_description" id="location_description" rows="6"
                          class="form-control @error('location_description') is-invalid @enderror" required>{{ old('location_description', $destination->location_description) }}</textarea>
                @error('location_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold small d-block">Foto Destinasi Saat Ini</label>

                @if($destination->image_url)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $destination->image_url) }}"
                             alt="{{ $destination->name }}"
                             class="img-thumbnail shadow-sm"
                             style="width: 200px; height: 130px; object-fit: cover;">
                    </div>
                @else
                    <p class="text-muted small">Belum ada foto yang diunggah untuk destinasi ini.</p>
                @endif

                <label for="image_url" class="form-label fw-bold small mt-3">Ganti Foto Baru *(Kosongkan jika tidak ingin diubah)</label>
                <input type="file" name="image_url" id="image_url"
                       class="form-control @error('image_url') is-invalid @enderror">
                <div class="form-text small text-muted">Format yang didukung: JPG, JPEG, PNG. Maksimal ukuran file 2MB.</div>
                @error('image_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <hr class="text-secondary my-4">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.destinations.index') }}" class="btn btn-secondary px-4">Batal</a>
                <button type="submit" class="btn btn-warning px-4 fw-bold">Perbarui Destinasi</button>
            </div>
        </form>

    </div>
</div>
@endsection
