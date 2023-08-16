<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banner';

    protected $fillable = [
        'judul_banner',
        'deskripsi',
        'gambar_banner',
        'status'
    ];

    protected $hidden = [];
}
