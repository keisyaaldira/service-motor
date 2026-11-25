@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h1>Edit Pelanggan</h1>
        <p>Perbarui informasi pelanggan Blue Garage.</p>
    </div>
</div>

<div class="card">

    <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap"
                   class="form-control"
                   value="{{ old('nama_lengkap', $pelanggan->nama_lengkap) }}"
                   required>
        </div>

        <div class="form-group">
            <label>Nomor HP</label>
            <input type="text" name="nomor_hp"
                   class="form-control"
                   value="{{ old('nomor_hp', $pelanggan->nomor_hp) }}"
                   required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" rows="3"
                      required>{{ old('alamat', $pelanggan->alamat) }}</textarea>
        </div>

        <div class="form-group">
            <label>Pekerjaan</label>
            <input type="text" name="pekerjaan"
                   class="form-control"
                   value="{{ old('pekerjaan', $pelanggan->pekerjaan) }}"
                   required>
        </div>

        <div style="display:flex;gap:10px;margin-top:20px;">
            <button type="submit" class="btn btn-primary">
                Update Pelanggan
            </button>

            <a href="{{ route('pelanggan.index') }}" class="btn">
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection