@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h1>Data Pelanggan</h1>
        <p>Kelola data pelanggan Blue Garage.</p>
    </div>

    <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">
        + Tambah Pelanggan
    </a>
</div>

<div class="card">

    <div style="overflow-x:auto;">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Lengkap</th>
                    <th>Nomor HP</th>
                    <th>Alamat</th>
                    <th>Pekerjaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($pelanggans as $pelanggan)
                    <tr>
                        <td>{{ $pelanggan->id }}</td>
                        <td>{{ $pelanggan->nama_lengkap }}</td>
                        <td>{{ $pelanggan->nomor_hp }}</td>
                        <td>{{ $pelanggan->alamat }}</td>
                        <td>{{ $pelanggan->pekerjaan }}</td>
                        <td>
                            <a href="{{ route('pelanggan.edit', $pelanggan->id) }}"
                               class="btn btn-primary">
                                Edit
                            </a>

                            <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align:center;padding:30px;">
                            Belum ada data pelanggan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top:20px;">
        {{ $pelanggans->links() }}
    </div>

</div>

@endsection