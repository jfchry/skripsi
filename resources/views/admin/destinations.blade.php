@extends('layouts.admin')

@section('content_admin')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Manajemen Destinasi Wisata</h3>
    <a href="{{ route('admin.destinations.create') }}" class="btn btn-success fw-bold">
        ➕ Tambah Destinasi
    </a>
</div>

{{-- 🌟 POSISI BARU: FITUR NOTIFIKASI PENOLAKAN DARI OWNER --}}

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
