@extends('layouts.owner') {{-- Sesuaikan dengan nama layout admin asli di proyekmu --}}

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard Owner</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Sistem Manajemen Persetujuan Data (CMS Approval)</li>
    </ol>

    {{-- Notifikasi Sukses/Peringatan --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('warning'))
        <div class="alert alert-warning">{{ session('warning') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Antrean Pengajuan Perubahan Data dari Admin
        </div>
        <div class="card-body">
            @if($requests->isEmpty())
                <div class="text-center py-4">
                    <h5 class="text-muted">🎉 Keren! Tidak ada antrean pengajuan data saat ini.</h5>
                    <p class="text-muted mb-0">Semua isi konten website utama sudah sinkron dan disetujui.</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Admin Pengaju</th>
                                <th>Modul Data</th>
                                <th>Jenis Aksi</th>
                                <th>Aksi Pemilik</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $index => $req)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $req->created_at->format('d M Y, H:i') }} WIB</td>
                                    <td><strong>{{ $req->user->full_name }}</strong></td>
                                    <td>
                                        <span class="badge bg-secondary">{{ class_basename($req->model_type) }}</span>
                                    </td>
                                    <td>
                                        @if($req->action_type === 'create')
                                            <span class="badge bg-success">Tambah Baru</span>
                                        @elseif($req->action_type === 'update')
                                            <span class="badge bg-warning text-dark">Modifikasi Data</span>
                                        @else
                                            <span class="badge bg-danger">Hapus Data</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('owner.approval.preview', $req->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-eye"></i> Periksa & Preview
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