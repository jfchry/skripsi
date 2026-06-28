<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galleries';

    // Matikan updated_at karena di tabel phpMyAdmin kamu hanya ada created_at
    const UPDATED_AT = null;

    protected $fillable = [
        'parent_type',
        'parent_id',
        'file_path', // 🌟 Nama kolom gambar asli di DB
        'caption',   // 🌟 Nama kolom teks judul asli di DB
    ];
}
