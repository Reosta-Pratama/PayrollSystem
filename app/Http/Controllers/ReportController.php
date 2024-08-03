<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\LaravelPdf\Facades\Pdf;

class ReportController extends Controller
{
    public function slipGaji(){
        $gaji = Gaji::with('pegawai')->latest()->get();
        // dd($gaji);
        return view('highFidelity.pages.laporan.slipGaji', compact('gaji'));
    }

    public function formSlipGaji(){
        $gaji = Gaji::with('pegawai')->latest()->get();
        return view('highFidelity.pages.laporan.slipGaji', compact('gaji'));
    }

    public function downloadSlipGaji(){
        $gaji = Gaji::with('pegawai')->latest()->get();
        Pdf::view('highFidelity.pages.laporan.slipGaji', ['gaji' => $gaji])->save('/assets/directory/invoice.pdf');
    }
}
