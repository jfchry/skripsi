@extends('layouts.owner')

@section('content')
<div class="container-fluid px-0">
    <!-- HEADER SUBSECTION -->
    <div class="mb-4">
        <h3 class="fw-bold text-dark tracking-tight">Riwayat Aktivitas Pemilik</h3>
        <p class="text-muted small mb-0">Daftar rekaman log arsip keputusan final berkas pengajuan validasi yang telah diselesaikan oleh Owner.</p>
    </div>

    <!-- TABEL LOG ARSIP -->
    <div class="card shadow-sm border-0 rounded-3 overflow-hidden mb-4">
        <div class="card-header bg-dark text-white py-3 border-0 d-flex align-items-center gap-2">
            <i class="bi bi-archive-fill text-info"></i>
            <span class="fw-bold small text-uppercase tracking-wider">Arsip Log Transaksi Keputusan Validasi</span>
        </div>
        <div class="card-body p-0">
            @if($logs->isEmpty())
                <div class="text-center py-5 text-muted bg-white">
                    <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                        <i class="bi bi-folder2-open fs-2 text-muted text-opacity-50"></i>
                    </div>
                    <h5 class="fw-bold text-dark fs-6 mb-1">Belum Ada Riwayat Aktivitas</h5>
                    <p class="small text-muted mb-0 mx-auto" style="max-width: 420px;">Sistem mencatat tidak ada riwayat log audit keputusan final pemeriksaan basis data yang telah dieksekusi.</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-secondary text-dark">
                            <tr>
                                <th width="15%" class="py-3">Tanggal Selesai</th>
                                <th width="15%" class="py-3">Admin Pengaju</th>
                                <th width="15%" class="py-3">Nama Modul</th>
                                <th width="15%" class="py-3">Jenis Aksi</th>
                                <th width="15%" class="py-3">Status Akhir</th>
                                <th width="25%" class="py-3">Catatan / Komentar Owner</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($logs as $log)
                                <tr>
                                    <td class="small text-muted">{{ $log->updated_at->format('d M Y, H:i') }} WIB</td>
                                    <td class="fw-bold text-dark">{{ $log->user->full_name }}</td>
                                    <td>
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25 rounded-2 font-normal py-1 px-2" style="font-size: 11px;">
                                            {{ class_basename($log->model_type) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($log->action_type === 'create')
                                            <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 rounded-pill px-2 py-1" style="font-size: 10px;">CREATE</span>
                                        @elseif($log->action_type === 'update')
                                            <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 rounded-pill px-2 py-1" style="font-size: 10px;">UPDATE</span>
                                        @else
                                            <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 rounded-pill px-2 py-1" style="font-size: 10px;">DELETE</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($log->status === 'approved')
                                            <span class="badge bg-success rounded-pill px-2.5 py-1 fw-bold text-uppercase shadow-sm" style="font-size: 10px;"><i class="bi bi-check-circle-fill me-1"></i> Approved</span>
                                        @else
                                            <span class="badge bg-danger rounded-pill px-2.5 py-1 fw-bold text-uppercase shadow-sm" style="font-size: 10px;"><i class="bi bi-x-circle-fill me-1"></i> Rejected</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="p-1 rounded small" style="max-width: 280px; font-size: 12px; line-height: 1.4;">
                                            @if($log->notes_from_owner)
                                                <em class="text-danger fw-medium">"{{ $log->notes_from_owner }}"</em>
                                            @else
                                                <span class="text-muted opacity-50">-</span>
                                            @endif
                                        </div>
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
