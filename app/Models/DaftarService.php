<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarService extends Model
{
    protected $fillable = [
        'kendaraan_id',
        'pelanggan_id',
        'nama_pelanggan',
        'keluhan',
        'tanggal_service',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

    public function dataService()
    {
        return $this->hasOne(DataService::class);
    }
}