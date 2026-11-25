<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DataService;
use Illuminate\Http\Request;

class DataServiceApiController extends Controller
{
    // GET - Tampilkan semua data service
    public function index()
    {
        $dataServices = DataService::with('daftarService')
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Data service berhasil ditampilkan',
            'data' => $dataServices
        ], 200);
    }

    // POST - Tambah data service
    public function store(Request $request)
    {
        $validated = $request->validate([
            'daftar_service_id' => 'required|exists:daftar_services,id',
            'keluhan' => 'required|string',
            'estimasi_service' => 'required|numeric|min:0',
            'nama_mekanik' => 'required|string|max:255',
            'sparepart_pengganti' => 'nullable|string|max:255',
        ]);

        $dataService = DataService::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data service berhasil ditambahkan',
            'data' => $dataService->load('daftarService')
        ], 201);
    }

    // GET - Detail data service
    public function show($id)
    {
        $dataService = DataService::with('daftarService')->find($id);

        if (!$dataService) {
            return response()->json([
                'success' => false,
                'message' => 'Data service tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail data service berhasil ditampilkan',
            'data' => $dataService
        ], 200);
    }

    // PUT & PATCH - Update data service
    public function update(Request $request, $id)
    {
        $dataService = DataService::find($id);

        if (!$dataService) {
            return response()->json([
                'success' => false,
                'message' => 'Data service tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'daftar_service_id' => 'sometimes|required|exists:daftar_services,id',
            'keluhan' => 'sometimes|required|string',
            'estimasi_service' => 'sometimes|required|numeric|min:0',
            'nama_mekanik' => 'sometimes|required|string|max:255',
            'sparepart_pengganti' => 'sometimes|nullable|string|max:255',
        ]);

        $dataService->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data service berhasil diperbarui',
            'data' => $dataService->fresh()->load('daftarService')
        ], 200);
    }

    // DELETE - Hapus data service
    public function destroy($id)
    {
        $dataService = DataService::find($id);

        if (!$dataService) {
            return response()->json([
                'success' => false,
                'message' => 'Data service tidak ditemukan'
            ], 404);
        }

        $dataService->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data service berhasil dihapus'
        ], 200);
    }
}