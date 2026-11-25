@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h1>Tambah Kendaraan</h1>
        <p>Masukkan informasi kendaraan pelanggan.</p>
    </div>
</div>

<div class="card">

    <form action="{{ route('kendaraan.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Nomor Plat</label>
            <input type="text" name="nomor_plat"
                   class="form-control"
                   value="{{ old('nomor_plat') }}"
                   placeholder="Contoh: BL 1234 AB"
                   required>
        </div>

        <div class="form-group">
            <label>Jenis Kendaraan</label>

            <div style="display:flex;gap:25px;margin-top:10px;">
                <label>
                    <input type="radio" name="jenis_kendaraan"
                           value="matic"
                           {{ old('jenis_kendaraan') == 'matic' ? 'checked' : '' }}
                           required>
                    Matic
                </label>

                <label>
                    <input type="radio" name="jenis_kendaraan"
                           value="manual"
                           {{ old('jenis_kendaraan') == 'manual' ? 'checked' : '' }}>
                    Manual Transmisi
                </label>
            </div>
        </div>

        <div class="form-group">
            <label>Nomor STNK</label>
            <input type="text" name="nomor_stnk"
                   class="form-control"
                   value="{{ old('nomor_stnk') }}"
                   required>
        </div>

        <div class="form-group">
            <label>Tahun Pembuatan</label>
            <input type="number" name="tahun_pembuatan"
                   class="form-control"
                   value="{{ old('tahun_pembuatan') }}"
                   min="1900" max="{{ date('Y') }}"
                   placeholder="Contoh: 2022"
                   required>
        </div>

        <div class="form-group">
            <label>Nama Pemilik</label>
            <input type="text" name="nama_pemilik"
                   class="form-control"
                   value="{{ old('nama_pemilik') }}"
                   required>
        </div>

        <div class="form-group">
            <label>Warna Kendaraan</label>
            <input type="text" name="warna"
                   class="form-control"
                   value="{{ old('warna') }}"
                   placeholder="Contoh: Hitam"
                   required>
        </div>

        <div style="display:flex;gap:10px;margin-top:20px;">
            <button type="submit" class="btn btn-primary">
                Simpan Kendaraan
            </button>

            <a href="{{ route('kendaraan.index') }}" class="btn">
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection