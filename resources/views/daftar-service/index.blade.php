@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h1>Daftar Service</h1>
        <p>Kelola pendaftaran service kendaraan pelanggan.</p>
    </div>

    <a href="{{ route('daftar-service.create') }}" class="btn btn-primary">
        + Daftar Service
    </a>
</div>

<div class="card">
    <div style="overflow-x:auto;">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nomor Plat</th>
                    <th>ID Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Keluhan</th>
                    <th>Tanggal Service</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($daftarServices as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->kendaraan->nomor_plat ?? '-' }}</td>
                        <td>{{ $service->pelanggan_id }}</td>
                        <td>{{ $service->nama_pelanggan }}</td>
                        <td>{{ $service->keluhan }}</td>
                        <td>{{ $service->tanggal_service }}</td>
                        <td>
                            <a href="{{ route('daftar-service.edit', $service->id) }}"
                               class="btn btn-primary">
                                Edit
                            </a>

                            <form action="{{ route('daftar-service.destroy', $service->id) }}"
                                  method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus daftar service ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align:center;padding:30px;">
                            Belum ada daftar service.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top:20px;">
        {{ $daftarServices->links() }}
    </div>
</div>

@endsection