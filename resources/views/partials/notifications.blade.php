@if(isset($notifications) && $notifications->count() > 0)
    <div class="notifications-wrapper mb-4">
        @foreach($notifications as $notification)
            <div class="alert alert-{{ $notification->status == 'approved' ? 'success' : 'danger' }} alert-dismissible fade show shadow-sm border-start border-4 border-{{ $notification->status == 'approved' ? 'success' : 'danger' }} p-4" role="alert">
                <div class="d-flex align-items-center">
                    <div class="me-3 fs-4">
                        {{ $notification->status == 'approved' ? '🚀' : '⚠️' }}
                    </div>
                    <div>
                        <h6 class="alert-heading fw-bold mb-1">
                            Pengajuan Perubahan Konten Di-{{ strtoupper($notification->status) }}
                        </h6>
                        <p class="mb-0 small text-secondary">
                            Permohonan data pada modul <span class="badge bg-secondary">{{ class_basename($notification->model_type) }}</span> telah ditinjau oleh Owner.
                        </p>
                        @if($notification->notes_from_owner)
                            <div class="mt-2 p-2 bg-white rounded border border-light text-dark small">
                                <strong>Catatan Owner:</strong> "{{ $notification->notes_from_owner }}"
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Tombol Silang Penghapus Notifikasi --}}
                <form action="{{ route('admin.approval.dismiss', $notification->id) }}" method="POST" class="position-absolute end-0 top-0 pt-3 pe-3">
                    @csrf
                    <button type="submit" class="btn-close" aria-label="Close" style="cursor: pointer;"></button>
                </form>
            </div>
        @endforeach
    </div>
@endif
