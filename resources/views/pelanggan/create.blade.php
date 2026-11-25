@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h1>Tambah Pelanggan</h1>
        <p>Masukkan informasi pelanggan baru.</p>
    </div>
</div>

<div class="card">

    <form action="{{ route('pelanggan.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap"
                   class="form-control"
                   value="{{ old('nama_lengkap') }}"
                   required>
        </div>

        <div class="form-group">
            <label>Nomor HP</label>
            <input type="text" name="nomor_hp"
                   class="form-control"
                   value="{{ old('nomor_hp') }}"
                   required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" rows="3"
                      required>{{ old('alamat') }}</textarea>
        </div>

        <div class="form-group">
            <label>Pekerjaan</label>
            <input type="text" name="pekerjaan"
                   class="form-control"
                   value="{{ old('pekerjaan') }}"
                   required>
        </div>

        <div style="display:flex;gap:10px;margin-top:20px;">
            <button type="submit" class="btn btn-primary">
                Simpan Pelanggan
            </button>

            <a href="{{ route('pelanggan.index') }}" class="btn">
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection