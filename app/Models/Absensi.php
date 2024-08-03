<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $fillable = [
        'pegawaiID',
        'tanggal',
        'jamMasuk',
        'jamKeluar',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawaiID');
    }
}
