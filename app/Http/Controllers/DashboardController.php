<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Booking;
use App\Models\Jadwal;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            $totalPelanggan = Pelanggan::count();
            $totalBooking = Booking::count();

            return view('admin.dashboard', compact('totalPelanggan', 'totalBooking'));
        }

        if ($user->role === 'pelanggan') {
            $pelanggan = $user->pelanggan;

            $totalBooking = $pelanggan ? $pelanggan->bookings()->count() : 0;
            $bookingMenunggu = $pelanggan
                ? $pelanggan->bookings()->where('status', 'menunggu')->count()
                : 0;
            $jadwalTersedia = Jadwal::where('status', 'tersedia')->count();

            return view('pelanggan.dashboard', compact(
                'totalBooking',
                'bookingMenunggu',
                'jadwalTersedia'
            ));
        }

        abort(403, 'Role tidak dikenali.');
    }
}
