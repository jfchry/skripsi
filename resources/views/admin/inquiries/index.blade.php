@extends('layouts.admin')

@section('content_admin')
<!-- 1. HEADER SECTION (Simetris & Konsisten Tanpa Tombol Tambah Data) -->
<div class="mb-4">
    <h3 class="fw-bold text-dark tracking-tight">Kotak Masuk Pertanyaan &amp; Pesan</h3>
    <p class="text-muted small">Berikut adalah daftar rekaman pesan, kritik, saran, atau pertanyaan layanan ekowisata yang dikirimkan oleh pengunjung secara real-time melalui form melayang website.</p>
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

<!-- 2. TABLE DATA SECTION (Matriks Komparasi Grid 100% Simetris) -->
<div class="card shadow-sm border-0 rounded-3 overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark" style="background-color: #212529;">
                    <tr>
                        <th width="5%" class="text-center py-3">No</th>
                        <th width="20%" class="py-3">Nama Pengirim</th>
                        <th width="20%" class="py-3">Kontak E-mail / WA</th>
                        <th width="40%" class="py-3">Isi Pesan / Pertanyaan</th>
                        <th width="15%" class="text-center py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($inquiries as $index => $item)
                        <tr>
                            <td class="text-center fw-bold text-muted">{{ $index + 1 }}</td>
                            <td>
                                <span class="fw-bold text-success d-block mb-1">{{ $item->visitor_name }}</span>
                                <!-- Badge Indikator Kategori Layanan yang Ditanyakan -->
                                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 rounded-2 font-normal py-1 px-2" style="font-size: 10px; font-weight: 500;">
                                    <i class="bi bi-tag-fill me-1"></i> {{ $item->service_requested ?? 'Umum' }}
                                </span>
                            </td>
                            <td>
                                <div class="small text-dark mb-1 d-flex align-items-center gap-1.5">
                                    <i class="bi bi-envelope text-muted"></i> {{ $item->email }}
                                </div>
                                @if($item->phone_number)
                                    <div class="small text-muted d-flex align-items-center gap-1.5">
                                        <i class="bi bi-whatsapp text-muted"></i> {{ $item->phone_number }}
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div style="max-width: 500px;">
                                    <!-- Kotak Teks Isi Pesan Estetik -->
                                    <div class="p-2.5 bg-light border border-secondary border-opacity-10 rounded-3 text-dark small text-justify shadow-inner" style="white-space: pre-line; line-height: 1.5; font-size: 12px;">
                                        {{ $item->message }}
                                    </div>
                                    <!-- Label Penanda Waktu Masuk -->
                                    <small class="text-muted d-block mt-1.5" style="font-size: 11px;">
                                        <i class="bi bi-clock me-1"></i> Diterima: {{ $item->created_at->format('d M Y - H:i') }} WIB
                                    </small>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <!-- Tombol Hapus Form Log -->
                                    <form action="{{ route('admin.inquiries.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus catatan pesan masuk ini secara permanen?')" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm rounded-2 px-2.5 py-1.5 d-inline-flex align-items-center gap-1.5" title="Hapus Log Pesan">
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
                                    <i class="bi bi-envelope-open fs-2 text-muted text-opacity-50"></i>
                                </div>
                                <h5 class="fw-bold text-dark fs-6 mb-1">Kotak Masuk Masih Kosong</h5>
                                <p class="small text-muted mb-0 mx-auto" style="max-width: 420px;">Koleksi tabel basis data log kosong. Belum ada pesan atau pertanyaan terbaru yang dikirimkan oleh pengunjung saat ini.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
