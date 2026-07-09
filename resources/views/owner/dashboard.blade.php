@extends('layouts.owner')

@section('content')
<div class="container-fluid px-0">
    <!-- HEADER SUBSECTION -->
    <div class="mb-4">
        <h3 class="fw-bold text-dark tracking-tight">Sistem Manajemen Persetujuan Konten</h3>
        <p class="text-muted small mb-0">Memantau, meninjau, dan mengevaluasi seluruh permintaan penambahan, modifikasi, maupun penghapusan data website dari administrator.</p>
    </div>

    {{-- Blok Alert Sistem Sukses / Peringatan --}}
    @if(session('success'))
        <div class="alert alert-success border-0 bg-success bg-opacity-10 text-success rounded-3 p-3 small mb-4 shadow-sm" role="alert">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-check-circle-fill"></i>
                <div>{{ session('success') }}</div>
            </div>
        </div>
    @endif
    @if(session('warning'))
        <div class="alert alert-warning border-0 bg-warning bg-opacity-10 text-warning rounded-3 p-3 small mb-4 shadow-sm" role="alert">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-exclamation-triangle-fill"></i>
                <div>{{ session('warning') }}</div>
            </div>
        </div>
    @endif

    <!-- TABEL ANTREAN PENGAJUAN -->
    <div class="card shadow-sm border-0 rounded-3 overflow-hidden mb-4">
        <div class="card-header bg-dark text-white py-3 border-0 d-flex align-items-center gap-2">
            <i class="bi bi-hourglass-split text-info"></i>
            <span class="fw-bold small text-uppercase tracking-wider">Antrean Validasi Perubahan Data dari Admin</span>
        </div>
        <div class="card-body p-0">
            @if($requests->isEmpty())
                <div class="text-center py-5 text-muted bg-white">
                    <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                        <i class="bi bi-patch-check-fill fs-2 text-info"></i>
                    </div>
                    <h5 class="fw-bold text-dark fs-6 mb-1">Tidak Ada Antrean Pengajuan Data</h5>
                    <p class="small text-muted mb-0 mx-auto" style="max-width: 420px;">Keren! Seluruh entri isi konten website utama sudah berada dalam kondisi sinkron dan disetujui.</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-secondary text-dark">
                            <tr>
                                <th width="5%" class="text-center py-3">No</th>
                                <th width="20%" class="py-3">Tanggal Pengajuan</th>
                                <th width="20%" class="py-3">Admin Pengaju</th>
                                <th width="20%" class="py-3">Modul Data</th>
                                <th width="15%" class="py-3">Jenis Aksi</th>
                                <th width="20%" class="text-center py-3">Aksi Pemilik</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $index => $req)
                                <tr>
                                    <td class="text-center fw-bold text-muted">{{ $index + 1 }}</td>
                                    <td class="small text-dark">{{ $req->created_at->format('d M Y, H:i') }} WIB</td>
                                    <td><span class="fw-bold text-dark">{{ $req->user->full_name }}</span></td>
                                    <td>
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25 rounded-2 font-normal py-1 px-2.5" style="font-size: 11px;">
                                            <i class="bi bi-box-seam me-1"></i> {{ class_basename($req->model_type) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($req->action_type === 'create')
                                            <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 rounded-pill px-2.5 py-1" style="font-size: 11px;">➕ Tambah Baru</span>
                                        @elseif($req->action_type === 'update')
                                            <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 rounded-pill px-2.5 py-1" style="font-size: 11px;">📝 Modifikasi</span>
                                        @else
                                            <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 rounded-pill px-2.5 py-1" style="font-size: 11px;">🗑️ Hapus Data</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('owner.approval.preview', $req->id) }}" class="btn btn-sky-blue btn-sm fw-bold text-white rounded-2 px-3 py-1.5 d-inline-flex align-items-center gap-1.5" style="background-color: #0284c7;" title="Periksa Dokumen">
                                            <i class="bi bi-eye-fill"></i> Periksa &amp; Preview
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
