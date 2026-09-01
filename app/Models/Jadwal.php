<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    public function Booking()
    {
        return $this->hasMany(Booking::class, 'id_jadwal', 'id_jadwal');
    }
}
