@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="page-title mb-1">Schedule Data</h1>
                <p class="text-muted mb-0">Atur dan pantau ketersediaan slot bermain di setiap lapangan.</p>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="schedule-wrapper">
                    <table class="schedule-table">
                        <thead>
                            <tr>
                                <th class="time-header">Time</th>
                                @foreach ($days as $day)
                                    <th>
                                        <div class="day-name">{{ $day->translatedFormat('D') }}</div>
                                        <div class="day-date">{{ $day->format('d/m/Y') }}</div>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($timeSlots as $time)
                                <tr>
                                    <td class="time-cell">{{ $time }}</td>

                                    @foreach ($days as $day)
                                        @php
                                            $jadwal = $schedule->first(function ($item) use ($day, $time) {
                                                return \Carbon\Carbon::parse($item->tanggal)->isSameDay($day)
                                                    && \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') === $time;
                                            });
                                        @endphp

                                        <td class="schedule-cell">
                                            @if ($jadwal)
                                                @if ($jadwal->status === 'tersedia')
                                                    <div class="slot slot-available">
                                                        <strong>Available</strong>
                                                        <small>{{ $time }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</small>
                                                        <span>Rp {{ number_format($jadwal->harga, 0, ',', '.') }}</span>
                                                    </div>
                                                @elseif ($jadwal->status === 'booked')
                                                    <div class="slot slot-booked">
                                                        <strong>Booked</strong>
                                                        <small>{{ $time }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</small>
                                                    </div>
                                                @else
                                                    <div class="slot slot-maintenance">
                                                        <strong>Maintenance</strong>
                                                        <small>{{ $time }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</small>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="slot slot-empty">-</div>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-5">
                                        Belum ada data jadwal.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-3 d-flex flex-wrap align-items-center small text-muted">
            <span class="mr-4 mb-2"><i class="fas fa-circle text-success mr-1"></i> Available</span>
            <span class="mr-4 mb-2"><i class="fas fa-circle text-info mr-1"></i> Booked</span>
            <span class="mb-2"><i class="fas fa-circle text-warning mr-1"></i> Maintenance</span>
        </div>

    </div>

    <style>
        .schedule-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .schedule-table {
            width: 100%;
            min-width: 900px;
            border-collapse: separate;
            border-spacing: 0;
            table-layout: fixed;
        }

        .schedule-table th,
        .schedule-table td {
            border-right: 1px solid #e3e6f0;
            border-bottom: 1px solid #e3e6f0;
        }

        .schedule-table thead th {
            background: #f8f9fc;
            padding: 10px 8px;
            text-align: center;
            font-size: 11px;
            color: #5a5c69;
        }

        .schedule-table thead th:last-child,
        .schedule-table tbody td:last-child {
            border-right: 0;
        }

        .time-header {
            width: 75px;
        }

        .day-name {
            font-weight: 700;
            font-size: 12px;
            text-transform: uppercase;
        }

        .day-date {
            font-size: 10px;
            margin-top: 2px;
            color: #858796;
        }

        .time-cell {
            width: 75px;
            text-align: center;
            vertical-align: middle;
            font-size: 11px;
            font-weight: 600;
            color: #5a5c69;
            background: #fff;
        }

        .schedule-cell {
            height: 70px;
            padding: 4px;
            vertical-align: middle;
            background: #fff;
        }

        .slot {
            min-height: 58px;
            border-radius: 6px;
            padding: 7px 5px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            line-height: 1.25;
        }

        .slot strong {
            font-size: 11px;
        }

        .slot small,
        .slot span {
            font-size: 9px;
            margin-top: 2px;
        }

        .slot-available {
            background: #dff7e9;
            color: #198754;
            border: 1px solid #bce8ce;
        }

        .slot-booked {
            background: #e8f4ff;
            color: #1976b9;
            border: 1px solid #c9e5f8;
        }

        .slot-maintenance {
            background: #fff0d6;
            color: #b76b00;
            border: 1px solid #f5d49b;
        }

        .slot-empty {
            color: #c5c7d0;
            min-height: 58px;
            align-items: center;
            justify-content: center;
        }
    </style>
@endsection
