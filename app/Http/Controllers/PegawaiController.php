<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    //
    public function insert(Request $request)
    {
        // dd($request->all());

        // Validasi input
        $request->validate([
            'role' => 'required',
            'email' => 'required|email|unique:users,email',
            'nama' => 'required|max:255',
            'alamat' => 'required',
            'tanggalLahir' => 'required|date',
            'jenisKelamin' => 'required|max:2',
            'noTelepon' => 'required|max:15',
            'jabatan' => 'required|max:100',
            'tanggalMasuk' => 'required|date',
            'status' => 'required|max:50'
        ]);
    
        try {
            $user = User::create([
                'role' => $request->role,
                'email' => $request->email,
                'password' => Hash::make('password')  
            ]);
    
            Pegawai::create([
                'userID' => $user->id, 
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'tanggalLahir' => $request->tanggalLahir,
                'jenisKelamin' => $request->jenisKelamin,
                'noTelepon' => $request->noTelepon,
                'jabatan' => $request->jabatan,
                'tanggalMasuk' => $request->tanggalMasuk,
                'status' => $request->status
            ]);
    
            return redirect()->route("pegawai.list")->with('success', 'Berhasil ditambahkan');
    
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
    public function list(){
        $pegawai = Pegawai::with('user')->latest()->get();
        return view('highFidelity.pages.pegawai.list', compact('pegawai'));
    }

    public function read($id)
    {
        $pegawai = Pegawai::find($id);
        if ($pegawai) {
            return view('highFidelity.pages.pegawai.update', compact('pegawai'));
        } else {
            return redirect()->back()->withErrors(['error' => 'Tidak ditemukan']);
        }
    }

    public function update(Request $request, $id){
        // dd($request->all());

        // $request->validate([
        //     'role' => 'required',
        //     'email' => 'required|email|unique:users,email',
        //     'nama' => 'required|max:255',
        //     'alamat' => 'required',
        //     'tanggalLahir' => 'required|date',
        //     'jenisKelamin' => 'required|max:2',
        //     'noTelepon' => 'required|max:15',
        //     'jabatan' => 'required|max:100',
        //     'tanggalMasuk' => 'required|date',
        //     'status' => 'required|max:50'
        // ]);

        try {
            $pegawai = Pegawai::findOrFail($id);

            $pegawai->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'tanggalLahir' => $request->tanggalLahir,
                'jenisKelamin' => $request->jenisKelamin,
                'noTelepon' => $request->noTelepon,
                'jabatan' => $request->jabatan,
                'tanggalMasuk' => $request->tanggalMasuk,
                'status' => $request->status
            ]);

            return redirect()->route('pegawai.list')->with('success', 'Berhasil diperbarui');

        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            $pegawai = Pegawai::findOrFail($id);
            $user = $pegawai->user;
            $pegawai->delete();
            if ($user) {
                $user->delete();
            }
    
            return redirect()->route('pegawai.list')->with('success', 'Berhasil dihapus');
    
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
}
