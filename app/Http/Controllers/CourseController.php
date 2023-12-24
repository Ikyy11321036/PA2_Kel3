<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function view()
    {
        $courses = MataPelajaran::orderBy('tingkat_kelas', 'asc')->get();
        return view('pages.courses.main', compact('courses'));
    }

    public function create()
    {
        return view('pages.courses.input');
    }

    public function addmatapelajaran(Request $request)
    {
        $validateData = $request->validate([
            'nama_matapelajaran' => 'required|string|max:50',
            'tingkat_kelas' => 'required|string',
            'deskripsi' => 'required|string',
            'durasi' => 'required|string',
        ],[
            'nama_matapelajaran.required' => 'Nama Mata Pelajaran Harus Diisi',
            'nama_matapelajaran.string' => 'Nama Mata Pelajaran Harus Menggunakan Huruf Saja',
            'nama_matapelajaran.max' => 'Nama Mata Pelajaran Maksimal 50 Huruf',
            'tingkat_kelas.required' => 'Tingkat Kelas Harus Diisi',
            'tingkat_kelas.required' => 'Tingkat Kelas Hanya Dapat Huruf Saja',
        ]);

        $mapels = MataPelajaran::create($validateData);

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
            'deskripsi' => 'string',
            'durasi' => 'string',
        ]);

        $pelajaran = MataPelajaran::find($id);
        $pelajaran->nama_matapelajaran = $request->input('nama_matapelajaran');
        $pelajaran->tingkat_kelas = $request->input('tingkat_kelas');
        $pelajaran->deskripsi = $request->input('deskripsi');
        $pelajaran->durasi = $request->input('durasi');

        $pelajaran->save();

        return redirect('matapelajaransiswa')->with('success', 'Data Berhasil Diupdate!');
    }

    public function delete($id)
    {
        $mapelsiswaid = MataPelajaran::find($id);
        $mapelsiswaid->delete();

        return redirect('matapelajaransiswa')->with('success', 'Data Berhasil Dihapus!');
    }

}
