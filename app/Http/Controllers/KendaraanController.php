<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    // Menampilkan seluruh data kendaraan
    public function index()
    {
        $kendaraans = Kendaraan::latest()->paginate(10);

        return view('kendaraan.index', compact('kendaraans'));
    }

    // Menampilkan form tambah kendaraan
    public function create()
    {
        return view('kendaraan.create');
    }

    // Menyimpan data kendaraan baru
    public function store(Request $request)
    {
        $request->validate([
            'nomor_plat' => 'required|string|max:20|unique:kendaraans,nomor_plat',
            'jenis_kendaraan' => 'required|in:matic,manual',
            'nomor_stnk' => 'required|string|max:50|unique:kendaraans,nomor_stnk',
            'tahun_pembuatan' => 'required|digits:4',
            'nama_pemilik' => 'required|string|max:255',
            'warna' => 'required|string|max:50',
        ]);

        Kendaraan::create($request->only([
            'nomor_plat',
            'jenis_kendaraan',
            'nomor_stnk',
            'tahun_pembuatan',
            'nama_pemilik',
            'warna',
        ]));

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil ditambahkan!');
    }

    // Menampilkan detail kendaraan
    public function show(Kendaraan $kendaraan)
    {
        return redirect()->route('kendaraan.index');
    }

    // Menampilkan form edit kendaraan
    public function edit(Kendaraan $kendaraan)
    {
        return view('kendaraan.edit', compact('kendaraan'));
    }

    // Memperbarui data kendaraan
    public function update(Request $request, Kendaraan $kendaraan)
    {
        $request->validate([
            'nomor_plat' => 'required|string|max:20|unique:kendaraans,nomor_plat,' . $kendaraan->id,
            'jenis_kendaraan' => 'required|in:matic,manual',
            'nomor_stnk' => 'required|string|max:50|unique:kendaraans,nomor_stnk,' . $kendaraan->id,
            'tahun_pembuatan' => 'required|digits:4',
            'nama_pemilik' => 'required|string|max:255',
            'warna' => 'required|string|max:50',
        ]);

        $kendaraan->update($request->only([
            'nomor_plat',
            'jenis_kendaraan',
            'nomor_stnk',
            'tahun_pembuatan',
            'nama_pemilik',
            'warna',
        ]));

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil diperbarui!');
    }

    // Menghapus data kendaraan
    public function destroy(Kendaraan $kendaraan)
    {
        $kendaraan->delete();

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil dihapus!');
    }
}