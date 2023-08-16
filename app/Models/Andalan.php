<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Andalan extends Model
{
    use HasFactory;

    protected $table = 'andalan';

    protected $fillable = [
        'judul_andalan',
        'deskripsi',
        'gambar_andalan',
        'status'
    ];

    protected $hidden = [];
}
