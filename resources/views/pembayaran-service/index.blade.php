@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h1>Pembayaran Service</h1>
        <p>Kelola pembayaran service kendaraan pelanggan.</p>
    </div>

    <a href="{{ route('pembayaran-service.create') }}" class="btn btn-primary">
        + Tambah Pembayaran
    </a>
</div>

<div class="card">
    <div style="overflow-x:auto;">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Data Service</th>
                    <th>Jumlah Biaya</th>
                    <th>Jenis Pembayaran</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($pembayaranServices as $pembayaran)
                    <tr>
                        <td>{{ $pembayaran->id }}</td>
                        <td>{{ $pembayaran->data_service_id }}</td>
                        <td>Rp {{ number_format($pembayaran->jumlah_biaya, 0, ',', '.') }}</td>
                        <td>{{ ucfirst($pembayaran->jenis_pembayaran) }}</td>
                        <td>{{ $pembayaran->keterangan ?? '-' }}</td>
                        <td>
                            <a href="{{ route('pembayaran-service.edit', $pembayaran->id) }}"
                               class="btn btn-primary">
                                Edit
                            </a>

                            <form action="{{ route('pembayaran-service.destroy', $pembayaran->id) }}"
                                  method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus pembayaran ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align:center;padding:30px;">
                            Belum ada data pembayaran.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top:20px;">
        {{ $pembayaranServices->links() }}
    </div>
</div>

@endsection