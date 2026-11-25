<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PembayaranService;
use Illuminate\Http\Request;

class PembayaranServiceApiController extends Controller
{
    // GET: Menampilkan semua pembayaran
    public function index()
    {
        $pembayaran = PembayaranService::with('dataService')
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Data pembayaran berhasil ditampilkan',
            'data' => $pembayaran
        ], 200);
    }

    // POST: Menambahkan pembayaran
    public function store(Request $request)
    {
        $validated = $request->validate([
            'data_service_id' => 'required|exists:data_services,id',
            'jumlah_biaya' => 'required|numeric|min:0',
            'jenis_pembayaran' => 'required|in:tunai,non-tunai',
            'keterangan' => 'nullable|string',
        ]);

        $pembayaran = PembayaranService::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Pembayaran berhasil ditambahkan',
            'data' => $pembayaran->load('dataService')
        ], 201);
    }

    // GET: Menampilkan detail pembayaran
    public function show($id)
    {
        $pembayaran = PembayaranService::with('dataService')
            ->find($id);

        if (!$pembayaran) {
            return response()->json([
                'success' => false,
                'message' => 'Data pembayaran tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail pembayaran berhasil ditampilkan',
            'data' => $pembayaran
        ], 200);
    }

    // PUT dan PATCH: Memperbarui pembayaran
    public function update(Request $request, $id)
    {
        $pembayaran = PembayaranService::find($id);

        if (!$pembayaran) {
            return response()->json([
                'success' => false,
                'message' => 'Data pembayaran tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'data_service_id' => 'sometimes|required|exists:data_services,id',
            'jumlah_biaya' => 'sometimes|required|numeric|min:0',
            'jenis_pembayaran' => 'sometimes|required|in:tunai,non-tunai',
            'keterangan' => 'sometimes|nullable|string',
        ]);

        $pembayaran->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data pembayaran berhasil diperbarui',
            'data' => $pembayaran->fresh()->load('dataService')
        ], 200);
    }

    // DELETE: Menghapus pembayaran
    public function destroy($id)
    {
        $pembayaran = PembayaranService::find($id);

        if (!$pembayaran) {
            return response()->json([
                'success' => false,
                'message' => 'Data pembayaran tidak ditemukan'
            ], 404);
        }

        $pembayaran->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data pembayaran berhasil dihapus'
        ], 200);
    }
}
