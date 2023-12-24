<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'file' => 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ], [
            'file.mimes' => 'Silabus hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx',
            'judul.required' => 'Harap masukkan judul',
            'judul.string' => 'Judul harus berupa teks',
            'judul.max' => 'Judul tidak boleh lebih dari 255 karakter',
            'deskripsi.required' => 'Harap masukkan deskripsi',
            'deskripsi.string' => 'Deskripsi harus berupa teks',
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filepengumuman/', $filename);
            $validateData['file'] = $filename;
        } else {
            $validateData['file'] = null;
        }

        $peng = Pengumuman::create($validateData);

        if ($peng) {
            return redirect()->route('pengumuman')->with('success', 'Pengumuman berhasil ditambahkan.');
        } else {
            return back()->with('error', 'Gagal menambahkan pengumuman. Silakan coba lagi.');
        }
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
            'file' => 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ], [
            'file.mimes' => 'Silabus hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx',
            'judul.required' => 'Harap masukkan judul',
            'judul.string' => 'Judul harus berupa teks',
            'judul.max' => 'Judul tidak boleh lebih dari 255 karakter',
            'deskripsi.required' => 'Harap masukkan deskripsi',
            'deskripsi.string' => 'Deskripsi harus berupa teks',
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
    }

    public function remove($id)
    {
        $data = Pengumuman::find($id);
        $data->delete();
        return redirect('pengumuman')->with('success', 'Data Berhasil Dihapus!');
    }
}
