<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function slipGaji(){
        $gaji = Gaji::with('pegawai')->latest()->get();
        // dd($gaji);
        return view('highFidelity.pages.laporan.slipGaji', compact('gaji'));
    }
}
