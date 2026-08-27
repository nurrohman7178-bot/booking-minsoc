<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';

    protected $fillable = [
        'id_user',
        'no_telepon',
        'alamat',
        'no_identitas',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'id_pelanggan', 'id_pelanggan');
    }
}
