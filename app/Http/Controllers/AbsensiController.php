<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\JadwalKerja;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    //
    public function view(){
        Carbon::setLocale('id'); 
        $hariIni = strtolower(Carbon::now()->locale('id')->translatedFormat('l'));
        $jadwalHariIni = JadwalKerja::where('hari', $hariIni)->first(); 

        return view('highFidelity.pages.absensi.absen', compact('jadwalHariIni'));
    }

    public function clockin(Request $request){
        try {
            $currentTime = Carbon::now('Asia/Jakarta')->format('H:i:s');
            $currentDate = Carbon::now('Asia/Jakarta')->toDateString();
        
            Absensi::create([
                'pegawaiID' => Auth::user()->pegawai->id,
                'tanggal' => $currentDate, 
                'jamMasuk' => $currentTime, 
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
        try {
            $currentTime = Carbon::now('Asia/Jakarta')->format('H:i:s');
            $currentDate = Carbon::now('Asia/Jakarta')->toDateString();
            $absensi = Absensi::where('pegawaiID', Auth::user()->pegawai->id)
                              ->where('tanggal', $currentDate)
                              ->first();
    
            if ($absensi) {
                $absensi->update([
                    'jamKeluar' => $currentTime,
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
