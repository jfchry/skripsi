@extends('layouts.admin')

@section('content_admin')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Manajemen Destinasi Wisata</h3>
    <a href="{{ route('admin.destinations.create') }}" class="btn btn-success fw-bold">
        ➕ Tambah Destinasi
    </a>
</div>

{{-- 🌟 POSISI BARU: FITUR NOTIFIKASI PENOLAKAN DARI OWNER --}}
@php
    // Ambil data pengajuan modul Destination milik admin ini yang berstatus ditolak ('rejected')
    $rejectedRequests = \App\Models\ApprovalRequest::where('model_type', \App\Models\Destination::class)
                        ->where('user_id', Auth::id())
                        ->where('status', 'rejected')
                        ->orderBy('updated_at', 'desc')
                        ->get();
@endphp

@if(!$rejectedRequests->isEmpty())
    <div class="alert alert-danger shadow-sm border-start border-4 border-danger mb-4" role="alert">
        <h5 class="alert-heading fw-bold"><i class="fas fa-exclamation-triangle me-2"></i> Perhatian: Pengajuan Anda Ditolak Owner!</h5>
        <p class="small text-dark">Berikut adalah daftar pengajuan data yang dikembalikan oleh Owner untuk segera Anda perbaiki:</p>
        <hr class="my-2">
        <ul class="mb-0 py-1 text-dark">
            @foreach($rejectedRequests as $rej)
                <li class="mb-3 d-flex justify-content-between align-items-start border-bottom pb-2">
                    <div>
                        Data Konten: <strong>"{{ $rej->payload['name'] ?? 'Data Tanpa Nama' }}"</strong>
                        <span class="badge bg-secondary ms-1">{{ strtoupper($rej->action_type) }}</span><br>
                        ❌ <span class="text-danger fw-bold">Alasan Ditolak:</span>
                        <span class="bg-white px-2 py-1 border rounded text-dark d-inline-block mt-1">
                            <em>"{{ $rej->notes_from_owner }}"</em>
                        </span>
                    </div>

                    <form action="{{ route('admin.approval.dismiss', $rej->id) }}" method="POST" class="ms-2">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm fw-bold py-1" style="font-size: 11px;">
                            ✕ Tandai Dibaca
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endif
{{-- 🌟 END FITUR NOTIFIKASI --}}

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th width="15%">Foto</th>
                        <th width="20%">Nama Destinasi</th>
                        <th width="45%">Deskripsi Lokasi</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($destinations as $index => $destination)
                        <tr>
                            <td class="text-center fw-bold">{{ $index + 1 }}</td>
                            <td>
                                @if($destination->image_url)
                                    <img src="{{ asset('storage/' . $destination->image_url) }}"
                                         alt="{{ $destination->name }}"
                                         class="img-thumbnail"
                                         style="width: 120px; height: 80px; object-fit: cover;">
                                @else
                                    <span class="badge bg-secondary">Tidak ada foto</span>
                                @endif
                            </td>
                            <td class="fw-bold text-success">{{ $destination->name }}</td>
                            <td>
                                {{ Str::limit($destination->location_description, 150, '...') }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.destinations.edit', $destination->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                    ✏️
                                </a>

                                <form action="{{ route('admin.destinations.destroy', $destination->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus destinasi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                        🗑️
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <div class="fs-1 mb-2">🏝️</div>
                                <h5>Belum ada data destinasi wisata.</h5>
                                <p class="small mb-0">Silakan klik tombol "Tambah Destinasi" untuk mengisi konten pertama Anda.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
