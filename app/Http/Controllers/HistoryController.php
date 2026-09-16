<?php

namespace App\Http\Controllers;

use App\Models\Booking;

class HistoryController extends Controller
{
    public function index()
    {
        $pelanggan = auth()->user()->pelanggan;

        $history = $pelanggan
            ? Booking::with('jadwal')
                ->where('id_pelanggan', $pelanggan->id_pelanggan)
                ->latest()
                ->get()
            : collect();

        return view('pelanggan.history.index', compact('history'));
    }
}
