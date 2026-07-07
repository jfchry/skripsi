@extends('layouts.admin')

@section('content_admin')
<div class="mb-4">
    <a href="{{ route('admin.rooms.index') }}" class="text-decoration-none text-success fw-bold">⬅️ Kembali ke Daftar Kamar</a>
    <h3 class="fw-bold text-dark mt-2">Edit Spesifikasi Tipe Kamar</h3>
</div>

<div class="card shadow-sm border-0" style="max-width: 700px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.rooms.update', $room->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-bold small">Nama Kamar</label>
                <input type="text" name="service_name" class="form-control" value="{{ old('service_name', $room->service_name) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold small">Harga Permalam (Angka saja)</label>
                <input type="number" name="price" class="form-control" value="{{ old('price', $room->price) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold small">Deskripsi & Rincian Fasilitas Kamar</label>
                <textarea name="description" rows="6" class="form-control" required>{{ old('description', $room->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold small d-block">Foto Kamar Saat Ini</label>
                <img src="{{ asset('storage/' . $room->icon_url) }}" class="img-thumbnail shadow-sm mb-2" style="max-height: 180px; object-fit: cover;">
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold small">Ganti Nama File Foto Kamar Baru *(Kosongkan jika tetap)</label>
                <input type="text" name="image_name" class="form-control" placeholder="Contoh: room_deluxe_new.jpg">
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-warning fw-bold px-4">Simpan Perubahan</button>
                <a href="{{ route('admin.rooms.index') }}" class="btn btn-secondary px-3">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
