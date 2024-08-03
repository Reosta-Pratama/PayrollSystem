<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Pegawai;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    //
    public function list(){
        $pegawai = Pegawai::latest()->get();
        return view('lowFidelity.pages.gaji.list', compact('pegawai'));
    }

    public function read($id)
    {
        $pegawai = Pegawai::with(['gaji' => function($query) {
            $query->orderBy('tanggalGaji', 'desc');
        }])->find($id);

        if ($pegawai) {
            return view('lowFidelity.pages.gaji.read', compact('pegawai'));
        } else {
            return redirect()->back()->withErrors(['error' => 'Tidak ditemukan']);
        }
    }

    public function insert(Request $request)
    {
        // dd($request->all());

        // $request->validate([
        //     'pegawaiID' => 'required',
        //     'gajiPokok' => 'required',
        //     'tanggalGaji' => 'required',
        //     'status' => 'required|max:50',
        // ]);

        try {
            Gaji::create([
                'pegawaiID' => $request->pegawaiID,
                'gajiPokok' => $request->gajiPokok,
                'tunjangan' => $request->tunjangan,
                'bonus' => $request->bonus,
                'potongan' => $request->potongan,
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
