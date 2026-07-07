<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_type',
        'model_id',
        'action_type',
        'payload',
        'user_id',
        'status',
        'notes_from_owner',
        'is_seen'
    ];

    // 🌟 TRICK SAKTI: Mengotomatiskan konversi JSON ke Array PHP secara real-time
    protected $casts = [
        'payload' => 'array',
    ];

    /**
     * Relasi ke model User (Melihat admin mana yang membuat pengajuan)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
