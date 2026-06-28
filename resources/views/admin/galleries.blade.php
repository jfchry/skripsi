@extends('layouts.admin')

@section('content_admin')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Kelola Galeri Foto</h3>
    <a href="{{ route('admin.galleries.create') }}" class="btn btn-success fw-bold">
        📸 Unggah Foto Baru
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4 py-2 px-3 small" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th width="20%">Pratinjau Foto</th>
                        <th width="30%">Judul / Caption</th>
                        <th width="25%">Penempatan Section</th>
                        <th width="20%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($galleries as $index => $gallery)
                        <tr>
                            <td class="text-center fw-bold">{{ $index + 1 }}</td>

                            <td>
                                @if($gallery->file_path)
                                    <img src="{{ asset('storage/' . $gallery->file_path) }}"
                                         alt="{{ $gallery->caption ?? 'Foto Galeri' }}"
                                         class="img-thumbnail"
                                         style="width: 140px; height: 90px; object-fit: cover;">
                                @else
                                    <span class="badge bg-secondary">Tidak ada file</span>
                                @endif
                            </td>

                            <td class="fw-bold text-secondary">
                                {{ $gallery->caption ?? '-' }}
                            </td>

                            <td>
                                @if ($gallery->parent_type === 'destination' && $gallery->parent_id != 999)
                                <span class="badge bg-success text-white px-3 py-2 rounded-pill fw-bold shadow-sm" style="font-size: 0.8rem;">
                                    ✨ Section Atas
                                </span>
                                @else
                                <span class="badge bg-primary text-white px-3 py-2 rounded-pill fw-bold shadow-sm" style="font-size: 0.8rem;">
                                    🔍 Section Bawah
                                </span>
                                @endif
                            </td>

                            <td class="text-center">
                                <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini dari galeri?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm px-3 fw-bold" title="Hapus Foto">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <div class="fs-1 mb-2">📸</div>
                                <h5>Belum ada koleksi foto di galeri.</h5>
                                <p class="small mb-0">Silakan klik "Unggah Foto Baru" untuk mengisi komponen visual website Anda.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
