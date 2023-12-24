<?php

namespace App\Http\Controllers;

use App\Models\Silabus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SilabusController extends Controller
{
    public function index()
    {
        $silabus = Silabus::all();
        return view('pages.Silabus.index', compact('silabus'));
    }

    // Controller Silabus Agama
    public function indexagama()
    {
        $agamasilabus = Silabus::select('nama_materi', 'silabus', 'file', 'id', 'agama', 'kelas')
            ->where('agama', 'true')
            ->get();
        return view('pages.Silabus.isiagama', compact('agamasilabus'));
    }

    public function add()
    {
        return view('pages.Silabus.silabusagama');
    }

    public function create_agama(Request $request)
    {
        $validateData = $request->validate([
            'nama_materi' => 'required|max:255',
            'silabus' => 'required|max:255',
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
            'kelas' => 'required',
            'agama',
        ], [
            'nama_materi.required' => 'Judul Materi harus diisi',
            'nama_materi.max' => 'Judul Materi terlalu panjang harap mengurangi',
            'silabus.required' => 'Informasi Materi harus diisi',
            'silabus.max' => 'Informasi terlalu panjang harap menguranginya',
            'file.required' => 'Materi harus diisi',
            'file.mimes' => 'Materi hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx',
            'kelas.required' => 'Kelas Siswa Harus Diisi',
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filesilabus/', $filename);
            $validateData['file'] = $filename;
            $validateData['agama'] = 'true';
        }

        $agamasilabus = Silabus::create($validateData);

        return redirect('indexsilabus')->with('Materi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $agamas = Silabus::find($id);
        return view('pages.Silabus.editagama', compact('agamas'));
    }

    public function update(Request $request, $id)
    {
        $agamas = Silabus::find($id);

        $validateData = $request->validate([
            'nama_materi' => 'max:255',
            'silabus' => 'max:255',
            'file' => 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
            'kelas' => '',
        ], [
            'nama_materi.max' => 'Judul Materi terlalu panjang harap mengurangi',
            'silabus.max' => 'Informasi terlalu panjang harap menguranginya',
            'file.mimes' => 'Materi hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx'
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filesilabus/', $filename);
            $validateData['file'] = $filename;
        }

        $agamas->nama_materi = $validateData['nama_materi'];
        $agamas->silabus = $validateData['silabus'];
        $agamas->kelas = $validateData['kelas'];
        if (isset($validateData['file'])) {
            $agamas->file = $validateData['file'];
        }

        $agamas->save();

        return redirect('indexsilabus')->with('Materi berhasil diperbaharui!');
    }

    public function delete($id)
    {
        $dataagama = Silabus::find($id);
        $dataagama->delete();
        return redirect('indexsilabus')->with('Materi berhasil dihapus!');
    }
    // Akhir Controller Silabus Agama

    // Controller Silabus Tematik
    public function indextematik()
    {
        $tematiksilabus = Silabus::select('nama_materi', 'silabus', 'file', 'id', 'tematik', 'kelas')
            ->where('tematik', 'true')
            ->get();
        return view('pages.Silabus.isitematik', compact('tematiksilabus'));
    }

    public function addtematik()
    {
        return view('pages.Silabus.silabustematik');
    }

    public function create_tematik(Request $request)
    {
        $validateData = $request->validate([
            'nama_materi' => 'required|max:255',
            'silabus' => 'required|max:255',
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
            'kelas' => 'required',
            'tematik',
        ], [
            'nama_materi.required' => 'Judul Materi harus diisi',
            'nama_materi.max' => 'Judul Materi terlalu panjang harap mengurangi',
            'silabus.required' => 'Informasi Materi harus diisi',
            'silabus.max' => 'Informasi terlalu panjang harap menguranginya',
            'file.required' => 'Materi harus diisi',
            'file.mimes' => 'Materi hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx',
            'kelas.required' => 'Kelas Siswa Harus Diisi',
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filesilabus/', $filename);
            $validateData['file'] = $filename;
            $validateData['tematik'] = 'true';
        }

        $tematiksilabus = Silabus::create($validateData);

        return redirect('indexsilabus')->with('Materi berhasil ditambahkan');
    }

    public function edittematik($id)
    {
        $tematiks = Silabus::find($id);
        return view('pages.Silabus.edittematik', compact('tematiks'));
    }

    public function updatetematik(Request $request, $id)
    {
        $tematiks = Silabus::find($id);

        $validateData = $request->validate([
            'nama_materi' => 'required|max:255',
            'silabus' => 'required|max:255',
            'file' => 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
            'kelas' => '',
            'tematik',
        ], [
            'nama_materi.required' => 'Judul Materi harus diisi',
            'nama_materi.max' => 'Judul Materi terlalu panjang harap mengurangi',
            'silabus.required' => 'Informasi Materi harus diisi',
            'silabus.max' => 'Informasi terlalu panjang harap menguranginya',
            'file.mimes' => 'Materi hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx'
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filesilabus/', $filename);
            $validateData['file'] = $filename;
            $validateData['tematik'] = 'true';
        }

        $tematiks->nama_materi = $validateData['nama_materi'];
        $tematiks->silabus = $validateData['silabus'];
        $tematiks->kelas = $validateData['kelas'];
        if (isset($validateData['file'])) {
            $tematiks->file = $validateData['file'];
        }

        $tematiks->save();

        return redirect('indexsilabus')->with('Materi berhasil diperbaharui!');
    }

    public function deletetematik($id)
    {
        $datatematik = Silabus::find($id);
        $datatematik->delete();
        return redirect('indexsilabus')->with('Materi berhasil dihapus!');
    }
    // Akhir Controller Silabus Tematik

    // Controller Silabus Bahasa Inggris
    public function indexenglish()
    {
        $englishsilabus = Silabus::select('nama_materi', 'silabus', 'file', 'id', 'english', 'kelas')
            ->where('english', 'true')
            ->get();
        return view('pages.Silabus.isienglish', compact('englishsilabus'));
    }

    public function addenglish()
    {
        return view('pages.Silabus.silabusenglish');
    }

    public function create_english(Request $request)
    {
        $validateData = $request->validate([
            'nama_materi' => 'required|max:255',
            'silabus' => 'required|max:255',
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
            'kelas' => 'required',
            'english',
        ], [
            'nama_materi.required' => 'Judul Materi harus diisi',
            'nama_materi.max' => 'Judul Materi terlalu panjang harap mengurangi',
            'silabus.required' => 'Informasi Materi harus diisi',
            'silabus.max' => 'Informasi terlalu panjang harap menguranginya',
            'file.required' => 'Materi harus diisi',
            'file.mimes' => 'Materi hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx',
            'kelas.required' => 'Kelas Siswa Harus Diisi',
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filesilabus/', $filename);
            $validateData['file'] = $filename;
            $validateData['english'] = 'true';
        }

        $englishsilabus = Silabus::create($validateData);

        return redirect('indexsilabus')->with('Materi berhasil ditambahkan');
    }

    public function editenglish($id)
    {
        $englishs = Silabus::find($id);
        return view('pages.Silabus.editenglish', compact('englishs'));
    }

    public function updateenglish(Request $request, $id)
    {
        $englishs = Silabus::find($id);

        $validateData = $request->validate([
            'nama_materi' => 'required|max:255',
            'silabus' => 'required|max:255',
            'file' => 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
            'kelas' => '',
            'english',
        ], [
            'nama_materi.required' => 'Judul Materi harus diisi',
            'nama_materi.max' => 'Judul Materi terlalu panjang harap mengurangi',
            'silabus.required' => 'Informasi Materi harus diisi',
            'silabus.max' => 'Informasi terlalu panjang harap menguranginya',
            'file.mimes' => 'Materi hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx'
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filesilabus/', $filename);
            $validateData['file'] = $filename;
            $validateData['english'] = 'true';
        }

        $englishs->nama_materi = $validateData['nama_materi'];
        $englishs->silabus = $validateData['silabus'];
        $englishs->kelas = $validateData['kelas'];
        if (isset($validateData['file'])) {
            $englishs->file = $validateData['file'];
        }

        $englishs->save();

        return redirect('indexsilabus')->with('Materi berhasil diperbaharui!');
    }

    public function deleteenglish($id)
    {
        $dataenglish = Silabus::find($id);
        $dataenglish->delete();
        return redirect('indexsilabus')->with('Materi berhasil dihapus!');
    }
    // Akhir Controller Silabus Bahasa Inggris

    // Controller Silabus Matematika
    public function indexmtk()
    {
        $mtksilabus = Silabus::select('nama_materi', 'silabus', 'file', 'id', 'mtk', 'kelas')
            ->where('mtk', 'true')
            ->get();
        return view('pages.Silabus.isimtk', compact('mtksilabus'));
    }

    public function addmtk()
    {
        return view('pages.Silabus.silabusmtk');
    }

    public function create_mtk(Request $request)
    {
        $validateData = $request->validate([
            'nama_materi' => 'required|max:255',
            'silabus' => 'required|max:255',
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
            'kelas' => 'required',
            'mtk',
        ], [
            'nama_materi.required' => 'Judul Materi harus diisi',
            'nama_materi.max' => 'Judul Materi terlalu panjang harap mengurangi',
            'silabus.required' => 'Informasi Materi harus diisi',
            'silabus.max' => 'Informasi terlalu panjang harap menguranginya',
            'file.required' => 'Materi harus diisi',
            'file.mimes' => 'Materi hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx',
            'kelas.required' => 'Kelas Siswa Harus Diisi',
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filesilabus/', $filename);
            $validateData['file'] = $filename;
            $validateData['mtk'] = 'true';
        }

        $mtksilabus = Silabus::create($validateData);

        return redirect('indexsilabus')->with('Materi berhasil ditambahkan');
    }

    public function editmtk($id)
    {
        $mtks = Silabus::find($id);
        return view('pages.Silabus.editmtk', compact('mtks'));
    }

    public function updatemtk(Request $request, $id)
    {
        $mtks = Silabus::find($id);

        $validateData = $request->validate([
            'nama_materi' => 'required|max:255',
            'silabus' => 'required|max:255',
            'file' => 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
            'kelas' => '',
            'mtk',
        ], [
            'nama_materi.required' => 'Judul Materi harus diisi',
            'nama_materi.max' => 'Judul Materi terlalu panjang harap mengurangi',
            'silabus.required' => 'Informasi Materi harus diisi',
            'silabus.max' => 'Informasi terlalu panjang harap menguranginya',
            'file.mimes' => 'Materi hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx'
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filesilabus/', $filename);
            $validateData['file'] = $filename;
            $validateData['mtk'] = 'true';
        }

        $mtks->nama_materi = $validateData['nama_materi'];
        $mtks->silabus = $validateData['silabus'];
        $mtks->kelas = $validateData['kelas'];
        if (isset($validateData['file'])) {
            $mtks->file = $validateData['file'];
        }

        $mtks->save();

        return redirect('indexsilabus')->with('Materi berhasil diperbaharui!');
    }


    public function deletemtk($id)
    {
        $datamtk = Silabus::find($id);
        $datamtk->delete();
        return redirect('indexsilabus')->with('Materi berhasil dihapus!');
    }
    // Akhir Controller Silabus Matematika

    // Controller Silabus Penjas
    public function indexpenjas()
    {
        $penjassilabus = Silabus::select('nama_materi', 'silabus', 'file', 'id', 'penjas', 'kelas')
            ->where('penjas', 'true')
            ->get();
        return view('pages.Silabus.isipenjas', compact('penjassilabus'));
    }

    public function addpenjas()
    {
        return view('pages.Silabus.silabuspenjas');
    }

    public function create_penjas(Request $request)
    {
        $validateData = $request->validate([
            'nama_materi' => 'required|max:255',
            'silabus' => 'required|max:255',
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
            'kelas' => 'required',
            'penjas',
        ], [
            'nama_materi.required' => 'Judul Materi harus diisi',
            'nama_materi.max' => 'Judul Materi terlalu panjang harap mengurangi',
            'silabus.required' => 'Informasi Materi harus diisi',
            'silabus.max' => 'Informasi terlalu panjang harap menguranginya',
            'file.required' => 'Materi harus diisi',
            'file.mimes' => 'Materi hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx',
            'kelas.required' => 'Kelas Siswa Harus Diisi',
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filesilabus/', $filename);
            $validateData['file'] = $filename;
            $validateData['penjas'] = 'true';
        }

        $penjassilabus = Silabus::create($validateData);

        return redirect('indexsilabus')->with('Materi berhasil ditambahkan');
    }

    public function editpenjas($id)
    {
        $penjass = Silabus::find($id);
        return view('pages.Silabus.editpenjas', compact('penjass'));
    }

    public function updatepenjas(Request $request, $id)
    {
        $penjas = Silabus::find($id);

        $validateData = $request->validate([
            'nama_materi' => 'required|max:255',
            'silabus' => 'required|max:255',
            'file' => 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
            'kelas' => '',
            'penjas',
        ], [
            'nama_materi.required' => 'Judul Materi harus diisi',
            'nama_materi.max' => 'Judul Materi terlalu panjang harap mengurangi',
            'silabus.required' => 'Informasi Materi harus diisi',
            'silabus.max' => 'Informasi terlalu panjang harap menguranginya',
            'file.mimes' => 'Materi hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx'
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filesilabus/', $filename);
            $validateData['file'] = $filename;
        }

        $penjas->nama_materi = $validateData['nama_materi'];
        $penjas->silabus = $validateData['silabus'];
        $penjas->kelas = $validateData['kelas'];
        if (isset($validateData['file'])) {
            $penjas->file = $validateData['file'];
        }

        $penjas->save();

        return redirect('indexsilabus')->with('Materi berhasil diperbaharui!');
    }

    public function deletepenjas($id)
    {
        $datapenjas = Silabus::find($id);
        $datapenjas->delete();
        return redirect('indexsilabus')->with('Materi berhasil dihapus!');
    }
    // Akhir Controller Silabus Penjas
}
