@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h1>Edit Daftar Service</h1>
        <p>Perbarui data pendaftaran service pelanggan.</p>
    </div>
</div>

<div class="card">

    <form action="{{ route('daftar-service.update', $daftarService->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Pilih Kendaraan --}}
        <div class="form-group">
            <label>Nomor Plat Kendaraan</label>
            <select name="kendaraan_id" class="form-control" required>
                <option value="">-- Pilih Kendaraan --</option>

                @foreach ($kendaraans as $kendaraan)
                    <option value="{{ $kendaraan->id }}"
                        {{ old('kendaraan_id', $daftarService->kendaraan_id) == $kendaraan->id ? 'selected' : '' }}>
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
                        {{ old('pelanggan_id', $daftarService->pelanggan_id) == $pelanggan->id ? 'selected' : '' }}>
                        {{ $pelanggan->id }} - {{ $pelanggan->nama_lengkap }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Nama Pelanggan --}}
        <div class="form-group">
            <label>Nama Pelanggan</label>
            <input type="text"
                   name="nama_pelanggan"
                   id="nama_pelanggan"
                   class="form-control"
                   value="{{ old('nama_pelanggan', $daftarService->nama_pelanggan) }}"
                   readonly
                   required>
        </div>

        {{-- Keluhan --}}
        <div class="form-group">
            <label>Keluhan</label>
            <textarea name="keluhan"
                      class="form-control"
                      rows="4"
                      required>{{ old('keluhan', $daftarService->keluhan) }}</textarea>
        </div>

        {{-- Tanggal Service --}}
        <div class="form-group">
            <label>Tanggal Service</label>
            <input type="date"
                   name="tanggal_service"
                   class="form-control"
                   value="{{ old('tanggal_service', $daftarService->tanggal_service) }}"
                   required>
        </div>

        <div style="display:flex;gap:10px;margin-top:20px;">
            <button type="submit" class="btn btn-primary">
                Update Daftar Service
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

    isiNamaPelanggan();
</script>

@endsection