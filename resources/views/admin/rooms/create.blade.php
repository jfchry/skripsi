@extends('layouts.admin')

@section('content_admin')
<div class="mb-4">
    <a href="{{ route('admin.rooms.index') }}" class="text-decoration-none text-success fw-bold">⬅️ Kembali ke Daftar Kamar</a>
    <h3 class="fw-bold text-dark mt-2">Tambah Tipe Kamar Baru</h3>
</div>

<div class="card shadow-sm border-0" style="max-width: 700px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold small">Nama Kamar</label>
                <input type="text" name="service_name" class="form-control" placeholder="Contoh: Sangraloka" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold small">Harga Permalam (Angka saja)</label>
                <input type="number" name="price" class="form-control" placeholder="Contoh: 1500000" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold small">Deskripsi & Rincian Fasilitas Kamar</label>
                <textarea name="description" rows="6" class="form-control" placeholder="Tulis kapasitas tamu dan fasilitas kamar di sini (Gunakan enter untuk baris baru)..." required></textarea>
            </div>
            <div class="mb-4">
                <label class="form-label fw-bold small">Foto Utama Kamar</label>
                <input type="file" name="image_url" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success fw-bold px-4">Simpan Kamar</button>
        </form>
    </div>
</div>
@endsection
