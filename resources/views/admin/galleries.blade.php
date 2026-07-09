@extends('layouts.admin')

@section('content_admin')
<!-- 1. HEADER SECTION (Simetris & Konsisten) -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark tracking-tight">Kelola Galeri Foto Pengalaman</h3>
    <a href="{{ route('admin.galleries.create') }}" class="btn btn-success fw-bold rounded-2 d-flex align-items-center gap-2 px-3 py-2 shadow-sm">
        <i class="bi bi-plus-circle-fill"></i> Tambah Foto
    </a>
</div>

<!-- NOTIFIKASI ALERT SISTEM -->
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4 py-3 px-4 rounded-3 small shadow-sm" role="alert">
        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-check-circle-fill fs-5"></i>
            <div>{{ session('success') }}</div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- 2. TABLE DATA SECTION (Matriks Komparasi Kolom 100% Identik) -->
<div class="card shadow-sm border-0 rounded-3 overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark" style="background-color: #212529;">
                    <tr>
                        <th width="5%" class="text-center py-3">No</th>
                        <th width="15%" class="py-3">Pratinjau Foto</th>
                        <th width="20%" class="py-3">Judul / Caption</th>
                        <th width="45%" class="py-3">Penempatan Komponen Halaman</th>
                        <th width="15%" class="text-center py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($galleries as $index => $gallery)
                        <tr>
                            <td class="text-center fw-bold text-muted">{{ $index + 1 }}</td>
                            <td>
                                @if($gallery->file_path)
                                    <img src="{{ asset('storage/' . $gallery->file_path) }}"
                                         alt="{{ $gallery->caption ?? 'Foto Galeri' }}"
                                         class="rounded-3 border shadow-inner"
                                         style="width: 110px; height: 75px; object-fit: cover;">
                                @else
                                    <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25 rounded-2 font-normal py-1.5 px-2.5">
                                        <i class="bi bi-image-alt me-1"></i> Kosong
                                    </span>
                                @endif
                            </td>
                            <td class="fw-bold text-success">
                                {{ $gallery->caption ?? 'Tanpa Keterangan' }}
                            </td>
                            <td>
                                <div style="max-width: 550px;">
                                    @if ($gallery->parent_type === 'destination' && $gallery->parent_id != 999)
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 rounded-pill px-2.5 py-1 fw-bold" style="font-size: 11px;">
                                            <i class="bi bi-layout-sidebar-reverse me-1"></i> Tata Letak: Section Atas
                                        </span>
                                    @else
                                        <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 rounded-pill px-2.5 py-1 fw-bold" style="font-size: 11px;">
                                            <i class="bi bi-layout-sidebar-inset me-1"></i> Tata Letak: Section Bawah
                                        </span>
                                    @endif
                                    <p class="text-muted mt-1 mb-0" style="font-size: 11px; line-height: 1.4;">
                                        Mengatur penempatan kluster visual dokumentasi pengalaman interaktif wisatawan pada landing page utama.
                                    </p>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <!-- Tombol Hapus Form -->
                                    <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin mengajukan penghapusan foto galeri ini ke Owner?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm rounded-2 px-2.5 py-1.5 d-inline-flex align-items-center gap-1.5" title="Hapus Berkas">
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
                                    <i class="bi bi-images fs-2 text-muted text-opacity-50"></i>
                                </div>
                                <h5 class="fw-bold text-dark fs-6 mb-1">Belum Ada Koleksi Foto Galeri</h5>
                                <p class="small text-muted mb-0 mx-auto" style="max-width: 420px;">Koleksi dokumentasi visual kosong. Silakan klik tombol "Tambah Foto" untuk memuat entri lampiran gambar baru.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
