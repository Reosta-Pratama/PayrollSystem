<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\JadwalKerja;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JadwalKerjaController extends Controller
{
    //
    public function insert(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'hari' => 'required|unique:jadwal_kerjas,hari',
            'jamMasuk' => 'required',
            'jamKeluar' => 'required',
        ]);

        try {
            JadwalKerja::create([
                'hari' => $request->hari,
                'jamMasuk' => $request->jamMasuk,
                'jamKeluar' => $request->jamKeluar,
            ]);

            return redirect()->route("jadwalKerja.list")->with('success', 'Berhasil ditambahkan');

        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function list(){
        $jadwalKerja = JadwalKerja::latest()->get();
        return view('highFidelity.pages.jadwalKerja.list', compact('jadwalKerja'));
    }

    public function read($id)
    {
        $jadwalKerja = JadwalKerja::find($id);
        if ($jadwalKerja) {
            return view('lowFidelity.pages.jadwalKerja.update', compact('jadwalKerja'));
        } else {
            return redirect()->back()->withErrors(['error' => 'Tidak ditemukan']);
        }
    }

    public function update(Request $request, $id){
        // dd($request->all());

        $request->validate([
            'hari' => [
                'required',
                Rule::unique('jadwal_kerjas', 'hari')->ignore($id)
            ],
            'jamMasuk' => 'required',
            'jamKeluar' => 'required',
        ]);

        try {
            $jadwalKerja = JadwalKerja::findOrFail($id);

            $jadwalKerja->update([
                'hari' => $request->hari,
                'jamMasuk' => $request->jamMasuk,
                'jamKeluar' => $request->jamKeluar,
            ]);

            return redirect()->route('jadwalKerja.list')->with('success', 'Berhasil diperbarui');

        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function delete($id){
        try {
            $jadwalKerja = JadwalKerja::findOrFail($id);
            $jadwalKerja->delete();

            return redirect()->route('jadwalKerja.list')->with('success', 'Berhasil dihapus');

        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
