@extends('layouts.admin')

@section('content_admin')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark tracking-tight">Manajemen Destinasi Wisata</h3>
    <a href="{{ route('admin.destinations.create') }}" class="btn btn-success fw-bold rounded-2 d-flex align-items-center gap-2 px-3 py-2 shadow-sm">
        <i class="bi bi-plus-circle-fill"></i> Tambah Destinasi
    </a>
</div>

{{-- 🌟 POSISI BARU: FITUR NOTIFIKASI PENOLAKAN DARI OWNER --}}
@if(session('rejected_notification') || isset($has_rejection))
    <div class="alert alert-danger bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 rounded-3 p-4 mb-4 shadow-sm" role="alert">
        <div class="d-flex gap-3 align-items-start">
            <div class="bg-danger bg-opacity-20 rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; flex-shrink: 0;">
                <i class="bi bi-exclamation-octagon-fill fs-5 text-danger"></i>
            </div>
            <div>
                <h5 class="alert-heading fw-bold mb-1 fs-6 text-dark">Catatan Penolakan Konten dari Pemilik (Owner)</h5>
                <p class="mb-0 small text-muted text-justify" style="line-height: 1.6;">
                    Data destinasi wisata yang Anda ajukan atau sunting baru-baru ini memerlukan perbaikan materi visual dan deskripsi rute. Pastikan resolusi foto mencukupi dan ulasan lokasi telah memuat aspek kelestarian ekosistem lokal Bukit Lawang sebelum diajukan kembali.
                </p>
            </div>
        </div>
    </div>
@endif
{{-- 🌟 END FITUR NOTIFIKASI --}}

<div class="card shadow-sm border-0 rounded-3 overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark" style="background-color: #212529;">
                    <tr>
                        <th width="5%" class="text-center py-3">No</th>
                        <th width="15%" class="py-3">Foto</th>
                        <th width="20%" class="py-3">Nama Destinasi</th>
                        <th width="45%" class="py-3">Deskripsi Lokasi</th>
                        <th width="15%" class="text-center py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($destinations as $index => $destination)
                        <tr>
                            <td class="text-center fw-bold text-muted">{{ $index + 1 }}</td>
                            <td>
                                @if($destination->image_url)
                                    <img src="{{ asset('storage/' . $destination->image_url) }}"
                                         alt="{{ $destination->name }}"
                                         class="rounded-3 border shadow-inner"
                                         style="width: 110px; height: 75px; object-fit: cover;">
                                @else
                                    <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25 rounded-2 font-normal py-1.5 px-2.5">
                                        <i class="bi bi-image-alt me-1"></i> Kosong
                                    </span>
                                @endif
                            </td>
                            <td class="fw-bold text-success">{{ $destination->name }}</td>
                            <td>
                                <p class="text-muted small mb-0 text-justify" style="line-height: 1.6; max-width: 550px;">
                                    {{ Str::limit(strip_tags($destination->location_description), 140, '...') }}
                                </p>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1.5">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('admin.destinations.edit', $destination->id) }}" class="btn btn-warning btn-sm rounded-2 text-white px-2.5 py-1.5 d-inline-flex align-items-center" title="Ubah Konten">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('admin.destinations.destroy', $destination->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berkas destinasi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm rounded-2 px-2.5 py-1.5 d-inline-flex align-items-center" title="Hapus Berkas">
                                            <i class="bi bi-trash3-fill"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted bg-white">
                                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                    <i class="bi bi-tree fs-2 text-muted text-opacity-50"></i>
                                </div>
                                <h5 class="fw-bold text-dark fs-6 mb-1">Belum Ada Data Destinasi Wisata</h5>
                                <p class="small text-muted mb-0 mx-auto" style="max-width: 420px;">Koleksi tabel basis data kosong. Silakan klik tombol "Tambah Destinasi" untuk menerbitkan entri informasi baru.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
