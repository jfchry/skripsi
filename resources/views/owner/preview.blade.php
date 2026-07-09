@extends('layouts.owner')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-dark m-0 tracking-tight">Review Pengajuan Perubahan: <span class="text-info">{{ $modelName }}</span></h4>
        <a href="{{ route('owner.dashboard') }}" class="btn btn-secondary btn-sm rounded-2 d-flex align-items-center gap-1.5 px-3 py-2 shadow-sm fw-semibold">
            <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
        </a>
    </div>

    @if(session('error'))
        <div class="alert alert-danger border-0 bg-danger bg-opacity-10 text-danger rounded-3 p-3 small mb-4 shadow-sm">{{ session('error') }}</div>
    @endif

    @php
        $displayTitle = $proposedData['caption'] ?? $proposedData['service_name'] ?? $proposedData['name'] ?? $proposedData['title'] ?? $proposedData['judul'] ?? 'Tidak ada data';
        $displayDescription = $proposedData['location_description'] ?? $proposedData['body'] ?? $proposedData['content'] ?? $proposedData['description'] ?? $proposedData['excerpt'] ?? 'Tidak ada data';
    @endphp

    <div class="row g-4">
        {{-- Sisi Kiri: Form Preview Data Hasil Input Admin --}}
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                <div class="card-header text-white py-3 border-0 d-flex align-items-center gap-2" style="background-color: #0284c7;">
                    <i class="bi bi-file-earmark-diff"></i>
                    <h6 class="m-0 fw-bold small text-uppercase tracking-wider">Data Baru yang Diajukan Admin</h6>
                </div>
                <div class="card-body p-4 bg-white">
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold text-uppercase">Nama / Judul Konten:</label>
                        <input type="text" class="form-control bg-light py-2 rounded-2" value="{{ $displayTitle }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold text-uppercase">Isi Deskripsi / Konten Lengkap:</label>
                        <textarea class="form-control bg-light rounded-2" rows="8" readonly style="line-height: 1.6; font-size: 13px;">{{ $displayDescription }}</textarea>
                    </div>

                    @php
                        $rawPath = $proposedData['file_path'] ?? $proposedData['icon_url'] ?? $proposedData['image'] ?? $proposedData['image_url'] ?? $proposedData['image_path'] ?? null;
                        $cleanPath = $rawPath ? \Illuminate\Support\Str::replace('public/', '', $rawPath) : null;
                    @endphp

                    @if($cleanPath)
                        <div class="mb-0">
                            <label class="form-label text-muted small fw-bold text-uppercase">Berkas Gambar Terlampir:</label>
                            <div class="mt-2 p-2.5 bg-light border border-secondary border-opacity-10 rounded-3 text-center shadow-inner">
                                <img src="{{ asset('storage/' . $cleanPath) }}" class="img-fluid rounded-2 shadow-sm border" style="max-height: 260px; object-fit: cover; width: 100%;">
                                <div class="form-text text-muted small mt-2" style="font-size: 11px;"><i class="bi bi-folder-symlink"></i> Path File: <code class="text-danger">storage/{{ $cleanPath }}</code></div>
                            </div>
                        </div>
                    @else
                        <div class="mb-0 p-4 bg-light border border-secondary border-opacity-15 border-dashed rounded-3 text-center text-muted small">
                            <i class="bi bi-info-circle me-1 text-primary"></i> Tidak ada berkas lampiran visual gambar baru dalam pengajuan data ini.
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Sisi Kanan: Panel Keputusan Owner (Sky Blue / Dark Slate Theme) --}}
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                <div class="card-header bg-dark text-white py-3 border-0 d-flex align-items-center gap-2">
                    <i class="bi bi-hammer text-info"></i>
                    <h6 class="m-0 fw-bold small text-uppercase tracking-wider">Panel Keputusan Pemilik (Owner)</h6>
                </div>
                <div class="card-body p-4 bg-white">
                    <div class="p-3 rounded-3 border border-start border-4 border-info bg-light mb-4 shadow-sm">
                        <p class="small text-muted mb-1" style="font-size: 11px; font-weight: 500;"><i class="bi bi-person-fill"></i> DIAJUKAN OLEH ADMINISTRATOR:</p>
                        <h6 class="fw-bold text-dark mb-1 fs-6">{{ $approval->user->full_name ?? 'Administrator' }}</h6>
                        <small class="text-muted d-block mt-1"><i class="bi bi-calendar3"></i> Masuk: {{ $approval->created_at->format('d M Y, H:i') }} WIB</small>
                    </div>

                    <form action="{{ route('owner.approval.action', $approval->id) }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="statusSelect" class="form-label fw-bold text-dark small">Pilih Tindakan Operasional:</label>
                            <select name="status" id="statusSelect" class="form-select py-2 fw-semibold" required onchange="toggleKomentar()">
                                <option value="">-- Pilih Keputusan Kelayakan --</option>
                                <option value="approved" class="text-success fw-bold">✓ Setujui &amp; Terbitkan ke Website</option>
                                <option value="rejected" class="text-danger fw-bold">✗ Tolak &amp; Kembalikan ke Admin</option>
                            </select>
                        </div>

                        {{-- Kolom Catatan Komentar Penolakan --}}
                        <div class="mb-4" id="komentarContainer" style="display: none;">
                            <label for="notesField" class="form-label fw-bold text-danger small">Alasan Penolakan / Catatan Perbaikan:</label>
                            <textarea name="notes_from_owner" id="notesField" class="form-control border-danger border-opacity-25" rows="4" placeholder="Tulis rincian perbaikan visual atau deskripsi yang wajib diperbaiki oleh admin lapangan..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-success w-100 py-2.5 shadow-sm fw-bold rounded-2 d-flex align-items-center justify-content-center gap-2">
                            <i class="bi bi-send-fill"></i> Kirim Keputusan Akhir
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
