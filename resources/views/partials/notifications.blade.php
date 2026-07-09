@if(isset($notifications) && $notifications->count() > 0)
    <div class="notifications-wrapper mb-4">
        @foreach($notifications as $notification)
            @php
                $isApproved = $notification->status == 'approved';
                $themeColor = $isApproved ? 'success' : 'danger';
                $iconClass = $isApproved ? 'bi-check-circle-fill' : 'bi-exclamation-octagon-fill';
            @endphp

            <div class="alert alert-{{ $themeColor }} bg-{{ $themeColor }} bg-opacity-10 border border-{{ $themeColor }} border-opacity-25 border-start border-4 border-start-{{ $themeColor }} rounded-3 p-4 mb-3 shadow-sm position-relative fade show" role="alert">
                <div class="d-flex align-items-start gap-3">
                    <!-- Icon Indicator Container -->
                    <div class="bg-{{ $themeColor }} bg-opacity-20 rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; flex-shrink: 0;">
                        <i class="bi {{ $iconClass }} fs-4 text-{{ $themeColor }}"></i>
                    </div>

                    <!-- Content Message Container -->
                    <div class="pe-4">
                        <h6 class="alert-heading fw-bold text-dark mb-1" style="font-size: 0.95rem;">
                            Pengajuan Perubahan Konten Di-{{ $isApproved ? 'Setujui' : 'Tolak' }}
                        </h6>
                        <p class="mb-0 small text-muted text-justify" style="line-height: 1.5;">
                            Permohonan pembaruan data pada modul
                            <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25 rounded-2 px-2 py-1 font-normal" style="font-size: 11px;">
                                <i class="bi bi-box-seam me-1"></i> {{ class_basename($notification->model_type) }}
                            </span>
                            telah selesai ditinjau secara berkala oleh pihak Pemilik (Owner).
                        </p>

                        <!-- Blok Evaluasi Catatan Dari Owner (Jika Ada) -->
                        @if($notification->notes_from_owner)
                            <div class="mt-3 p-3 bg-white border border-{{ $themeColor }} border-opacity-25 rounded-3 text-dark shadow-inner" style="font-size: 12px; line-height: 1.5;">
                                <div class="fw-bold text-{{ $themeColor }} mb-1">
                                    <i class="bi bi-chat-left-text-fill me-1"></i> Catatan Evaluasi Owner:
                                </div>
                                <em class="text-muted">"{{ $notification->notes_from_owner }}"</em>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- FORM PEMUTUSAN / DISMISS NOTIFIKASI (Sesuai Fungsi Bawaan Proyek Anda) -->
                <form action="{{ route('admin.approval.dismiss', $notification->id) }}" method="POST" class="position-absolute end-0 top-0 pt-3.5 pe-3.5">
                    @csrf
                    <button type="submit" class="btn-close shadow-none" aria-label="Tutup Notifikasi" style="cursor: pointer; font-size: 0.75rem;"></button>
                </form>
            </div>
        @endforeach
    </div>
@endif
