<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Jadwal;

class BookingController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'pelanggan') {
            $schedule = Jadwal::where('status', 'tersedia')
                ->orderBy('tanggal')
                ->orderBy('jam_mulai')
                ->get();

            return view('pelanggan.booking.index', compact('schedule'));
        }

        $booking = Booking::with(['pelanggan.user', 'jadwal'])
            ->latest()
            ->get();

        return view('admin.booking.index', compact('booking'));
    }

    public function create()
    {
        return redirect()->route('booking.index');
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'pelanggan') {
            abort(403);
        }

        $request->validate([
            'id_jadwal' => 'required|exists:jadwal,id_jadwal',
        ]);

        $pelanggan = auth()->user()->pelanggan;

        if (!$pelanggan) {
            return back()->with('error', 'Data pelanggan belum tersedia.');
        }

        $jadwal = Jadwal::where('id_jadwal', $request->id_jadwal)
            ->where('status', 'tersedia')
            ->first();

        if (!$jadwal) {
            return back()->with('error', 'Jadwal tersebut sudah tidak tersedia.');
        }

        Booking::create([
            'id_pelanggan' => $pelanggan->id_pelanggan,
            'id_jadwal' => $jadwal->id_jadwal,
            'status' => 'menunggu',
        ]);

        $jadwal->status = 'booked';
        $jadwal->save();

        return redirect()->route('history.index')
            ->with('success', 'Booking berhasil dibuat dan sedang menunggu konfirmasi.');
    }

    public function show(string $id) {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}
