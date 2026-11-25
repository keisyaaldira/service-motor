@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h1>Daftar Service Baru</h1>
        <p>Daftarkan kendaraan pelanggan yang akan melakukan service.</p>
    </div>
</div>

<div class="card">

    <form action="{{ route('daftar-service.store') }}" method="POST">
        @csrf

        {{-- Pilih Kendaraan --}}
        <div class="form-group">
            <label>Nomor Plat Kendaraan</label>
            <select name="kendaraan_id" class="form-control" required>
                <option value="">-- Pilih Kendaraan --</option>

                @foreach ($kendaraans as $kendaraan)
                    <option value="{{ $kendaraan->id }}"
                        {{ old('kendaraan_id') == $kendaraan->id ? 'selected' : '' }}>
                        {{ $kendaraan->nomor_plat }} - {{ $kendaraan->nama_pemilik }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Pilih Pelanggan --}}
        <div class="form-group">
            <label>ID Pelanggan</label>
            <select name="pelanggan_id" id="pelanggan_id"
                   class="form-control" required>
                <option value="">-- Pilih ID Pelanggan --</option>

                @foreach ($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->id }}"
                        data-nama="{{ $pelanggan->nama_lengkap }}"
                        {{ old('pelanggan_id') == $pelanggan->id ? 'selected' : '' }}>
                        {{ $pelanggan->id }} - {{ $pelanggan->nama_lengkap }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Nama Pelanggan Otomatis --}}
        <div class="form-group">
            <label>Nama Pelanggan</label>
            <input type="text"
                   name="nama_pelanggan"
                   id="nama_pelanggan"
                   class="form-control"
                   value="{{ old('nama_pelanggan') }}"
                   readonly
                   required>
        </div>

        {{-- Keluhan --}}
        <div class="form-group">
            <label>Keluhan</label>
            <textarea name="keluhan"
                      class="form-control"
                      rows="4"
                      placeholder="Tuliskan keluhan kendaraan..."
                      required>{{ old('keluhan') }}</textarea>
        </div>

        {{-- Tanggal Service --}}
        <div class="form-group">
            <label>Tanggal Service</label>
            <input type="date"
                   name="tanggal_service"
                   class="form-control"
                   value="{{ old('tanggal_service', date('Y-m-d')) }}"
                   required>
        </div>

        <div style="display:flex;gap:10px;margin-top:20px;">
            <button type="submit" class="btn btn-primary">
                Simpan Daftar Service
            </button>

            <a href="{{ route('daftar-service.index') }}" class="btn">
                Kembali
            </a>
        </div>

    </form>

</div>

<script>
    const pelangganSelect = document.getElementById('pelanggan_id');
    const namaInput = document.getElementById('nama_pelanggan');

    function isiNamaPelanggan() {
        const selectedOption = pelangganSelect.options[pelangganSelect.selectedIndex];
        namaInput.value = selectedOption.dataset.nama || '';
    }

    pelangganSelect.addEventListener('change', isiNamaPelanggan);

    // Mengisi nama ketika halaman dibuka kembali
    isiNamaPelanggan();
</script>

@endsection