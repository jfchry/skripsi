@extends('layouts.admin')

@section('content_admin')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Kelola Travel Guides</h3>
    <a href="{{ route('admin.guides.create') }}" class="btn btn-success fw-bold">
        📝 Tulis Panduan Baru
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
                        <th width="15%">Sampul</th>
                        <th width="25%">Judul Panduan</th>
                        <th width="35%">Ringkasan (Excerpt)</th>
                        <th width="10%" class="text-center">Status</th>
                        <th width="10%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
    @forelse ($guides as $index => $guide)
        <tr>
            <td class="text-center fw-bold">{{ $index + 1 }}</td>
            <td>
                <img src="{{ $guide->image_url ? asset('storage/' . $guide->image_url) : 'https://images.unsplash.com/photo-1540573133985-87b6da6d54a9?q=80&w=200' }}"
                     class="img-thumbnail"
                     style="width: 100px; height: 65px; object-fit: cover;"
                     alt="Sampul">
            </td>
            <td class="fw-bold text-dark">{{ $guide->title }}</td>

            <td class="text-muted small">
                {{ $guide->excerpt ?? Str::limit(strip_tags($guide->body), 90) }}
            </td>

            <td class="text-center">
                @if($guide->status === 'published')
                    <span class="badge bg-success px-2 py-1.5 rounded-pill small">
                        🟢 Published
                    </span>
                @else
                    <span class="badge bg-secondary px-2 py-1.5 rounded-pill small">
                        ⚪ Draft
                    </span>
                @endif
            </td>
            <td class="text-center">
                <div class="d-flex justify-content-center gap-1">
                    <a href="{{ route('admin.guides.edit', $guide->id) }}" class="btn btn-warning btn-sm fw-bold">
                        ✏️ Edit
                    </a>
                    <form action="{{ route('admin.guides.destroy', $guide->id) }}" method="POST" onsubmit="return confirm('Hapus artikel panduan ini secara permanen?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm fw-bold">
                            🗑️
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="text-center py-5 text-muted">
                <h5>Belum ada artikel Travel Guide yang ditulis.</h5>
                <p class="small mb-0">Klik "Tulis Panduan Baru" untuk mengedukasi wisatawan.</p>
            </td>
        </tr>
    @endforelse
</tbody>
            </table>
        </div>
    </div>
</div>
@endsection
