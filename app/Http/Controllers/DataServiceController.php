<?php

namespace App\Http\Controllers;

use App\Models\DataService;
use App\Models\DaftarService;
use Illuminate\Http\Request;

class DataServiceController extends Controller
{
    public function index()
    {
        $dataServices = DataService::with('daftarService')
            ->latest()
            ->paginate(10);

        return view('data-service.index', compact('dataServices'));
    }

    public function create()
    {
        $daftarServices = DaftarService::all();

        return view('data-service.create', compact('daftarServices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'daftar_service_id' => 'required|exists:daftar_services,id',
            'keluhan' => 'required|string',
            'estimasi_service' => 'required|numeric|min:0',
            'nama_mekanik' => 'required|string|max:255',
            'sparepart_pengganti' => 'nullable|string|max:255',
        ]);

        DataService::create($request->only([
            'daftar_service_id',
            'keluhan',
            'estimasi_service',
            'nama_mekanik',
            'sparepart_pengganti',
        ]));

        return redirect()->route('data-service.index')
            ->with('success', 'Data service berhasil ditambahkan!');
    }

    public function show(DataService $dataService)
    {
        return redirect()->route('data-service.index');
    }

    public function edit(DataService $dataService)
    {
        $daftarServices = DaftarService::all();

        return view('data-service.edit', compact(
            'dataService',
            'daftarServices'
        ));
    }

    public function update(Request $request, DataService $dataService)
    {
        $request->validate([
            'daftar_service_id' => 'required|exists:daftar_services,id',
            'keluhan' => 'required|string',
            'estimasi_service' => 'required|numeric|min:0',
            'nama_mekanik' => 'required|string|max:255',
            'sparepart_pengganti' => 'nullable|string|max:255',
        ]);

        $dataService->update($request->only([
            'daftar_service_id',
            'keluhan',
            'estimasi_service',
            'nama_mekanik',
            'sparepart_pengganti',
        ]));

        return redirect()->route('data-service.index')
            ->with('success', 'Data service berhasil diperbarui!');
    }

    public function destroy(DataService $dataService)
    {
        $dataService->delete();

        return redirect()->route('data-service.index')
            ->with('success', 'Data service berhasil dihapus!');
    }
}