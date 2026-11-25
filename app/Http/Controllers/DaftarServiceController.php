<?php

namespace App\Http\Controllers;

use App\Models\DaftarService;
use App\Models\Pelanggan;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class DaftarServiceController extends Controller
{
    // Menampilkan daftar service
    public function index()
    {
        $daftarServices = DaftarService::with(['pelanggan', 'kendaraan'])
            ->latest()
            ->paginate(10);

        return view('daftar-service.index', compact('daftarServices'));
    }

    // Menampilkan form tambah service
    public function create()
    {
        $pelanggans = Pelanggan::all();
        $kendaraans = Kendaraan::all();

        return view('daftar-service.create', compact('pelanggans', 'kendaraans'));
    }

    // Menyimpan daftar service
    public function store(Request $request)
    {
        $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'nama_pelanggan' => 'required|string|max:255',
            'keluhan' => 'required|string',
            'tanggal_service' => 'required|date',
        ]);

        DaftarService::create($request->only([
            'kendaraan_id',
            'pelanggan_id',
            'nama_pelanggan',
            'keluhan',
            'tanggal_service',
        ]));

        return redirect()->route('daftar-service.index')
            ->with('success', 'Daftar service berhasil ditambahkan!');
    }

    // Menampilkan detail service
    public function show(DaftarService $daftarService)
    {
        return redirect()->route('daftar-service.index');
    }

    // Menampilkan form edit service
    public function edit(DaftarService $daftarService)
    {
        $pelanggans = Pelanggan::all();
        $kendaraans = Kendaraan::all();

        return view('daftar-service.edit', compact(
            'daftarService',
            'pelanggans',
            'kendaraans'
        ));
    }

    // Memperbarui daftar service
    public function update(Request $request, DaftarService $daftarService)
    {
        $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'nama_pelanggan' => 'required|string|max:255',
            'keluhan' => 'required|string',
            'tanggal_service' => 'required|date',
        ]);

        $daftarService->update($request->only([
            'kendaraan_id',
            'pelanggan_id',
            'nama_pelanggan',
            'keluhan',
            'tanggal_service',
        ]));

        return redirect()->route('daftar-service.index')
            ->with('success', 'Daftar service berhasil diperbarui!');
    }

    // Menghapus daftar service
    public function destroy(DaftarService $daftarService)
    {
        $daftarService->delete();

        return redirect()->route('daftar-service.index')
            ->with('success', 'Daftar service berhasil dihapus!');
    }
}