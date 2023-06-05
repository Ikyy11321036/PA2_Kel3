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
            'telpon' => 'nullable|digits_between:9,12',
            'nip' => 'nullable|numeric|min:18|unique:users,nip',
            'tempat_lahir' => 'nullable|string',
            'kelahiran' => 'nullable|date_format:Y-m-d',
            'jenis_kelamin' => 'nullable|in:Laki-Laki,Perempuan',
            'pangkat' => 'nullable|min:3|max:255',
            'jabatan' => 'nullable|min:3|max:255',
            'agama' => 'nullable|max:30',
            'menjabat' => 'nullable|date_format:Y-m-d',
            'lulus_sertifikasi' => 'nullable|string',
            'motto' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'username.string' => 'Username hanya boleh diisi dengan huruf dan angka',
            'username.max' => 'Username tidak boleh melebihi 255 karakter',
            'username.unique' => 'Username sudah digunakan, silahkan gunakan username lain',
            'email.string' => 'Email harus diisi dengan format email yang benar',
            'email.email' => 'Email harus diisi dengan format email yang benar',
            'email.max' => 'Email tidak boleh melebihi 255 karakter',
            'email.unique' => 'Email sudah digunakan, silahkan gunakan email lain',
            'alamat.string' => 'Alamat hanya boleh diisi dengan huruf, angka, dan karakter khusus',
            'alamat.max' => 'Alamat tidak boleh melebihi 255 karakter',
            'alamat.unique' => 'Alamat sudah digunakan, silahkan gunakan alamat lain',
            'telpon.digits_between' => 'Nomor telepon harus diisi antara 9-12 digit',
            'telpon.unique' => 'Nomor telepon sudah digunakan, silahkan gunakan nomor telepon lain',
            'nip.numeric' => 'NIP hanya boleh diisi dengan angka',
            'nip.max' => 'NIP harus diisi dengan 18 digit',
            'nip.min' => 'NIP harus diisi dengan 18 digit',
            'nip.unique' => 'NIP sudah digunakan, silahkan gunakan NIP lain',
            'kelahiran.date_format' => 'Format tanggal lahir tidak sesuai dengan format yang ditentukan (YYYY-MM-DD)',
            'pangkat.min' => 'Pangkat harus diisi minimal 3 huruf',
            'pangkat.max' => 'Huruf kelebihan harap kurangi huruf',
            'jabatan.min' => 'Jabatan harus diisi minimal 3 huruf',
            'jabatan.max' => 'Huruf kelebihan harap kurangi huruf',
            'agama.max' => 'Huruf kelebihan harap kurangi huruf',
            'lulus_sertifikasi.' => 'Lulus Sertifikasi wajib diisi',
            'motto.string' => 'Hanya dapat menggunakan huruf saja',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan.',
        ]);

        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->alamat = $validatedData['alamat'];
        $user->telpon = $validatedData['telpon'];
        $user->nip = $validatedData['nip'];
        $user->tempat_lahir = $validatedData['tempat_lahir'];
        $user->kelahiran = $validatedData['kelahiran'];
        $user->pangkat = $validatedData['pangkat'];
        $user->jabatan = $validatedData['jabatan'];
        if (isset($validatedData['jenis_kelamin'])) {
            $user->jenis_kelamin = $validatedData['jenis_kelamin'];
        }    
        $user->agama = $validatedData['agama'];
        $user->menjabat = $validatedData['menjabat'];
        $user->lulus_sertifikasi = $validatedData['lulus_sertifikasi'];
        $user->motto = $validatedData['motto'];

        if ($request->hasFile('photo')) {
            $request->file('photo')->move('fotoprofil/', $request->file('photo')->getClientOriginalName());
            $user->photo = $request->file('photo')->getClientOriginalName();
        }
        $user->save();

        return redirect()->route('profiluser')->with('success', 'Profil Berhasil Diperbaharui');
    }
}
