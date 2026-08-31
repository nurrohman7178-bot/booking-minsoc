<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {

            $totalPelanggan = Pelanggan::count();
            $totalBooking = Booking::count();

            return view('dashboard_admin', compact(
                'totalPelanggan',
                'totalBooking'
            ));
        }

        if ($user->role === 'pelanggan') {

            return view('dashboard_pelanggan');
        }

        abort(403, 'Role tidak dikenali.');
    }
}
