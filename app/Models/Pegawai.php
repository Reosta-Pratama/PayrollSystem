<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $fillable = [
        'userID',
        'nama',
        'alamat',
        'tanggalLahir',
        'jenisKelamin',
        'noTelepon',
        'jabatan',
        'tanggalMasuk',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }

    public function gaji()
    {
        return $this->hasMany(Gaji::class, 'pegawaiID');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'pegawaiID');
    }
}
