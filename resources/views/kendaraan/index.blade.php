@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h1>Data Kendaraan</h1>
        <p>Kelola data kendaraan pelanggan Blue Garage.</p>
    </div>

    <a href="{{ route('kendaraan.create') }}" class="btn btn-primary">
        + Tambah Kendaraan
    </a>
</div>

<div class="card">
    <div style="overflow-x:auto;">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nomor Plat</th>
                    <th>Jenis</th>
                    <th>Nomor STNK</th>
                    <th>Tahun</th>
                    <th>Nama Pemilik</th>
                    <th>Warna</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($kendaraans as $kendaraan)
                    <tr>
                        <td>{{ $kendaraan->id }}</td>
                        <td>{{ $kendaraan->nomor_plat }}</td>
                        <td>{{ ucfirst($kendaraan->jenis_kendaraan) }}</td>
                        <td>{{ $kendaraan->nomor_stnk }}</td>
                        <td>{{ $kendaraan->tahun_pembuatan }}</td>
                        <td>{{ $kendaraan->nama_pemilik }}</td>
                        <td>{{ $kendaraan->warna }}</td>
                        <td>
                            <a href="{{ route('kendaraan.edit', $kendaraan->id) }}"
                               class="btn btn-primary">
                                Edit
                            </a>

                            <form action="{{ route('kendaraan.destroy', $kendaraan->id) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus kendaraan ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" style="text-align:center;padding:30px;">
                            Belum ada data kendaraan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top:20px;">
        {{ $kendaraans->links() }}
    </div>
</div>

@endsection