<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index()
    {
        $pengguna = Auth::user();
        return view('pages.Profil.index', compact('pengguna'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('pages.Profil.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'username' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'alamat' => 'nullable|string|max:255',
            'no_telepon' => 'nullable|digits_between:9,12',
            'nisn' => 'nullable|numeric|digits:10',
            'nip' => 'nullable|numeric|digits:18',
            'tpt_lahir' => 'nullable|string',
            'tgl_lahir' => 'nullable',
            'jenis_kelamin' => 'nullable|in:Laki-Laki,Perempuan',
            'agama' => 'nullable|max:30',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'username.string' => 'Username hanya boleh diisi dengan huruf dan angka',
            'username.max' => 'Username tidak boleh melebihi 255 karakter',
            'username.unique' => 'Username sudah digunakan, silahkan gunakan username lain',
            'alamat.string' => 'Alamat hanya boleh diisi dengan huruf, angka, dan karakter khusus',
            'alamat.max' => 'Alamat tidak boleh melebihi 255 karakter',
            'alamat.unique' => 'Alamat sudah digunakan, silahkan gunakan alamat lain',
            'no_telepon.digits_between' => 'Nomor telepon harus diisi antara 9-12 digit',
            'no_telepon.unique' => 'Nomor telepon sudah digunakan, silahkan gunakan nomor telepon lain',
            'nisn.numeric' => 'NISN hanya boleh diisi dengan angka',
            'nisn.digits' => 'NISN harus diisi dengan 10 digit',
            'nip.digits' => 'NIP harus diisi dengan 18 digit',
            'nisn.unique' => 'nisn sudah digunakan, silahkan gunakan nisn lain',
            'agama.max' => 'Huruf kelebihan harap kurangi huruf',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan.',
        ]);

        if (isset($validatedData['username'])) {
            $user->username = $validatedData['username'];
        }
        if (isset($validatedData['alamat'])) {
            $user->alamat = $validatedData['alamat'];
        }
        if (isset($validatedData['no_telepon'])) {
            $user->no_telepon = $validatedData['no_telepon'];
        }
        if (isset($validatedData['nisn'])) {
            $user->nisn = $validatedData['nisn'];
        }
        if (isset($validatedData['nip'])) {
            $user->nip = $validatedData['nip'];
        }
        if (isset($validatedData['tpt_lahir'])) {
            $user->tpt_lahir = $validatedData['tpt_lahir'];
        }
        if (isset($validatedData['tgl_lahir'])) {
            $user->tgl_lahir = $validatedData['tgl_lahir'];
        }
        if (isset($validatedData['jenis_kelamin'])) {
            $user->jenis_kelamin = $validatedData['jenis_kelamin'];
        }
        if (isset($validatedData['agama'])) {
            $user->agama = $validatedData['agama'];
        }
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotoprofil/', $request->file('foto')->getClientOriginalName());
            $user->foto = $request->file('foto')->getClientOriginalName();
        }
        $user->save();

        return redirect()->route('profiluser')->with('success', 'Profil Berhasil Diperbaharui');
    }
}
