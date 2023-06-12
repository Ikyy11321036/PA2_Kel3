<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Models\Pengumuman;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
=======
use App\Models\Struktur;
use App\Models\Pengumuman;
use App\Models\User;
use Illuminate\Http\Request;
>>>>>>> origin/master

class PengumumanController extends Controller
{
    public function indexpengumuman()
    {
        $data = Pengumuman::all();
        return view('pages.Pengumuman.pengumuman', compact('data'));
    }

    public function tambahpengumuman()
    {
        return view('pages.Pengumuman.create');
    }

    public function insertpengumuman(Request $request)
    {
        $validateData = $request->validate([
<<<<<<< HEAD
            'file' => 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ], [
            'file.mimes' => 'Silabus hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx',
=======
            'hari_tanggal' => 'required|date_format:Y-m-d',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:500',
        ], [
            'hari_tanggal.required' => 'Harap masukkan tanggal',
            'hari_tanggal.date_format' => 'Format tanggal tidak sesuai, gunakan format YYYY-MM-DD',
>>>>>>> origin/master
            'judul.required' => 'Harap masukkan judul',
            'judul.string' => 'Judul harus berupa teks',
            'judul.max' => 'Judul tidak boleh lebih dari 255 karakter',
            'deskripsi.required' => 'Harap masukkan deskripsi',
            'deskripsi.string' => 'Deskripsi harus berupa teks',
<<<<<<< HEAD
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filepengumuman/', $filename);
            $validateData['file'] = $filename;
        } else {
            $validateData['file'] = null;

            $peng = Pengumuman::create($validateData);

            return redirect()->route('pengumuman');
        }
=======
            'deskripsi.max' => 'Deskripsi tidak boleh lebih dari 500 karakter',
        ]);

        $pengumumans = new Pengumuman();
        $pengumumans->hari_tanggal = $request->input('hari_tanggal');
        $pengumumans->judul = $request->input('judul');
        $pengumumans->deskripsi = $request->input('deskripsi');
        $pengumumans->save();

        return redirect()->route('pengumuman');
>>>>>>> origin/master
    }

    public function melihat($id)
    {
        $data = Pengumuman::find($id);
        return view('pages.Pengumuman.tampilan', compact('data'));
    }

    public function edit($id)
    {
        $attention = Pengumuman::find($id);
        return view('pages.Pengumuman.update', compact('attention'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
<<<<<<< HEAD
            'file' => 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ], [
            'file.mimes' => 'Silabus hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx',
=======
            'hari_tanggal' => 'required|date_format:Y-m-d',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:500',
        ], [
            'hari_tanggal.required' => 'Harap masukkan tanggal',
            'hari_tanggal.date_format' => 'Format tanggal tidak sesuai, gunakan format YYYY-MM-DD',
>>>>>>> origin/master
            'judul.required' => 'Harap masukkan judul',
            'judul.string' => 'Judul harus berupa teks',
            'judul.max' => 'Judul tidak boleh lebih dari 255 karakter',
            'deskripsi.required' => 'Harap masukkan deskripsi',
            'deskripsi.string' => 'Deskripsi harus berupa teks',
<<<<<<< HEAD
        ]);

        $pengumuman = Pengumuman::findOrFail($id);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filepengumuman/', $filename);
            $validateData['file'] = $filename;
        } else {
            $validateData['file'] = $pengumuman->file;
        }

        $pengumuman->update($validateData);

        return redirect()->route('pengumuman');
=======
            'deskripsi.max' => 'Deskripsi tidak boleh lebih dari 500 karakter',
        ]);

        $pengumumans = Pengumuman::find($id);
        $pengumumans->hari_tanggal = $request->input('hari_tanggal');
        $pengumumans->judul = $request->input('judul');
        $pengumumans->deskripsi = $request->input('deskripsi');
        
        $pengumumans->save();

        return redirect('/pengumuman')->with('success', 'Data Berhasil Diupdate!');
>>>>>>> origin/master
    }

    public function remove($id)
    {
        $data = Pengumuman::find($id);
        $data->delete();
        return redirect('pengumuman')->with('success', 'Data Berhasil Dihapus!');
    }
}
