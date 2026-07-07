@extends('layouts.admin')

@section('content_admin')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Kelola Data Kamar Villa</h3>
    <a href="{{ route('admin.rooms.create') }}" class="btn btn-success fw-bold">
        🛏️ Daftarkan Kamar Baru
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
                        <th width="15%">Foto Utama</th>
                        <th width="20%">Nama Kamar</th>
                        <th width="15%">Harga / Malam</th>
                        <th width="35%">Fasilitas & Deskripsi</th>
                        <th width="10%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rooms as $index => $item)
                        <tr>
                            <td class="text-center fw-bold">{{ $index + 1 }}</td>

                            <td>
                                @if($item->icon_url)
                                    <img src="{{ asset('storage/' . $item->icon_url) }}"
                                         class="img-thumbnail"
                                         style="width: 100px; height: 65px; object-fit: cover;"
                                         alt="{{ $item->service_name }}">
                                @else
                                    <span class="badge bg-secondary-subtle text-secondary border small">No Image</span>
                                @endif
                            </td>

                            <td class="fw-bold text-dark">{{ $item->service_name }}</td>

                            <td class="text-success fw-bold">
                                Rp{{ number_format($item->price, 0, ',', '.') }}
                            </td>

                            <td class="text-muted small">
                                {{-- 🌟 REKOMENDASI: Membatasi teks agar baris tabel tidak terlalu melar ke bawah --}}
                                {!! nl2br(e(Str::limit($item->description, 100))) !!}
                            </td>

                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('admin.rooms.edit', $item->id) }}" class="btn btn-warning btn-sm fw-bold">
                                        ✏️ Edit
                                    </a>
                                    <form action="{{ route('admin.rooms.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus data kamar ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm fw-bold">🗑️</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <h5>Belum ada data kamar tipe dinamis.</h5>
                                <p class="small mb-0">Klik "Daftarkan Kamar Baru" untuk mengisi akomodasi.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
