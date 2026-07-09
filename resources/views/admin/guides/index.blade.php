@extends('layouts.admin')

@section('content_admin')
<!-- 1. HEADER SECTION (Disamakan persis dengan Destinasi: Memakai bi-plus-circle-fill) -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark tracking-tight">Manajemen Panduan Perjalanan</h3>
    <a href="{{ route('admin.guides.create') }}" class="btn btn-success fw-bold rounded-2 d-flex align-items-center gap-2 px-3 py-2 shadow-sm">
        <i class="bi bi-plus-circle-fill"></i> Tambah Panduan
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

<!-- 2. TABLE DATA SECTION (Disamakan lebar kolom % dan max-width teksnya dengan Destinasi) -->
<div class="card shadow-sm border-0 rounded-3 overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark" style="background-color: #212529;">
                    <tr>
                        <th width="5%" class="text-center py-3">No</th>
                        <th width="15%" class="py-3">Foto</th>
                        <th width="20%" class="py-3">Judul Panduan</th>
                        <th width="45%" class="py-3">Deskripsi Lokasi</th>
                        <th width="15%" class="text-center py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($guides as $index => $guide)
                        <tr>
                            <td class="text-center fw-bold text-muted">{{ $index + 1 }}</td>
                            <td>
                                @if($guide->image_url)
                                    <img src="{{ asset('storage/' . $guide->image_url) }}"
                                         alt="{{ $guide->title }}"
                                         class="rounded-3 border shadow-inner"
                                         style="width: 110px; height: 75px; object-fit: cover;">
                                @else
                                    <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25 rounded-2 font-normal py-1.5 px-2.5">
                                        <i class="bi bi-image-alt me-1"></i> Kosong
                                    </span>
                                @endif
                            </td>
                            <td class="fw-bold text-success">{{ $guide->title }}</td>
                            <td>
                                <p class="text-muted small mb-0 text-justify" style="line-height: 1.6; max-width: 550px;">
                                    {{ $guide->excerpt ?? Str::limit(strip_tags($guide->body), 140, '...') }}
                                </p>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1.5">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('admin.guides.edit', $guide->id) }}" class="btn btn-warning btn-sm rounded-2 text-white px-2.5 py-1.5 d-inline-flex align-items-center" title="Ubah Konten">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('admin.guides.destroy', $guide->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mengajukan penghapusan data ini ke Owner?');" class="d-inline">
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
                                    <i class="bi bi-book fs-2 text-muted text-opacity-50"></i>
                                </div>
                                <h5 class="fw-bold text-dark fs-6 mb-1">Belum Ada Artikel Panduan Wisata</h5>
                                <p class="small text-muted mb-0 mx-auto" style="max-width: 420px;">Koleksi tabel basis data kosong. Silakan klik tombol "Tambah Panduan" untuk menerbitkan entri informasi baru.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
