@extends('layouts.admin')

@section('content_admin')
<div class="mb-4">
    <a href="{{ route('admin.itineraries.index') }}" class="text-decoration-none text-success fw-bold">
        ⬅️ Kembali ke Daftar Itinerary
    </a>
    <h3 class="fw-bold text-dark mt-2">Edit Rencana Perjalanan (Itinerary)</h3>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-4">
        <form action="{{ route('admin.itineraries.update', $itinerary->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold small">Nama / Judul Itinerary</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $itinerary->title) }}" required>
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label fw-bold small">Rincian Perjalanan (Rundown Per Hari)</label>
                        <textarea name="content" id="content" rows="10" class="form-control @error('content') is-invalid @enderror" required>{{ old('content', $itinerary->body) }}</textarea>
                        @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mb-3 shadow-sm p-3 rounded bg-light border">
                        <label for="status" class="form-label fw-bold small text-warning">✏️ Status Konten</label>
                        <select name="status" id="status" class="form-select fw-bold" required>
                            <option value="published" {{ old('status', $itinerary->status) == 'published' ? 'selected' : '' }}>Set Aktif (Published)</option>
                            <option value="draft" {{ old('status', $itinerary->status) == 'draft' ? 'selected' : '' }}>Simpan sebagai Draft</option>
                        </select>
                    </div>

                    <div class="mb-3 shadow-sm p-3 rounded bg-light border">
                        <label class="form-label fw-bold small d-block">Banner Saat Ini</label>
                        <div class="mb-3">
                            <img src="{{ $itinerary->image_url ? asset('storage/' . $itinerary->image_url) : 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=200' }}"
                                 class="img-thumbnail w-100 shadow-sm" style="height: 150px; object-fit: cover;" alt="Current Cover">
                        </div>

                        <label for="image_name" class="form-label fw-bold small">Ganti Foto Banner Baru *(Kosongkan jika tetap)</label>
                        <input type="text" name="image_name" id="image_name" class="form-control" placeholder="Contoh: banner_baru.jpg">
                    </div>
                </div>
            </div>

            <hr class="text-secondary my-4">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.itineraries.index') }}" class="btn btn-secondary px-4">Batal</a>
                <button type="submit" class="btn btn-warning px-4 fw-bold">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
