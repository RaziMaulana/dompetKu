<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kirim extends Model
{
    protected $fillable = [
        'gambar',
        'dikirim',
        'nominal',
        'note'
    ];
}
