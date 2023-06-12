<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\User;
=======
>>>>>>> origin/master
use App\Models\Struktur;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $tampilan = Struktur::all();
<<<<<<< HEAD
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

        return view('pages.dashboard.informasisekolah', compact('tampilan', 'categories', 'data'));
    }

    public function create()
=======
        return view('pages.dashboard.informasisekolah', compact('tampilan'));
    }

    public function create() 
>>>>>>> origin/master
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
<<<<<<< HEAD

=======
        
>>>>>>> origin/master
        if ($request->hasFile('gambar')) {
            $filename = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move('fotostruktur/', $filename);
            $validateData['gambar'] = $filename;
        }

        $tampilan = Struktur::create($validateData);
<<<<<<< HEAD

=======
        
>>>>>>> origin/master
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
        $guest->delete();

        return redirect('dashboard')->with('Data Berhasil Dihapus!');
    }
}
