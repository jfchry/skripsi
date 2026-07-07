<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    // Nama tabel di database kamu
    protected $table = 'inquiries';

    /**
     * Kolom-kolom yang diizinkan untuk diisi secara massal
     */
    protected $fillable = [
        'visitor_name', // Kolom nama asli database
        'email',
        'phone_number', // Kolom nomor hp asli database
        'message',
    ];
}
