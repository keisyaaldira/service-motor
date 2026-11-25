<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DaftarService;
use Illuminate\Http\Request;

class DaftarServiceApiController extends Controller
{
    // GET - Tampilkan semua daftar service
    public function index()
    {
        $daftarServices = DaftarService::with(['pelanggan', 'kendaraan'])
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Data daftar service berhasil ditampilkan',
            'data' => $daftarServices
        ], 200);
    }

    // POST - Tambah daftar service
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'nama_pelanggan' => 'required|string|max:255',
            'keluhan' => 'required|string',
            'tanggal_service' => 'required|date',
        ]);

        $daftarService = DaftarService::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Daftar service berhasil ditambahkan',
            'data' => $daftarService->load(['pelanggan', 'kendaraan'])
        ], 201);
    }

    // GET - Detail daftar service
    public function show($id)
    {
        $daftarService = DaftarService::with(['pelanggan', 'kendaraan'])
            ->find($id);

        if (!$daftarService) {
            return response()->json([
                'success' => false,
                'message' => 'Daftar service tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $daftarService
        ], 200);
    }

    // PUT & PATCH - Update daftar service
    public function update(Request $request, $id)
    {
        $daftarService = DaftarService::find($id);

        if (!$daftarService) {
            return response()->json([
                'success' => false,
                'message' => 'Daftar service tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'kendaraan_id' => 'sometimes|required|exists:kendaraans,id',
            'pelanggan_id' => 'sometimes|required|exists:pelanggans,id',
            'nama_pelanggan' => 'sometimes|required|string|max:255',
            'keluhan' => 'sometimes|required|string',
            'tanggal_service' => 'sometimes|required|date',
        ]);

        $daftarService->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Daftar service berhasil diperbarui',
            'data' => $daftarService->fresh()->load(['pelanggan', 'kendaraan'])
        ], 200);
    }

    // DELETE - Hapus daftar service
    public function destroy($id)
    {
        $daftarService = DaftarService::find($id);

        if (!$daftarService) {
            return response()->json([
                'success' => false,
                'message' => 'Daftar service tidak ditemukan'
            ], 404);
        }

        $daftarService->delete();

        return response()->json([
            'success' => true,
            'message' => 'Daftar service berhasil dihapus'
        ], 200);
    }
}