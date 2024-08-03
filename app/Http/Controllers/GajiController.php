<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Gaji;
use App\Models\JadwalKerja;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    //
    public function list(){
        $pegawai = Pegawai::latest()->get();
        return view('highFidelity.pages.gaji.list', compact('pegawai'));
    }

    public function read($id)
    {
        $pegawai = Pegawai::with(['gaji' => function($query) {
            $query->orderBy('tanggalGaji', 'desc');
        }])->find($id);

        if ($pegawai) {
            return view('highFidelity.pages.gaji.read', compact('pegawai'));
        } else {
            return redirect()->back()->withErrors(['error' => 'Tidak ditemukan']);
        }
    }

    public function insert(Request $request)
    {
        $request->validate([
            'pegawaiID' => 'required',
            'gajiPokok' => 'required|numeric',
            'tanggalGaji' => 'required|date',
            'status' => 'required|max:50',
        ]);

        try {
            $penalty = $this->calculatePenalty($request->pegawaiID, $request->gajiPokok);

            Gaji::create([
                'pegawaiID' => $request->pegawaiID,
                'gajiPokok' => $request->gajiPokok,
                'tunjangan' => $request->tunjangan,
                'bonus' => $request->bonus,
                'potongan' => $penalty,
                'tanggalGaji' => $request->tanggalGaji,
                'status' => $request->status,
            ]);

            return redirect()->back()->with('success', 'Berhasil ditambahkan');

        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    private function calculatePenalty($pegawaiID, $gajiPokok)
    {
        $latePenalty = $this->calculateLatePenalty($pegawaiID);
        $absencePenalty = $this->calculateAbsencePenalty($pegawaiID, $gajiPokok);

        // dd($latePenalty);

        return $latePenalty + $absencePenalty;
    }

    private function calculateLatePenalty($pegawaiID)
    {
        $penaltyPerMinute = 1000; 
        $latePenalty = 0;
    
        Carbon::setLocale('id');
    
        $absensiRecords = Absensi::where('pegawaiID', $pegawaiID)
            ->whereMonth('tanggal', Carbon::now()->month)
            ->get();
    
        foreach ($absensiRecords as $record) {
            $tanggal = Carbon::parse($record->tanggal);
            $hari = $tanggal->locale('id')->translatedFormat('l');
            $hari = strtolower($hari);

            // dd($hari);
            
            $jadwal = JadwalKerja::where('hari', $hari)->first();
    
            // dd($jadwal);

            if ($jadwal && $record->jamMasuk && Carbon::parse($record->jamMasuk)->gt($jadwal->jamMasuk)) {
                $lateMinutes = Carbon::parse($record->jamMasuk)->diffInMinutes($jadwal->jamMasuk);
    
                // dd($lateMinutes);

                if ($lateMinutes > 15) {
                    $latePenalty += ($lateMinutes - 15) * $penaltyPerMinute;
                    // dd($latePenalty);
                }
            }
        }
    
        return $latePenalty;
    }

    private function calculateAbsencePenalty($pegawaiID, $gajiPokok)
    {
        $absencePenalty = 0;

        $absensiRecords = Absensi::where('pegawaiID', $pegawaiID)
            ->whereMonth('tanggal', Carbon::now()->month)
            ->get();

        $daysInMonth = Carbon::now()->daysInMonth;
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $date = Carbon::now()->copy()->day($day)->toDateString();
            $attendance = $absensiRecords->firstWhere('tanggal', $date);
            if (!$attendance || !$attendance->jamMasuk || !$attendance->jamKeluar) {
                $absencePenalty += $gajiPokok / 2 / $daysInMonth;
            }
        }

        return $absencePenalty;
    }

    public function delete($id){
        try {
            $gaji = Gaji::findOrFail($id);
            $gaji->delete();

            return redirect()->back()->with('success', 'Berhasil dihapus');

        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
