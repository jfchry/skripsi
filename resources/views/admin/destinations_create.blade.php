@extends('layouts.admin')

@section('content_admin')
<div class="mb-4">
    <a href="{{ route('admin.destinations.index') }}" class="text-decoration-none text-success fw-bold">
        ⬅️ Kembali ke Daftar Destinasi
    </a>
    <h3 class="fw-bold text-dark mt-2">Tambah Destinasi Wisata Baru</h3>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-4">

        <form action="{{ route('admin.destinations.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Input Nama Destinasi Wisata --}}
            <div class="mb-3">
                <label for="name" class="form-label fw-bold small">Nama Destinasi Wisata</label>
                <input type="text" name="name" id="name"
                       class="form-control @error('name') is-invalid @enderror"
                       placeholder="Contoh: Orangutan Trekking, Bukit Lawang"
                       value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Input Deskripsi Lengkap Lokasi --}}
            <div class="mb-3">
                <label for="location_description" class="form-label fw-bold small">Deskripsi Lengkap Lokasi</label>
                <textarea name="location_description" id="location_description" rows="6"
                          class="form-control @error('location_description') is-invalid @enderror"
                          placeholder="Tuliskan cerita, daya tarik, dan informasi mendetail mengenai destinasi di sini..." required>{{ old('location_description') }}</textarea>
                @error('location_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Input Unggah Foto Destinasi --}}
            <div class="form-group">
    <label for="image_name">Nama File Foto (Pastikan sudah ditaruh di folder public/storage/destinations)</label>
    <input type="text" name="image_name" class="form-control" placeholder="Contoh: wisata1.jpg" required>
</div>
                @error('image_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <hr class="text-secondary my-4">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.destinations.index') }}" class="btn btn-secondary px-4">Batal</a>
                <button type="submit" class="btn btn-success px-4 fw-bold">Simpan Destinasi</button>
            </div>
        </form>

    </div>
</div>
@endsection
