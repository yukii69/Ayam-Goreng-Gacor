<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    protected $table = 'promo';

    protected $fillable = [
        'diskon_promo',
        'judul_promo',
        'deskripsi',
        'gambar_promo',
        'status'
    ];

    protected $hidden = [];
}
