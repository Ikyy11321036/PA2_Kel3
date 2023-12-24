<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Struktur;
use App\Models\Informasi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $tampilan = Struktur::all();
        $informasis = Informasi::all();
        $users = User::query();

        $currentYear = date('Y');
        $numberOfYears = 5;
        $categories = [];

        for ($i = 0; $i < $numberOfYears; $i++) {
            $categories[] = $currentYear + $i;
        }

        $data = [];

        foreach ($categories as $year) {
            $count = $users->whereYear('created_at', $year)->where('role', 'user')->get()->count();
            $data[] = $count;
        }

        return view('pages.dashboard.informasisekolah', compact('tampilan', 'categories', 'data', 'informasis'));
    }

    public function create()
    {
        return view('pages.guest.tambah');
    }

    public function tambah(Request $request)
    {
        $validateData = $request->validate([
            'gambar' => 'required|mimes:jpg,jpeg,png,gif,heic',
        ], [
            'gambar.required' => 'Gambar harus diisi',
            'gambar.mimes' => 'Gambar harus memakai jpg,jpeg,png,gif,heic',
        ]);
        if ($request->hasFile('gambar')) {
            $filename = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move('fotostruktur/', $filename);
            $validateData['gambar'] = $filename;
        }

        $tampilan = Struktur::create($validateData);
        return redirect('dashboard')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $guest = Struktur::find($id);
        return view('pages.guest.edit', compact('guest'));
    }

    public function update(Request $request, $id)
    {
        $guest = Struktur::find($id);

        $validateData = $request->validate([
            'gambar' => 'required|mimes:jpg,jpeg,png,gif,heic',
        ], [
            'gambar.required' => 'Gambar harus diisi',
            'gambar.mimes' => 'Gambar harus memakai jpg,jpeg,png,gif,heic',
        ]);

        if ($request->hasFile('gambar')) {
            $filename = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move('fotostruktur/', $filename);
            $validateData['gambar'] = $filename;
        }

        if (isset($validateData['gambar'])) {
            $guest->gambar = $validateData['gambar'];
        }

        $guest->save();

        return redirect('dashboard')->with('Gambar berhasil ditampilkan!');
    }

    public function delete($id)
{
    $guest = Struktur::find($id);
    
    if ($guest) {
        $guest->delete();
        return redirect('dashboard')->with('Data Berhasil Dihapus!');
    } else {
        return redirect('dashboard')->with('Data tidak ditemukan!');
    }
}

    public function createinformasi()
    {
        return view('pages.Informasi.tambah');
    }

    public function tambahinformasi(Request $request)
    {
        $validateData = $request->validate([
            'latar_belakang' => 'required',
            'judul' => 'required',
        ], [
            'latar_belakang.required' => 'Informasi Sekolah Harus Diisi',
            'judul.required' => 'Judul Informasi Harus Diisi',
        ]);

        $information = Informasi::create($validateData); 
        return redirect('dashboard')->with('success', 'Data berhasil ditambahkan!');
    }

    public function editinformasi($id)
    {
        $editif = Informasi::find($id);
        return view('pages.Informasi.edit', compact('editif'));
    }

    public function updateinformasi(Request $request, $id)
    {
        $validateData = $request->validate([
            'judul' => 'nullable',
            'latar_belakang' => 'nullable',
        ]);

        $editif = Informasi::find($id);
        $editif->judul = $request->input('judul');
        $editif->latar_belakang = $request->input('latar_belakang');

        $editif->save();

        return redirect('dashboard')->with('success', 'Data Berhasil Diupdate!');
    }

    public function remove($id)
{
    $editif = Informasi::find($id);
    
    if ($editif) {
        $editif->delete();
        return redirect('dashboard')->with('Data Berhasil Dihapus!');
    } else {
        return redirect('dashboard')->with('Data tidak ditemukan!');
    }
}
}
