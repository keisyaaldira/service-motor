@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h1>Data Service</h1>
        <p>Kelola pengerjaan service kendaraan pelanggan.</p>
    </div>

    <a href="{{ route('data-service.create') }}" class="btn btn-primary">
        + Tambah Data Service
    </a>
</div>

<div class="card">
    <div style="overflow-x:auto;">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Daftar Service</th>
                    <th>Keluhan</th>
                    <th>Estimasi Biaya</th>
                    <th>Mekanik</th>
                    <th>Sparepart</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($dataServices as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->daftar_service_id }}</td>
                        <td>{{ $service->keluhan }}</td>
                        <td>Rp {{ number_format($service->estimasi_service, 0, ',', '.') }}</td>
                        <td>{{ $service->nama_mekanik }}</td>
                        <td>{{ $service->sparepart_pengganti ?? '-' }}</td>
                        <td>
                            <a href="{{ route('data-service.edit', $service->id) }}"
                               class="btn btn-primary">
                                Edit
                            </a>

                            <form action="{{ route('data-service.destroy', $service->id) }}"
                                  method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus data service ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align:center;padding:30px;">
                            Belum ada data service.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top:20px;">
        {{ $dataServices->links() }}
    </div>
</div>

@endsection