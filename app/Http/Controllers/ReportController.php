<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function slipGaji(){
        $gaji = Gaji::with('pegawai')->latest()->get();
        // dd($gaji);
        return view('highFidelity.pages.laporan.slipGaji', compact('gaji'));
    }

    public function formSlipGaji(){
        $gaji = Gaji::with('pegawai')->latest()->get();
        return view('highFidelity.pages.laporan.formSlipGaji', compact('gaji'));
    }

    public function downloadSlipGaji(){
        $pdf = Pdf::loadView('pdf');
        return $pdf->download();
    }
}
