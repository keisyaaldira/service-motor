@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h1>Edit Kendaraan</h1>
        <p>Perbarui informasi kendaraan Blue Garage.</p>
    </div>
</div>

<div class="card">

    <form action="{{ route('kendaraan.update', $kendaraan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nomor Plat</label>
            <input type="text" name="nomor_plat"
                   class="form-control"
                   value="{{ old('nomor_plat', $kendaraan->nomor_plat) }}"
                   required>
        </div>

        <div class="form-group">
            <label>Jenis Kendaraan</label>

            <div style="display:flex;gap:25px;margin-top:10px;">
                <label>
                    <input type="radio" name="jenis_kendaraan" value="matic"
                    {{ old('jenis_kendaraan', $kendaraan->jenis_kendaraan) == 'matic' ? 'checked' : '' }}>
                    Matic
                </label>

                <label>
                    <input type="radio" name="jenis_kendaraan" value="manual"
                    {{ old('jenis_kendaraan', $kendaraan->jenis_kendaraan) == 'manual' ? 'checked' : '' }}>
                    Manual Transmisi
                </label>
            </div>
        </div>

        <div class="form-group">
            <label>Nomor STNK</label>
            <input type="text" name="nomor_stnk"
                   class="form-control"
                   value="{{ old('nomor_stnk', $kendaraan->nomor_stnk) }}"
                   required>
        </div>

        <div class="form-group">
            <label>Tahun Pembuatan</label>
            <input type="number" name="tahun_pembuatan"
                   class="form-control"
                   value="{{ old('tahun_pembuatan', $kendaraan->tahun_pembuatan) }}"
                   min="1900" max="{{ date('Y') }}"
                   required>
        </div>

        <div class="form-group">
            <label>Nama Pemilik</label>
            <input type="text" name="nama_pemilik"
                   class="form-control"
                   value="{{ old('nama_pemilik', $kendaraan->nama_pemilik) }}"
                   required>
        </div>

        <div class="form-group">
            <label>Warna Kendaraan</label>
            <input type="text" name="warna"
                   class="form-control"
                   value="{{ old('warna', $kendaraan->warna) }}"
                   required>
        </div>

        <div style="display:flex;gap:10px;margin-top:20px;">
            <button type="submit" class="btn btn-primary">
                Update Kendaraan
            </button>

            <a href="{{ route('kendaraan.index') }}" class="btn">
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection