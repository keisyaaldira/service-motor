@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h1>Edit Pembayaran Service</h1>
        <p>Perbarui informasi pembayaran service kendaraan.</p>
    </div>
</div>

<div class="card">
    <form action="{{ route('pembayaran-service.update', $pembayaranService->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>ID Data Service</label>
            <select name="data_service_id" id="data_service_id" required>
                <option value="">-- Pilih Data Service --</option>

                @foreach ($dataServices as $service)
                    <option value="{{ $service->id }}"
                        data-biaya="{{ $service->estimasi_service }}"
                        {{ old('data_service_id', $pembayaranService->data_service_id) == $service->id ? 'selected' : '' }}>
                        #{{ $service->id }} - {{ $service->nama_mekanik }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Jumlah Biaya (Rp)</label>
            <input type="number" name="jumlah_biaya" id="jumlah_biaya"
                value="{{ old('jumlah_biaya', $pembayaranService->jumlah_biaya) }}"
                min="0" step="1000" required>
        </div>

        <div class="form-group">
            <label>Jenis Pembayaran</label>

            <div style="display:flex;gap:20px;margin-top:10px;">
                <label>
                    <input type="radio" name="jenis_pembayaran" value="tunai"
                        {{ old('jenis_pembayaran', $pembayaranService->jenis_pembayaran) == 'tunai' ? 'checked' : '' }}>
                    Tunai
                </label>

                <label>
                    <input type="radio" name="jenis_pembayaran" value="non-tunai"
                        {{ old('jenis_pembayaran', $pembayaranService->jenis_pembayaran) == 'non-tunai' ? 'checked' : '' }}>
                    Non Tunai
                </label>
            </div>
        </div>

        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" rows="3"
                placeholder="Masukkan keterangan pembayaran (opsional)">{{ old('keterangan', $pembayaranService->keterangan) }}</textarea>
        </div>

        <div style="display:flex;gap:10px;margin-top:20px;">
            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
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

    serviceSelect.addEventListener('change', function () {
        const selectedOption = serviceSelect.options[serviceSelect.selectedIndex];

        if (selectedOption.dataset.biaya) {
            biayaInput.value = selectedOption.dataset.biaya;
        }
    });
</script>

@endsection