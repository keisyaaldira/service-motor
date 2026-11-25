<?php

namespace App\Http\Controllers;

use App\Models\PembayaranService;
use App\Models\DataService;
use Illuminate\Http\Request;

class PembayaranServiceController extends Controller
{
    public function index()
    {
        $pembayaranServices = PembayaranService::with('dataService')
            ->latest()
            ->paginate(10);

        return view('pembayaran-service.index', compact('pembayaranServices'));
    }

    public function create()
    {
        $dataServices = DataService::all();

        return view('pembayaran-service.create', compact('dataServices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'data_service_id' => 'required|exists:data_services,id',
            'jumlah_biaya' => 'required|numeric|min:0',
            'jenis_pembayaran' => 'required|in:tunai,non-tunai',
            'keterangan' => 'nullable|string',
        ]);

        PembayaranService::create($request->only([
            'data_service_id',
            'jumlah_biaya',
            'jenis_pembayaran',
            'keterangan',
        ]));

        return redirect()->route('pembayaran-service.index')
            ->with('success', 'Pembayaran service berhasil ditambahkan!');
    }

    public function show(PembayaranService $pembayaranService)
    {
        return redirect()->route('pembayaran-service.index');
    }

    public function edit(PembayaranService $pembayaranService)
    {
        $dataServices = DataService::all();

        return view('pembayaran-service.edit', compact(
            'pembayaranService',
            'dataServices'
        ));
    }

    public function update(Request $request, PembayaranService $pembayaranService)
    {
        $request->validate([
            'data_service_id' => 'required|exists:data_services,id',
            'jumlah_biaya' => 'required|numeric|min:0',
            'jenis_pembayaran' => 'required|in:tunai,non-tunai',
            'keterangan' => 'nullable|string',
        ]);

        $pembayaranService->update($request->only([
            'data_service_id',
            'jumlah_biaya',
            'jenis_pembayaran',
            'keterangan',
        ]));

        return redirect()->route('pembayaran-service.index')
            ->with('success', 'Pembayaran service berhasil diperbarui!');
    }

    public function destroy(PembayaranService $pembayaranService)
    {
        $pembayaranService->delete();

        return redirect()->route('pembayaran-service.index')
            ->with('success', 'Pembayaran service berhasil dihapus!');
    }
}