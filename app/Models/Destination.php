<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $table = 'destinations';

    // 🌟 SELESAI: Menambahkan 'image_url' agar tidak diblokir Laravel saat disetujui Owner
    protected $fillable = [
        'name',
        'location_description',
        'image',
        'image_url'
    ];
}
