<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    // Nama tabel didefinisikan secara eksplisit agar aman
    protected $table = 'destinations';

    // Kolom yang diizinkan untuk diisi secara massal via controller
    protected $fillable = [
        'name',
        'location_description',
        'image_url'
    ];
}
