@extends('layouts.admin')

@section('content_admin')
<!-- 1. HEADER SECTION (Simetris & Konsisten) -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark tracking-tight">Kelola Data Kamar Villa</h3>
    <a href="{{ route('admin.rooms.create') }}" class="btn btn-success fw-bold rounded-2 d-flex align-items-center gap-2 px-3 py-2 shadow-sm">
        <i class="bi bi-plus-circle-fill"></i> Tambah Kamar
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

<!-- 2. TABLE DATA SECTION (Matriks Kolom Identik 100% dengan Destinasi & Guides) -->
<div class="card shadow-sm border-0 rounded-3 overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark" style="background-color: #212529;">
                    <tr>
                        <th width="5%" class="text-center py-3">No</th>
                        <th width="15%" class="py-3">Foto Utama</th>
                        <th width="20%" class="py-3">Nama Kamar</th>
                        <th width="45%" class="py-3">Harga &amp; Fasilitas Kamar</th>
                        <th width="15%" class="text-center py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rooms as $index => $item)
                        <tr>
                            <td class="text-center fw-bold text-muted">{{ $index + 1 }}</td>
                            <td>
                                @if($item->icon_url)
                                    <img src="{{ asset('storage/' . $item->icon_url) }}"
                                         alt="{{ $item->service_name }}"
                                         class="rounded-3 border shadow-inner"
                                         style="width: 110px; height: 75px; object-fit: cover;">
                                @else
                                    <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25 rounded-2 font-normal py-1.5 px-2.5">
                                        <i class="bi bi-image-alt me-1"></i> Kosong
                                    </span>
                                @endif
                            </td>
                            <td class="fw-bold text-success">{{ $item->service_name }}</td>
                            <td>
                                <div style="max-width: 550px;">
                                    <!-- Label Tag Harga Finansial -->
                                    <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 rounded-pill px-2.5 py-1 mb-1.5 fw-bold" style="font-size: 11px;">
                                        <i class="bi bi-tags-fill me-1"></i> Rp{{ number_format($item->price, 0, ',', '.') }} / malam
                                    </span>
                                    <!-- Teks Rincian Deskripsi -->
                                    <p class="text-muted small mb-0 text-justify" style="line-height: 1.6;">
                                        {{ Str::limit(strip_tags($item->description), 120, '...') }}
                                    </p>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1.5">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('admin.rooms.edit', $item->id) }}" class="btn btn-warning btn-sm rounded-2 text-white px-2.5 py-1.5 d-inline-flex align-items-center" title="Ubah Spesifikasi">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('admin.rooms.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data spesifikasi kamar ini?')" class="d-inline">
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
                                    <i class="bi bi-door-closed fs-2 text-muted text-opacity-50"></i>
                                </div>
                                <h5 class="fw-bold text-dark fs-6 mb-1">Belum Ada Data Kamar Villa</h5>
                                <p class="small text-muted mb-0 mx-auto" style="max-width: 420px;">Koleksi tabel basis data kosong. Silakan klik tombol "Tambah Kamar" untuk mendaftarkan spesifikasi unit penginapan baru.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
