<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use Carbon\Carbon;

class JadwalController extends Controller
{
    public function index()
    {
        $schedule = Jadwal::orderBy('tanggal', 'asc')
            ->orderBy('jam_mulai', 'asc')
            ->get();

        $firstDate = $schedule->isNotEmpty()
            ? Carbon::parse($schedule->min('tanggal'))
            : Carbon::today();

        $weekStart = $firstDate->copy()->startOfWeek(Carbon::MONDAY);
        $weekEnd = $firstDate->copy()->endOfWeek(Carbon::SUNDAY);

        $days = collect();
        for ($date = $weekStart->copy(); $date->lte($weekEnd); $date->addDay()) {
            $days->push($date->copy());
        }

        $timeSlots = $schedule
            ->filter(function ($jadwal) use ($weekStart, $weekEnd) {
                $date = Carbon::parse($jadwal->tanggal);
                return $date->betweenIncluded($weekStart, $weekEnd);
            })
            ->map(function ($jadwal) {
                return Carbon::parse($jadwal->jam_mulai)->format('H:i');
            })
            ->unique()
            ->sort()
            ->values();

        return view('admin.schedule.index', compact(
            'schedule',
            'days',
            'timeSlots'
        ));
    }

    public function create() {}
    public function store(Request $request) {}
    public function show(string $id) {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}
