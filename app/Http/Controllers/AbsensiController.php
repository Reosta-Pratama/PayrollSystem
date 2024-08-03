<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\JadwalKerja;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    //
    public function view(){
        Carbon::setLocale('id'); 
        $hariIni = strtolower(Carbon::now()->locale('id')->translatedFormat('l'));
        $jadwalHariIni = JadwalKerja::where('hari', $hariIni)->first(); 

        return view('lowFidelity.pages.absensi.absensi', compact('jadwalHariIni'));
    }

    public function clockin(Request $request){
        $request->validate([
            'pegawaiID' => 'required',
            'clockin' => 'required',
        ]);

        try {
            Absensi::create([
                'pegawaiID' => $request->pegawaiID, 
                'tanggal' => Carbon::now(),
                'jamMasuk' => $request->clockin,
            ]);
    
            return redirect()->back()->with('success', 'Berhasil ditambahkan');
    
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function clockout(Request $request)
    {
        $request->validate([
            'pegawaiID' => 'required',
            'clockout' => 'required',
        ]);
    
        try {
            $today = Carbon::now()->toDateString();
            $absensi = Absensi::where('pegawaiID', $request->pegawaiID)
                              ->where('tanggal', $today)
                              ->first();
    
            if ($absensi) {
                $absensi->update([
                    'jamKeluar' => $request->clockout,
                ]);
    
                return redirect()->back()->with('success', 'Berhasil diperbarui');
            } else {
                return redirect()->back()->withErrors(['error' => 'Tidak ada catatan absensi untuk hari ini']);
            }
            
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
