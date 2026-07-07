<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\ApprovalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ApprovalController extends Controller
{
    /**
     * 1. Menampilkan Halaman Utama Dashboard Owner
     */
    public function index()
    {
        $requests = ApprovalRequest::with('user')
            ->where('status', 'pending')
            ->orderBy('created_at', 'asc')
            ->get();

        return view('owner.dashboard', compact('requests'));
    }

    /**
     * 2. Menampilkan Halaman Preview Perubahan Data
     */
    public function preview($id)
    {
        $approval = ApprovalRequest::with('user')->findOrFail($id);

        // Menjamin payload ter-decode dengan sempurna menjadi array PHP
        $proposedData = [];
        if (is_array($approval->payload)) {
            $proposedData = $approval->payload;
        } else {
            $proposedData = json_decode($approval->payload, true) ?? [];
        }

        $modelName = class_basename($approval->model_type);

        $originalData = null;
        if ($approval->action_type === 'update' && $approval->model_id) {
            $originalData = $approval->model_type::find($approval->model_id);
        }

        return view('owner.preview', compact('approval', 'proposedData', 'originalData', 'modelName'));
    }

    /**
     * 3. Memproses Keputusan Akhir Owner (Setujui atau Tolak)
     */
    public function action(Request $request, $id)
    {
        $approval = ApprovalRequest::findOrFail($id);

        $request->validate([
            'status' => 'required|in:approved,rejected',
            'notes_from_owner' => 'required_if:status,rejected|nullable|string'
        ]);

        $status = $request->status;

        if ($status === 'approved') {
            DB::beginTransaction();
            try {
                $modelClass = $approval->model_type;

                $dataArray = is_array($approval->payload)
                    ? $approval->payload
                    : json_decode($approval->payload, true) ?? [];

                // 🌟 PROTEKSI DISK DATABASE UTAMA:
                // Menjaring semua variasi key foto agar masuk ke kolom 'image' atau 'image_url' di tabel utama
                $filePath = $dataArray['image'] ?? $dataArray['image_url'] ?? $dataArray['image_path'] ?? null;

                if ($filePath) {
                    // Bersihkan jika ada teks prefix 'public/' dari data lama agar path konsisten
                    $filePath = Str::replace('public/', '', $filePath);
                    $dataArray['image'] = $filePath;
                    $dataArray['image_url'] = $filePath;
                }

                if ($approval->action_type === 'create') {
                    $modelClass::create($dataArray);
                }
                elseif ($approval->action_type === 'update') {
                    $originalItem = $modelClass::findOrFail($approval->model_id);
                    $originalItem->update($dataArray);
                }
                elseif ($approval->action_type === 'delete') {
                    $originalItem = $modelClass::find($approval->model_id);
                    if ($originalItem) {
                        $originalItem->delete();
                    }
                }

                $approval->update([
                    'status' => 'approved',
                    'notes_from_owner' => $request->notes_from_owner
                ]);

                DB::commit();
                return redirect()->route('owner.dashboard')->with('success', '✅ Perubahan data berhasil disetujui dan sistem utama telah diperbarui!');

            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('error', '❌ Terjadi kegagalan sistem saat sinkronisasi data: ' . $e->getMessage());
            }
        }

        if ($status === 'rejected') {
            $approval->update([
                'status' => 'rejected',
                'notes_from_owner' => $request->notes_from_owner
            ]);

            return redirect()->route('owner.dashboard')->with('warning', '⚠️ Pengajuan data ditolak. Komentar alasan berhasil dikirim ke Admin.');
        }
    }

    /**
     * 4. Menampilkan Halaman Riwayat Keputusan Owner (Log Aktivitas)
     */
    public function history()
    {
        $logs = ApprovalRequest::with('user')
            ->whereIn('status', ['approved', 'rejected', 'seen'])
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('owner.history', compact('logs'));
    }
}
