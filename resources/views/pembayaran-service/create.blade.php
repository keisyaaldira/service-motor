@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h1>Tambah Pembayaran Service</h1>
        <p>Masukkan informasi pembayaran service kendaraan.</p>
    </div>
</div>

<div class="card">
    <form action="{{ route('pembayaran-service.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>ID Data Service</label>
            <select name="data_service_id" id="data_service_id" required>
                <option value="">-- Pilih Data Service --</option>

                @foreach ($dataServices as $service)
                    <option value="{{ $service->id }}"
                        data-biaya="{{ $service->estimasi_service }}"
                        {{ old('data_service_id') == $service->id ? 'selected' : '' }}>
                        #{{ $service->id }} - {{ $service->nama_mekanik }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Jumlah Biaya (Rp)</label>
            <input type="number" name="jumlah_biaya" id="jumlah_biaya"
                value="{{ old('jumlah_biaya') }}"
                min="0" step="1000" required>
        </div>

        <div class="form-group">
            <label>Jenis Pembayaran</label>

            <div style="display:flex;gap:20px;margin-top:10px;">
                <label>
                    <input type="radio" name="jenis_pembayaran" value="tunai"
                        {{ old('jenis_pembayaran', 'tunai') == 'tunai' ? 'checked' : '' }}>
                    Tunai
                </label>

                <label>
                    <input type="radio" name="jenis_pembayaran" value="non-tunai"
                        {{ old('jenis_pembayaran') == 'non-tunai' ? 'checked' : '' }}>
                    Non Tunai
                </label>
            </div>
        </div>

        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" rows="3"
                placeholder="Masukkan keterangan pembayaran (opsional)">{{ old('keterangan') }}</textarea>
        </div>

        <div style="display:flex;gap:10px;margin-top:20px;">
            <button type="submit" class="btn btn-primary">
                Simpan Pembayaran
            </button>

            <a href="{{ route('pembayaran-service.index') }}" class="btn btn-danger">
                Batal
            </a>
        </div>
    </form>
</div>

<script>
    const serviceSelect = document.getElementById('data_service_id');
    const biayaInput = document.getElementById('jumlah_biaya');

    function isiBiaya() {
        const selectedOption = serviceSelect.options[serviceSelect.selectedIndex];

        if (selectedOption.dataset.biaya) {
            biayaInput.value = selectedOption.dataset.biaya;
        }
    }

    serviceSelect.addEventListener('change', isiBiaya);

    isiBiaya();
</script>

@endsection