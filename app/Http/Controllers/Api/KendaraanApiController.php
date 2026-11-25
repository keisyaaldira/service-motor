<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanApiController extends Controller
{
    // GET - Tampilkan semua kendaraan
    public function index()
    {
        $kendaraans = Kendaraan::latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Data kendaraan berhasil ditampilkan',
            'data' => $kendaraans
        ], 200);
    }

    // POST - Tambah kendaraan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_plat' => 'required|string|max:20|unique:kendaraans,nomor_plat',
            'jenis_kendaraan' => 'required|in:matic,manual',
            'nomor_stnk' => 'required|string|max:50|unique:kendaraans,nomor_stnk',
            'tahun_pembuatan' => 'required|digits:4',
            'nama_pemilik' => 'required|string|max:255',
            'warna' => 'required|string|max:50',
        ]);

        $kendaraan = Kendaraan::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Kendaraan berhasil ditambahkan',
            'data' => $kendaraan
        ], 201);
    }

    // GET - Detail kendaraan
    public function show($id)
    {
        $kendaraan = Kendaraan::find($id);

        if (!$kendaraan) {
            return response()->json([
                'success' => false,
                'message' => 'Data kendaraan tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail kendaraan berhasil ditampilkan',
            'data' => $kendaraan
        ], 200);
    }

    // PUT & PATCH - Update kendaraan
    public function update(Request $request, $id)
    {
        $kendaraan = Kendaraan::find($id);

        if (!$kendaraan) {
            return response()->json([
                'success' => false,
                'message' => 'Data kendaraan tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'nomor_plat' => 'sometimes|required|string|max:20|unique:kendaraans,nomor_plat,' . $id,
            'jenis_kendaraan' => 'sometimes|required|in:matic,manual',
            'nomor_stnk' => 'sometimes|required|string|max:50|unique:kendaraans,nomor_stnk,' . $id,
            'tahun_pembuatan' => 'sometimes|required|digits:4',
            'nama_pemilik' => 'sometimes|required|string|max:255',
            'warna' => 'sometimes|required|string|max:50',
        ]);

        $kendaraan->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data kendaraan berhasil diperbarui',
            'data' => $kendaraan->fresh()
        ], 200);
    }

    // DELETE - Hapus kendaraan
    public function destroy($id)
    {
        $kendaraan = Kendaraan::find($id);

        if (!$kendaraan) {
            return response()->json([
                'success' => false,
                'message' => 'Data kendaraan tidak ditemukan'
            ], 404);
        }

        $kendaraan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data kendaraan berhasil dihapus'
        ], 200);
    }
}