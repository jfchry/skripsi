<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $table = 'inquiries';

    protected $fillable = [
        'visitor_name',      // 🌟 Sesuai database
        'email',
        'phone_number',      // 🌟 Sesuai database
        'service_requested', // 🌟 Sesuai database
        'message',
    ];
}
