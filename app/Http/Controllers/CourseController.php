<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function view()
    {
<<<<<<< HEAD
        $courses = MataPelajaran::orderBy('tingkat_kelas', 'asc')->get();
=======
        $courses = MataPelajaran::all();
>>>>>>> origin/master
        return view('pages.courses.main', compact('courses'));
    }

    public function create()
    {
        return view('pages.courses.input');
    }

    public function addmatapelajaran(Request $request)
    {
<<<<<<< HEAD
        $validateData = $request->validate([
=======
        $request->validate([
>>>>>>> origin/master
            'nama_matapelajaran' => 'required|string|max:50',
            'tingkat_kelas' => 'required|string',
        ]);

<<<<<<< HEAD
        $mapels = MataPelajaran::create($validateData);
=======
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $file->move('filecourse/', $filename);

        $mataPelajaran = new MataPelajaran;
        $mataPelajaran->nama_matapelajaran = $request->nama_matapelajaran;
        $mataPelajaran->tingkat_kelas = $request->tingkat_kelas;
        $mataPelajaran->file = $filename;
        $mataPelajaran->save();
>>>>>>> origin/master

        return redirect('matapelajaransiswa')->with('success', 'Data berhasil ditambah!');
    }

    public function edit($id)
    {
        $pelajaran = MataPelajaran::find($id);
        return view('pages.courses.edit', compact('pelajaran'));
    }

    public function update(Request $request, $id) 
    {
        $request->validate([
            'nama_matapelajaran' => 'string|max:50',
            'tingkat_kelas' => 'string',
        ]);

        $pelajaran = MataPelajaran::find($id);
        $pelajaran->nama_matapelajaran = $request->input('nama_matapelajaran');
        $pelajaran->tingkat_kelas = $request->input('tingkat_kelas');

        $pelajaran->save();

        return redirect('matapelajaransiswa')->with('success', 'Kepala Sekolah Berhasil Diupdate!');
    }

}
