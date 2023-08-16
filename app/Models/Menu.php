<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';

    protected $fillable = [
        'judul_menu',
        'harga',
        'gambar_menu',
        'status'
    ];

    protected $hidden = [];

}
