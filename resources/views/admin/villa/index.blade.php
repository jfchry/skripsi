@extends('layouts.admin')

@section('content_admin')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Kelola Galeri & Fasilitas Villa</h3>
    <a href="{{ route('admin.villa.create') }}" class="btn btn-success fw-bold">
        📸 Unggah Foto Fasilitas
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
                        <th width="25%">Foto Fasilitas</th>
                        <th width="50%">Keterangan / Nama Fasilitas</th>
                        <th width="20%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
    @forelse ($galleries as $index => $item)
        <tr>
            <td class="text-center fw-bold">{{ $index + 1 }}</td>
            <td>
                @if($item->file_path)
                    <img src="{{ asset('storage/' . $item->file_path) }}"
                         class="img-thumbnail"
                         style="width: 120px; height: 80px; object-fit: cover;"
                         alt="Fasilitas">
                @else
                    <span class="badge bg-secondary">Tidak ada foto</span>
                @endif
            </td>
            <td class="fw-bold text-dark">{{ $item->caption ?? 'Tanpa Keterangan' }}</td>
            <td class="text-center">
    <form action="{{ route('admin.villa.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus foto fasilitas ini secara permanen?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm fw-bold px-3">
            🗑️ Hapus Foto
        </button>
    </form>
</td>
        </tr>
    @empty
        @endforelse
</tbody>
            </table>
        </div>
    </div>
</div>
@endsection
