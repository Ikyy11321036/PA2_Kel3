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
        $agamasilabus = Silabus::select('nama_materi', 'silabus', 'file', 'id', 'agama')
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
            'agama',
        ], [
            'nama_materi.required' => 'Judul Silabus harus diisi',
            'nama_materi.max' => 'Judul Silabus terlalu panjang harap mengurangi',
            'silabus.required' => 'Informasi silabus harus diisi',
            'silabus.max' => 'Informasi terlalu panjang harap menguranginya',
            'file.required' => 'Silabus harus diisi',
            'file.mimes' => 'Silabus hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx'
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filesilabus/', $filename);
            $validateData['file'] = $filename;
            $validateData['agama'] = 'true';
        }

        $agamasilabus = Silabus::create($validateData);

        return redirect('indexsilabus')->with('Silabus berhasil ditambahkan');
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
        ], [
            'nama_materi.max' => 'Judul Silabus terlalu panjang harap mengurangi',
            'silabus.max' => 'Informasi terlalu panjang harap menguranginya',
            'file.mimes' => 'Silabus hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx'
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filesilabus/', $filename);
            $validateData['file'] = $filename;
        }

        $agamas->nama_materi = $validateData['nama_materi'];
        $agamas->silabus = $validateData['silabus'];
        if (isset($validateData['file'])) {
            $agamas->file = $validateData['file'];
        }

        $agamas->save();

        return redirect('indexsilabus')->with('Data berhasil diperbaharui!');
    }

    public function delete($id)
    {
        $dataagama = Silabus::find($id);
        $dataagama->delete();
        return redirect('indexsilabus')->with('Data berhasil dihapus!');
    }
    // Akhir Controller Silabus Agama

    // Controller Silabus PPKN
    public function indexppkn()
    {
        $ppknsilabus = Silabus::select('nama_materi', 'silabus', 'file', 'id', 'ppkn')
            ->where('ppkn', 'true')
            ->get();
        return view('pages.Silabus.isippkn', compact('ppknsilabus'));
    }

    public function addppkn()
    {
        return view('pages.Silabus.silabusppkn');
    }

    public function create_ppkn(Request $request)
    {
        $validateData = $request->validate([
            'nama_materi' => 'required|max:255',
            'silabus' => 'required|max:255',
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
            'ppkn',
        ], [
            'nama_materi.required' => 'Judul Silabus harus diisi',
            'nama_materi.max' => 'Judul Silabus terlalu panjang harap mengurangi',
            'silabus.required' => 'Informasi silabus harus diisi',
            'silabus.max' => 'Informasi terlalu panjang harap menguranginya',
            'file.required' => 'Silabus harus diisi',
            'file.mimes' => 'Silabus hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx'
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filesilabus/', $filename);
            $validateData['file'] = $filename;
            $validateData['ppkn'] = 'true';
        }

        $ppknsilabus = Silabus::create($validateData);

        return redirect('indexsilabus')->with('Silabus berhasil ditambahkan');
    }

    public function editppkn($id)
    {
        $ppkns = Silabus::find($id);
        return view('pages.Silabus.editppkn', compact('ppkns'));
    }

    public function updateppkn(Request $request, $id)
    {
        $ppkns = Silabus::find($id);

        $validateData = $request->validate([
            'nama_materi' => 'required|max:255',
            'silabus' => 'required|max:255',
            'file' => 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
            'ppkn',
        ], [
            'nama_materi.required' => 'Judul Silabus harus diisi',
            'nama_materi.max' => 'Judul Silabus terlalu panjang harap mengurangi',
            'silabus.required' => 'Informasi silabus harus diisi',
            'silabus.max' => 'Informasi terlalu panjang harap menguranginya',
            'file.mimes' => 'Silabus hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx'
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filesilabus/', $filename);
            $validateData['file'] = $filename;
            $validateData['ppkn'] = 'true';
        }

        $ppkns->nama_materi = $validateData['nama_materi'];
        $ppkns->silabus = $validateData['silabus'];
        if (isset($validateData['file'])) {
            $ppkns->file = $validateData['file'];
        }

        $ppkns->save();

        return redirect('indexsilabus')->with('Data berhasil diperbaharui!');
    }

    public function deleteppkn($id)
    {
        $datappkn = Silabus::find($id);
        $datappkn->delete();
        return redirect('indexsilabus')->with('Data berhasil dihapus!');
    }
    // Akhir Controller Silabus PPKN

    // Controller Silabus Bahasa Indonesia
    public function indexindo()
    {
        $indosilabus = Silabus::select('nama_materi', 'silabus', 'file', 'id', 'indo')
            ->where('indo', 'true')
            ->get();
        return view('pages.Silabus.isiindo', compact('indosilabus'));
    }

    public function addindo()
    {
        return view('pages.Silabus.silabusindo');
    }

    public function create_indo(Request $request)
    {
        $validateData = $request->validate([
            'nama_materi' => 'required|max:255',
            'silabus' => 'required|max:255',
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
            'indo',
        ], [
            'nama_materi.required' => 'Judul Silabus harus diisi',
            'nama_materi.max' => 'Judul Silabus terlalu panjang harap mengurangi',
            'silabus.required' => 'Informasi silabus harus diisi',
            'silabus.max' => 'Informasi terlalu panjang harap menguranginya',
            'file.required' => 'Silabus harus diisi',
            'file.mimes' => 'Silabus hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx'
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filesilabus/', $filename);
            $validateData['file'] = $filename;
            $validateData['indo'] = 'true';
        }

        $indosilabus = Silabus::create($validateData);

        return redirect('indexsilabus')->with('Silabus berhasil ditambahkan');
    }

    public function editindo($id)
    {
        $indos = Silabus::find($id);
        return view('pages.Silabus.editindo', compact('indos'));
    }

    public function updateindo(Request $request, $id)
    {
        $indos = Silabus::find($id);

        $validateData = $request->validate([
            'nama_materi' => 'required|max:255',
            'silabus' => 'required|max:255',
            'file' => 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
            'indo',
        ], [
            'nama_materi.required' => 'Judul Silabus harus diisi',
            'nama_materi.max' => 'Judul Silabus terlalu panjang harap mengurangi',
            'silabus.required' => 'Informasi silabus harus diisi',
            'silabus.max' => 'Informasi terlalu panjang harap menguranginya',
            'file.mimes' => 'Silabus hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx'
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filesilabus/', $filename);
            $validateData['file'] = $filename;
            $validateData['indo'] = 'true';
        }

        $indos->nama_materi = $validateData['nama_materi'];
        $indos->silabus = $validateData['silabus'];
        if (isset($validateData['file'])) {
            $indos->file = $validateData['file'];
        }

        $indos->save();

        return redirect('indexsilabus')->with('Data berhasil diperbaharui!');
    }

    public function deleteindo($id)
    {
        $dataindo = Silabus::find($id);
        $dataindo->delete();
        return redirect('indexsilabus')->with('Data berhasil dihapus!');
    }
    // Akhir Controller Silabus Bahasa Indonesia

    // Controller Silabus Matematika
    public function indexmtk()
    {
        $mtksilabus = Silabus::select('nama_materi', 'silabus', 'file', 'id', 'mtk')
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
            'mtk',
        ], [
            'nama_materi.required' => 'Judul Silabus harus diisi',
            'nama_materi.max' => 'Judul Silabus terlalu panjang harap mengurangi',
            'silabus.required' => 'Informasi silabus harus diisi',
            'silabus.max' => 'Informasi terlalu panjang harap menguranginya',
            'file.required' => 'Silabus harus diisi',
            'file.mimes' => 'Silabus hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx'
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filesilabus/', $filename);
            $validateData['file'] = $filename;
            $validateData['mtk'] = 'true';
        }

        $mtksilabus = Silabus::create($validateData);

        return redirect('indexsilabus')->with('Silabus berhasil ditambahkan');
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
            'mtk',
        ], [
            'nama_materi.required' => 'Judul Silabus harus diisi',
            'nama_materi.max' => 'Judul Silabus terlalu panjang harap mengurangi',
            'silabus.required' => 'Informasi silabus harus diisi',
            'silabus.max' => 'Informasi terlalu panjang harap menguranginya',
            'file.mimes' => 'Silabus hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx'
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filesilabus/', $filename);
            $validateData['file'] = $filename;
            $validateData['mtk'] = 'true';
        }

        $mtks->nama_materi = $validateData['nama_materi'];
        $mtks->silabus = $validateData['silabus'];
        if (isset($validateData['file'])) {
            $mtks->file = $validateData['file'];
        }

        $mtks->save();

        return redirect('indexsilabus')->with('Data berhasil diperbaharui!');
    }


    public function deletemtk($id)
    {
        $datamtk = Silabus::find($id);
        $datamtk->delete();
        return redirect('indexsilabus')->with('Data berhasil dihapus!');
    }
    // Akhir Controller Silabus Matematika

    // Controller Silabus IPA
    public function indexipa()
    {
        $ipasilabus = Silabus::select('nama_materi', 'silabus', 'file', 'id', 'ipa')
            ->where('ipa', 'true')
            ->get();
        return view('pages.Silabus.isiipa', compact('ipasilabus'));
    }

    public function addipa()
    {
        return view('pages.Silabus.silabusipa');
    }

    public function create_ipa(Request $request)
    {
        $validateData = $request->validate([
            'nama_materi' => 'required|max:255',
            'silabus' => 'required|max:255',
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
            'ipa',
        ], [
            'nama_materi.required' => 'Judul Silabus harus diisi',
            'nama_materi.max' => 'Judul Silabus terlalu panjang harap mengurangi',
            'silabus.required' => 'Informasi silabus harus diisi',
            'silabus.max' => 'Informasi terlalu panjang harap menguranginya',
            'file.required' => 'Silabus harus diisi',
            'file.mimes' => 'Silabus hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx'
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filesilabus/', $filename);
            $validateData['file'] = $filename;
            $validateData['ipa'] = 'true';
        }

        $ipasilabus = Silabus::create($validateData);

        return redirect('indexsilabus')->with('Silabus berhasil ditambahkan');
    }

    public function editipa($id)
    {
        $ipas = Silabus::find($id);
        return view('pages.Silabus.editipa', compact('ipas'));
    }

    public function updateipa(Request $request, $id)
    {
        $ipas = Silabus::find($id);

        $validateData = $request->validate([
            'nama_materi' => 'required|max:255',
            'silabus' => 'required|max:255',
            'file' => 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
            'ipa',
        ], [
            'nama_materi.required' => 'Judul Silabus harus diisi',
            'nama_materi.max' => 'Judul Silabus terlalu panjang harap mengurangi',
            'silabus.required' => 'Informasi silabus harus diisi',
            'silabus.max' => 'Informasi terlalu panjang harap menguranginya',
            'file.mimes' => 'Silabus hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx'
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filesilabus/', $filename);
            $validateData['file'] = $filename;
            $validateData['ipa'] = 'true';
        }

        $ipas->nama_materi = $validateData['nama_materi'];
        $ipas->silabus = $validateData['silabus'];
        if (isset($validateData['file'])) {
            $ipas->file = $validateData['file'];
        }

        $ipas->save();

        return redirect('indexsilabus')->with('Data berhasil diperbaharui!');
    }

    public function deleteipa($id)
    {
        $dataipa = Silabus::find($id);
        $dataipa->delete();
        return redirect('indexsilabus')->with('Data berhasil dihapus!');
    }
    // Akhir Controller Silabus IPA

    // Controller Silabus IPS
    public function indexips()
    {
        $ipssilabus = Silabus::select('nama_materi', 'silabus', 'file', 'id', 'ips')
            ->where('ips', 'true')
            ->get();
        return view('pages.Silabus.isiips', compact('ipssilabus'));
    }

    public function addips()
    {
        return view('pages.Silabus.silabusips');
    }

    public function create_ips(Request $request)
    {
        $validateData = $request->validate([
            'nama_materi' => 'required|max:255',
            'silabus' => 'required|max:255',
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
            'ips',
        ], [
            'nama_materi.required' => 'Judul Silabus harus diisi',
            'nama_materi.max' => 'Judul Silabus terlalu panjang harap mengurangi',
            'silabus.required' => 'Informasi silabus harus diisi',
            'silabus.max' => 'Informasi terlalu panjang harap menguranginya',
            'file.required' => 'Silabus harus diisi',
            'file.mimes' => 'Silabus hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx'
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filesilabus/', $filename);
            $validateData['file'] = $filename;
            $validateData['ips'] = 'true';
        }

        $ipssilabus = Silabus::create($validateData);

        return redirect('indexsilabus')->with('Silabus berhasil ditambahkan');
    }

    public function editips($id)
    {
        $ipss = Silabus::find($id);
        return view('pages.Silabus.editips', compact('ipss'));
    }

    public function updateips(Request $request, $id)
    {
        $ipss = Silabus::find($id);

        $validateData = $request->validate([
            'nama_materi' => 'required|max:255',
            'silabus' => 'required|max:255',
            'file' => 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
            'ips',
        ], [
            'nama_materi.required' => 'Judul Silabus harus diisi',
            'nama_materi.max' => 'Judul Silabus terlalu panjang harap mengurangi',
            'silabus.required' => 'Informasi silabus harus diisi',
            'silabus.max' => 'Informasi terlalu panjang harap menguranginya',
            'file.mimes' => 'Silabus hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx'
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filesilabus/', $filename);
            $validateData['file'] = $filename;
        }

        $ipss->nama_materi = $validateData['nama_materi'];
        $ipss->silabus = $validateData['silabus'];
        if (isset($validateData['file'])) {
            $ipss->file = $validateData['file'];
        }

        $ipss->save();

        return redirect('indexsilabus')->with('Data berhasil diperbaharui!');
    }

    public function deleteips($id)
    {
        $dataips = Silabus::find($id);
        $dataips->delete();
        return redirect('indexsilabus')->with('Data berhasil dihapus!');
    }
    // Akhir Controller Silabus IPS

    // Controller Silabus SBK
    public function indexsbk()
    {
        $sbksilabus = Silabus::select('nama_materi', 'silabus', 'file', 'id', 'sbk')
            ->where('sbk', 'true')
            ->get();
        return view('pages.Silabus.isisbk', compact('sbksilabus'));
    }

    public function addsbk()
    {
        return view('pages.Silabus.silabussbk');
    }

    public function create_sbk(Request $request)
    {
        $validateData = $request->validate([
            'nama_materi' => 'required|max:255',
            'silabus' => 'required|max:255',
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
            'sbk',
        ], [
            'nama_materi.required' => 'Judul Silabus harus diisi',
            'nama_materi.max' => 'Judul Silabus terlalu panjang harap mengurangi',
            'silabus.required' => 'Informasi silabus harus diisi',
            'silabus.max' => 'Informasi terlalu panjang harap menguranginya',
            'file.required' => 'Silabus harus diisi',
            'file.mimes' => 'Silabus hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx'
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filesilabus/', $filename);
            $validateData['file'] = $filename;
            $validateData['sbk'] = 'true';
        }

        $sbksilabus = Silabus::create($validateData);

        return redirect('indexsilabus')->with('Silabus berhasil ditambahkan');
    }

    public function editsbk($id)
    {
        $sbks = Silabus::find($id);
        return view('pages.Silabus.editsbk', compact('sbks'));
    }

    public function updatesbk(Request $request, $id)
    {
        $sbks = Silabus::find($id);

        $validateData = $request->validate([
            'nama_materi' => 'required|max:255',
            'silabus' => 'required|max:255',
            'file' => 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
            'sbk',
        ], [
            'nama_materi.required' => 'Judul Silabus harus diisi',
            'nama_materi.max' => 'Judul Silabus terlalu panjang harap mengurangi',
            'silabus.required' => 'Informasi silabus harus diisi',
            'silabus.max' => 'Informasi terlalu panjang harap menguranginya',
            'file.mimes' => 'Silabus hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx'
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filesilabus/', $filename);
            $validateData['file'] = $filename;
        }

        $sbks->nama_materi = $validateData['nama_materi'];
        $sbks->silabus = $validateData['silabus'];
        if (isset($validateData['file'])) {
            $sbks->file = $validateData['file'];
        }

        $sbks->save();

        return redirect('indexsilabus')->with('Data berhasil diperbaharui!');
    }

    public function deletesbk($id)
    {
        $datasbk = Silabus::find($id);
        $datasbk->delete();
        return redirect('indexsilabus')->with('Data berhasil dihapus!');
    }
    // Akhir Controller Silabus SBK

    // Controller Silabus Penjas
    public function indexpenjas()
    {
        $penjassilabus = Silabus::select('nama_materi', 'silabus', 'file', 'id', 'penjas')
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
            'penjas',
        ], [
            'nama_materi.required' => 'Judul Silabus harus diisi',
            'nama_materi.max' => 'Judul Silabus terlalu panjang harap mengurangi',
            'silabus.required' => 'Informasi silabus harus diisi',
            'silabus.max' => 'Informasi terlalu panjang harap menguranginya',
            'file.required' => 'Silabus harus diisi',
            'file.mimes' => 'Silabus hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx'
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filesilabus/', $filename);
            $validateData['file'] = $filename;
            $validateData['penjas'] = 'true';
        }

        $penjassilabus = Silabus::create($validateData);

        return redirect('indexsilabus')->with('Silabus berhasil ditambahkan');
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
            'penjas',
        ], [
            'nama_materi.required' => 'Judul Silabus harus diisi',
            'nama_materi.max' => 'Judul Silabus terlalu panjang harap mengurangi',
            'silabus.required' => 'Informasi silabus harus diisi',
            'silabus.max' => 'Informasi terlalu panjang harap menguranginya',
            'file.mimes' => 'Silabus hanya menerima pdf,doc,docx,xls,xlsx,ppt,pptx'
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('filesilabus/', $filename);
            $validateData['file'] = $filename;
        }

        $penjas->nama_materi = $validateData['nama_materi'];
        $penjas->silabus = $validateData['silabus'];
        if (isset($validateData['file'])) {
            $penjas->file = $validateData['file'];
        }

        $penjas->save();

        return redirect('indexsilabus')->with('Data berhasil diperbaharui!');
    }

    public function deletepenjas($id)
    {
        $datapenjas = Silabus::find($id);
        $datapenjas->delete();
        return redirect('indexsilabus')->with('Data berhasil dihapus!');
    }
    // Akhir Controller Silabus Penjas
}
