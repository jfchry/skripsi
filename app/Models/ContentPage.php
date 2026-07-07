<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentPage extends Model
{
    use HasFactory;

    protected $table = 'content_pages'; // Memastikan nama tabelnya pas

    // 🌟 Pastikan semua kolom yang dipakai Guides & Itineraries masuk ke sini!
    protected $fillable = [
    'title',
    'slug', 
    'body',
    'image_url',
    'type',
];
}
