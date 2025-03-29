<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kirim extends Model
{
    protected $fillable = [
        'gambar',
        'dikirim',
        'nominal',
        'note',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
