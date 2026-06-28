@extends('layouts.admin')

@section('content_admin')
<div class="mb-4">
    <h3 class="fw-bold text-dark">📥 Kotak Masuk Pertanyaan & Pesan</h3>
    <p class="text-muted small">Berikut adalah daftar pesan, kritik, saran, atau pertanyaan yang dikirimkan oleh pengunjung melalui form melayang web.</p>
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
                        <th width="20%">Nama Pengirim</th>
                        <th width="20%">Kontak E-mail / WA</th>
                        <th width="45%">Isi Pesan / Pertanyaan</th>
                        <th width="10%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($inquiries as $index => $item)
                        <tr>
                            <td class="text-center fw-bold">{{ $index + 1 }}</td>
                            <td>
                                <span class="fw-bold text-dark d-block">{{ $item->visitor_name }}</span>
                                <span class="badge bg-secondary-subtle text-secondary border mt-1 small" style="font-size: 10px;">
                                    {{ $item->service_requested }}
                                </span>
                            </td>
                            <td>
                                <div class="small">✉️ {{ $item->email }}</div>
                                @if($item->phone_number)
                                    <div class="small text-muted mt-1">📞 {{ $item->phone_number }}</div>
                                @endif
                            </td>
                            <td>
                                <div class="p-2 bg-light rounded text-dark small" style="white-space: pre-line;">
                                    {{ $item->message }}
                                </div>
                                <small class="text-muted d-block mt-1" style="font-size: 11px;">
                                    📅 Diterima: {{ $item->created_at->format('d M Y - H:i') }} WIB
                                </small>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('admin.inquiries.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus catatan pesan masuk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm fw-bold">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <h5>Kotak masuk masih kosong kosong.</h5>
                                <p class="small mb-0">Belum ada pesan terbaru dari pengunjung saat ini.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
