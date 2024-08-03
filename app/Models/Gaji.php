<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;
    protected $fillable = [
        'pegawaiID',
        'gajiPokok',
        'tunjangan',
        'bonus',
        'potongan',
        'tanggalGaji',
        'status'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawaiID');
    }
}
