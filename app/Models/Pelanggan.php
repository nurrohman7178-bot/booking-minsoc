<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';

    protected $primaryKey = 'id_pelanggan';

    protected $fillable = [
        'id_user',
        'nama',
        'no_telepon',
        'alamat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function bookings()
    {
        return $this->hasMany(
            Booking::class,
            'id_pelanggan',
            'id_pelanggan'
        );
    }
}
