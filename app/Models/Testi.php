<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testi extends Model
{
    use HasFactory;

    protected $table = 'testi';

    protected $fillable = [
        'judul_testi',
        'deskripsi',
        'gambar_testi',
        'status'
    ];

    protected $hidden = [];
}
