@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">

        <div class="mb-4">
            <h1 class="page-title mb-1">Booking Data Page</h1>
            <p class="text-muted mb-0">Data customer yang melakukan booking lapangan</p>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered mb-0">
                        <thead>
                            <tr>
                                <th width="60px">NO</th>
                                <th>Nama Customer</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Harga</th>
                                <th>Status Booking</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($booking as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->pelanggan?->user?->name ?? '-' }}</td>
                                    <td>{{ $data->jadwal ? \Carbon\Carbon::parse($data->jadwal->tanggal)->format('d-m-Y') : '-' }}</td>
                                    <td>
                                        @if ($data->jadwal)
                                            {{ \Carbon\Carbon::parse($data->jadwal->jam_mulai)->format('H:i') }} -
                                            {{ \Carbon\Carbon::parse($data->jadwal->jam_selesai)->format('H:i') }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        Rp {{ $data->jadwal ? number_format($data->jadwal->harga, 0, ',', '.') : '0' }}
                                    </td>
                                    <td>
                                        @if ($data->status == 'menunggu')
                                            <span class="badge badge-warning">Menunggu</span>
                                        @elseif ($data->status == 'dikonfirmasi')
                                            <span class="badge badge-success">Dikonfirmasi</span>
                                        @elseif ($data->status == 'ditolak')
                                            <span class="badge badge-danger">Ditolak</span>
                                        @elseif ($data->status == 'selesai')
                                            <span class="badge badge-primary">Selesai</span>
                                        @else
                                            <span class="badge badge-secondary">Dibatalkan</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        Belum ada data booking.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
