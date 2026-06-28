<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentPage extends Model
{
    use HasFactory;

    protected $table = 'content_pages'; // Menegaskan nama tabel di DB

    protected $fillable = [
        'author_id', 'slug', 'title','type', 'body', 'image_url', 'status'
    ];
}
