@extends('layouts.owner')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Riwayat Aktivitas Pemilik</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Log keputusan final penerimaan atau penolakan data admin</li>
    </ol>

    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-header bg-dark text-white">
            <i class="fas fa-history me-1"></i> Arsip Log Keputusan
        </div>
        <div class="card-body">
            @if($logs->isEmpty())
                <div class="text-center py-4">
                    <p class="text-muted mb-0">Belum ada riwayat aktivitas validasi data.</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                        <thead class="table-secondary">
                            <tr>
                                <th>Tanggal Selesai</th>
                                <th>Admin Pengaju</th>
                                <th>Modul</th>
                                <th>Aksi</th>
                                <th>Status Akhir</th>
                                <th>Catatan / Komentar Owner</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($logs as $log)
                                <tr>
                                    <td>{{ $log->updated_at->format('d M Y, H:i') }} WIB</td>
                                    <td>{{ $log->user->full_name }}</td>
                                    <td><span class="badge bg-secondary">{{ class_basename($log->model_type) }}</span></td>
                                    <td>
                                        <span class="badge bg-{{ $log->action_type === 'create' ? 'success' : ($log->action_type === 'update' ? 'warning' : 'danger') }}">
                                            {{ strtoupper($log->action_type) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $log->status === 'approved' ? 'success' : 'danger' }}">
                                            {{ strtoupper($log->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <em class="text-muted">{{ $log->notes_from_owner ?? '-' }}</em>
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
