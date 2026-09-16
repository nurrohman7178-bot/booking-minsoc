<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    public function index()
    {
        $schedule = Jadwal::where('status', 'tersedia')
            ->orderBy('tanggal', 'asc')
            ->orderBy('jam_mulai', 'asc')
            ->get();

        return view('admin.schedule.index', compact('schedule'));
    }

    public function create() {}
    public function store(Request $request) {}
    public function show(string $id) {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}
