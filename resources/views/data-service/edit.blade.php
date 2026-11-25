@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h1>Edit Data Service</h1>
        <p>Perbarui informasi pengerjaan service kendaraan.</p>
    </div>
</div>

<div class="card">
    <form action="{{ route('data-service.update', $dataService->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>ID Daftar Service</label>
            <select name="daftar_service_id" id="daftar_service_id" required>
                <option value="">-- Pilih Daftar Service --</option>

                @foreach ($daftarServices as $daftar)
                    <option value="{{ $daftar->id }}"
                        data-keluhan="{{ $daftar->keluhan }}"
                        {{ old('daftar_service_id', $dataService->daftar_service_id) == $daftar->id ? 'selected' : '' }}>
                        #{{ $daftar->id }} - {{ $daftar->nama_pelanggan }}
                        ({{ $daftar->kendaraan->nomor_plat ?? '-' }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Keluhan</label>
            <textarea name="keluhan" id="keluhan" rows="4" readonly required>{{ old('keluhan', $dataService->keluhan) }}</textarea>
        </div>

        <div class="form-group">
            <label>Estimasi Biaya Service (Rp)</label>
            <input type="number" name="estimasi_service"
                value="{{ old('estimasi_service', $dataService->estimasi_service) }}"
                min="0" step="1000" required>
        </div>

        <div class="form-group">
            <label>Nama Mekanik</label>
            <input type="text" name="nama_mekanik"
                value="{{ old('nama_mekanik', $dataService->nama_mekanik) }}"
                required>
        </div>

        <div class="form-group">
            <label>Sparepart Pengganti</label>
            <input type="text" name="sparepart_pengganti"
                value="{{ old('sparepart_pengganti', $dataService->sparepart_pengganti) }}"
                placeholder="Masukkan sparepart (jika ada)">
        </div>

        <div style="display:flex;gap:10px;margin-top:20px;">
            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>

            <a href="{{ route('data-service.index') }}" class="btn btn-danger">
                Batal
            </a>
        </div>
    </form>
</div>

<script>
    const daftarSelect = document.getElementById('daftar_service_id');
    const keluhanInput = document.getElementById('keluhan');

    function isiKeluhan() {
        const selectedOption = daftarSelect.options[daftarSelect.selectedIndex];
        keluhanInput.value = selectedOption.dataset.keluhan || '';
    }

    daftarSelect.addEventListener('change', isiKeluhan);
</script>

@endsection