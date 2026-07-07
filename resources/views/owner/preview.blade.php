@extends('layouts.owner')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-dark m-0">Review Pengajuan Perubahan: <span class="text-primary">{{ $modelName }}</span></h4>
        <a href="{{ route('owner.dashboard') }}" class="btn btn-secondary btn-sm shadow-sm">
            🔙 Kembali ke Dashboard
        </a>
    </div>

    @if(session('error'))
        <div class="alert alert-danger shadow-sm">{{ session('error') }}</div>
    @endif

    <div class="row">
        {{-- Sisi Kiri: Form Preview Data Baru Hasil Input Admin --}}
        <div class="col-md-7">
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-primary text-white py-3">
                    <h6 class="m-0 fw-bold"><i class="fas fa-box me-2"></i> Data Baru yang Diajukan Admin</h6>
                </div>
                <div class="card-body p-4">
                    {{-- Preview Nama Destinasi --}}
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold text-uppercase">Nama / Judul Konten:</label>
                        <input type="text" class="form-control bg-light py-2" value="{{ $proposedData['name'] ?? 'Tidak ada data' }}" readonly>
                    </div>

                    {{-- Preview Deskripsi Konten --}}
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold text-uppercase">Isi Deskripsi Lokasi Wisata:</label>
                        <textarea class="form-control bg-light" rows="6" readonly>{{ $proposedData['location_description'] ?? $proposedData['description'] ?? 'Tidak ada data' }}</textarea>
                    </div>

                    {{-- 🌟 FIX TOTAL PREVIEW GAMBAR UNIVERSAL --}}
                    @php
                        // Deteksi otomatis segala variasi nama key foto dari inputan lama/baru
                        $rawPath = $proposedData['image'] ?? $proposedData['image_url'] ?? $proposedData['image_path'] ?? null;

                        // Bersihkan string 'public/' jika terbawa oleh data seadanya
                        $cleanPath = $rawPath ? \Illuminate\Support\Str::replace('public/', '', $rawPath) : null;
                    @endphp

                    @if($cleanPath)
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold text-uppercase">Berkas Gambar Terlampir:</label>
                            <div class="mt-2 p-2 bg-light border rounded text-center">
                                <img src="{{ asset('storage/' . $cleanPath) }}" class="img-fluid rounded shadow-sm" style="max-height: 280px; object-fit: cover; width: 100%;">
                                <div class="form-text text-muted small mt-2">Path File: storage/{{ $cleanPath }}</div>
                            </div>
                        </div>
                    @else
                        <div class="mb-3 p-3 bg-light border border-dashed rounded text-center text-muted small">
                            ℹ️ Tidak ada berkas gambar baru yang diunggah dalam pengajuan ini.
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Sisi Kanan: Panel Eksekusi Tombol Approve/Reject --}}
        <div class="col-md-5">
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-dark text-white py-3">
                    <h6 class="m-0 fw-bold"><i class="fas fa-bolt me-2"></i> Panel Keputusan Pemilik (Owner)</h6>
                </div>
                <div class="card-body p-4">
                    <div class="p-3 bg-light rounded border border-start border-4 border-info mb-4">
                        <p class="small text-muted mb-1">Diajukan oleh:</p>
                        <h6 class="fw-bold text-dark mb-2">{{ $approval->user->full_name ?? 'Administrator' }} (Admin)</h6>
                        <p class="small text-muted mb-0">Pada: {{ $approval->created_at->format('d M Y, H:i') }} WIB</p>
                    </div>

                    <hr class="my-3 text-secondary">

                    <form action="{{ route('owner.approval.action', $approval->id) }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold text-dark">Pilih Tindakan Operasional:</label>
                            <select name="status" id="statusSelect" class="form-select py-2" required onchange="toggleKomentar()">
                                <option value="">-- Pilih Keputusan --</option>
                                <option value="approved">✅ Setujui & Terbitkan ke Website</option>
                                <option value="rejected">❌ Tolak & Kembalikan ke Admin</option>
                            </select>
                        </div>

                        {{-- Kolom Catatan Komentar --}}
                        <div class="mb-4" id="komentarContainer" style="display: none;">
                            <label class="form-label fw-bold text-danger">Alasan Penolakan / Catatan Perbaikan:</label>
                            <textarea name="notes_from_owner" id="notesField" class="form-control" rows="3" placeholder="Tuliskan alasan penolakan..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-success w-100 py-2 shadow-sm fw-bold">
                            <i class="fas fa-paper-plane me-2"></i> Kirim Keputusan Akhir
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleKomentar() {
        var select = document.getElementById('statusSelect');
        var container = document.getElementById('komentarContainer');
        var field = document.getElementById('notesField');

        if(select.value === 'rejected') {
            container.style.display = 'block';
            field.setAttribute('required', 'required');
        } else {
            container.style.display = 'none';
            field.removeAttribute('required');
        }
    }
</script>
@endsection
