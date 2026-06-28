<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillaService extends Model
{
    use HasFactory;

    protected $table = 'villa_services';

    protected $fillable = [
        'service_name',
        'description',
        'price',
        'icon_url', // Berfungsi sebagai path foto utama kamar
    ];
}
