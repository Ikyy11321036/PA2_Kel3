<?php

namespace App\Http\Controllers;

use App\Models\Raport;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use PDF;
use Illuminate\Support\Facades\Redis;

class RaportController extends Controller
{
    // Raport 1
    public function index()
    {
        $raport = Raport::select('username', 'kelas', 'tugas', 'ujian', 'kkm', 'kkm', 'uts', 'uas', 'jumlah_nilai', 'kelas', 'id', 'kelas_1',)
        ->where('kelas_1', 'true')
        ->get();

        return view('pages.Raport.raport', compact('raport'));
    }

    public function tambah1()
    {
        $kelas1Users = User::where('kelas', 'Kelas 1')->get(['username']);
        $kelas1 = User::where('kelas', 'Kelas 1')->get();
        return view('pages.Raport.tambah1', compact('kelas1Users', 'kelas1'));
    }

    public function store1(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|unique:nilai,username',
            'kelas' => 'required',
            'tugas' => 'required|numeric',
            'ujian' => 'required|numeric',
            'kkm' => 'required|numeric',
            'uts' => 'required|numeric',
            'uas' => 'required|numeric',
            'jumlah_nilai' => 'required|numeric',
            'kelas_1',
            'grade',
        ]);

        $validateData['kelas_1'] = 'true';

        $raport = Raport::create($validateData);

        return redirect('raport')->with('Silabus berhasil ditambahkan');
    }

    public function edit1($id)
    {
        $edit1 = Raport::find($id);
        return view('pages.Raport.edit', compact('edit1'));
    }

    public function update1(Request $request, $id)
    {
        $request->validate([
            'tugas' => 'required|numeric',
            'ujian' => 'required|numeric',
            'kkm' => 'required|numeric',
            'uts' => 'required|numeric',
            'uas' => 'required|numeric',
            'jumlah_nilai' => 'required|numeric',
            'grade',
        ]);

        $edit1 = Raport::find($id);
        $edit1->tugas = $request->input('tugas');
        $edit1->ujian = $request->input('ujian');
        $edit1->jumlah_nilai = $request->input('jumlah_nilai');
        $edit1->kkm = $request->input('kkm');
        $edit1->uts = $request->input('uts');
        $edit1->uas = $request->input('uas');

        $edit1->save();

        return redirect('raport')->with('success', 'Raport Berhasil Diupdate!');
    }

    public function deleteraport1($id)
    {
        $raport1 = Raport::findorFail($id);
        $raport1->delete();
        return redirect('raport')->with('success', 'Data Berhasil Dihapus!');
    }

    public function exportpdf()
    {
        $data1 = Raport::select('username', 'kelas', 'tugas', 'ujian', 'kkm', 'kkm', 'uts', 'uas', 'jumlah_nilai', 'kelas', 'id', 'kelas_1',)
        ->where('kelas_1', 'true')
        ->get();

        view()->share('data1', $data1);
        $pdf = FacadePdf::loadview('pages.Raport.Raportkelas1-pdf');
        return $pdf->download('Raport Siswa Kelas 1.pdf');
    }

    // Akhir Raport 1

    // Raport 2
    public function index2()
    {
        $raport2 = Raport::select('username', 'kelas', 'tugas', 'ujian', 'kkm', 'kkm', 'uts', 'uas', 'jumlah_nilai', 'kelas', 'id', 'kelas_2',)
        ->where('kelas_2', 'true')
        ->get();

        return view('pages.Raport.raport2', compact('raport2'));
    }

    public function tambah2()
    {
        $kelas2Users = User::where('kelas', 'Kelas 2')->get(['username']);
        $kelas2 = User::where('kelas', 'Kelas 2')->get();
        return view('pages.Raport.tambah2', compact('kelas2Users', 'kelas2'));
    }

    public function store2(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|unique:nilai,username',
            'kelas' => 'required',
            'tugas' => 'required|numeric',
            'ujian' => 'required|numeric',
            'kkm' => 'required|numeric',
            'uts' => 'required|numeric',
            'uas' => 'required|numeric',
            'jumlah_nilai' => 'required|numeric',
            'kelas_2',
            'grade',
        ]);

        $validateData['kelas_2'] = 'true';

        $raport = Raport::create($validateData);

        return redirect('raport2')->with('Silabus berhasil ditambahkan');
    }

    public function edit2($id)
    {
        $edit2 = Raport::find($id);
        return view('pages.Raport.edit2', compact('edit2'));
    }

    public function update2(Request $request, $id)
    {
        $request->validate([
            'tugas' => 'required|numeric',
            'ujian' => 'required|numeric',
            'kkm' => 'required|numeric',
            'uts' => 'required|numeric',
            'uas' => 'required|numeric',
            'jumlah_nilai' => 'required|numeric',
            'grade',
        ]);

        $edit2 = Raport::find($id);
        $edit2->tugas = $request->input('tugas');
        $edit2->ujian = $request->input('ujian');
        $edit2->jumlah_nilai = $request->input('jumlah_nilai');
        $edit2->kkm = $request->input('kkm');
        $edit2->uts = $request->input('uts');
        $edit2->uas = $request->input('uas');

        $edit2->save();

        return redirect('raport2')->with('success', 'Raport Berhasil Diupdate!');
    }

    public function deleteraport2($id)
    {
        $raport2 = Raport::findorFail($id);
        $raport2->delete();
        return redirect('raport2')->with('success', 'Data Berhasil Dihapus!');
    }

    public function exportpdf2()
    {
        $data2 = Raport::select('username', 'kelas', 'tugas', 'ujian', 'kkm', 'kkm', 'uts', 'uas', 'jumlah_nilai', 'kelas', 'id', 'kelas_2',)
        ->where('kelas_2', 'true')
        ->get();

        view()->share('data2', $data2);
        $pdf = FacadePdf::loadview('pages.Raport.Raportkelas2-pdf');
        return $pdf->download('Raport Siswa Kelas 2.pdf');
    }

    // Akhir Raport 2

    // Raport 3
    public function index3()
    {
        $raport3 = Raport::select('username', 'kelas', 'tugas', 'ujian', 'kkm', 'kkm', 'uts', 'uas', 'jumlah_nilai', 'kelas', 'id', 'kelas_3',)
        ->where('kelas_3', 'true')
        ->get();

        return view('pages.Raport.raport3', compact('raport3'));
    }

    public function tambah3()
    {
        $kelas3Users = User::where('kelas', 'Kelas 3')->get(['username']);
        $kelas3 = User::where('kelas', 'Kelas 3')->get();
        return view('pages.Raport.tambah3', compact('kelas3Users', 'kelas3'));
    }

    public function store3(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|unique:nilai,username',
            'kelas' => 'required',
            'tugas' => 'required|numeric',
            'ujian' => 'required|numeric',
            'kkm' => 'required|numeric',
            'uts' => 'required|numeric',
            'uas' => 'required|numeric',
            'jumlah_nilai' => 'required|numeric',
            'kelas_3',
            'grade',
        ]);

        $validateData['kelas_3'] = 'true';

        $raport = Raport::create($validateData);

        return redirect('raport3')->with('Silabus berhasil ditambahkan');
    }

    public function edit3($id)
    {
        $edit3 = Raport::find($id);
        return view('pages.Raport.edit3', compact('edit3'));
    }

    public function update3(Request $request, $id)
    {
        $request->validate([
            'tugas' => 'required|numeric',
            'ujian' => 'required|numeric',
            'kkm' => 'required|numeric',
            'uts' => 'required|numeric',
            'uas' => 'required|numeric',
            'jumlah_nilai' => 'required|numeric',
            'grade',
        ]);

        $edit3 = Raport::find($id);
        $edit3->tugas = $request->input('tugas');
        $edit3->ujian = $request->input('ujian');
        $edit3->jumlah_nilai = $request->input('jumlah_nilai');
        $edit3->kkm = $request->input('kkm');
        $edit3->uts = $request->input('uts');
        $edit3->uas = $request->input('uas');

        $edit3->save();

        return redirect('raport3')->with('success', 'Raport Berhasil Diupdate!');
    }

    public function deleteraport3($id)
    {
        $raport3 = Raport::findorFail($id);
        $raport3->delete();
        return redirect('raport3')->with('success', 'Data Berhasil Dihapus!');
    }

    public function exportpdf3()
    {
        $data3 = Raport::select('username', 'kelas', 'tugas', 'ujian', 'kkm', 'kkm', 'uts', 'uas', 'jumlah_nilai', 'kelas', 'id', 'kelas_3',)
        ->where('kelas_3', 'true')
        ->get();

        view()->share('data3', $data3);
        $pdf = FacadePdf::loadview('pages.Raport.Raportkelas3-pdf');
        return $pdf->download('Raport Siswa Kelas 3.pdf');
    }

    // Akhir Raport 3

    // Raport 4
    public function index4()
    {
        $raport4 = Raport::select('username', 'kelas', 'tugas', 'ujian', 'kkm', 'kkm', 'uts', 'uas', 'jumlah_nilai', 'kelas', 'id', 'kelas_4',)
        ->where('kelas_4', 'true')
        ->get();

        return view('pages.Raport.raport4', compact('raport4'));
    }

    public function tambah4()
    {
        $kelas4Users = User::where('kelas', 'Kelas 4')->get(['username']);
        $kelas4 = User::where('kelas', 'Kelas 4')->get();
        return view('pages.Raport.tambah4', compact('kelas4Users', 'kelas4'));
    }

    public function store4(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|unique:nilai,username',
            'kelas' => 'required',
            'tugas' => 'required|numeric',
            'ujian' => 'required|numeric',
            'kkm' => 'required|numeric',
            'uts' => 'required|numeric',
            'uas' => 'required|numeric',
            'jumlah_nilai' => 'required|numeric',
            'kelas_4',
            'grade',
        ]);

        $validateData['kelas_4'] = 'true';

        $raport = Raport::create($validateData);

        return redirect('raport4')->with('Silabus berhasil ditambahkan');
    }

    public function edit4($id)
    {
        $edit4 = Raport::find($id);
        return view('pages.Raport.edit4', compact('edit4'));
    }

    public function update4(Request $request, $id)
    {
        $request->validate([
            'tugas' => 'required|numeric',
            'ujian' => 'required|numeric',
            'kkm' => 'required|numeric',
            'uts' => 'required|numeric',
            'uas' => 'required|numeric',
            'jumlah_nilai' => 'required|numeric',
            'grade',
        ]);

        $edit4 = Raport::find($id);
        $edit4->tugas = $request->input('tugas');
        $edit4->ujian = $request->input('ujian');
        $edit4->jumlah_nilai = $request->input('jumlah_nilai');
        $edit4->kkm = $request->input('kkm');
        $edit4->uts = $request->input('uts');
        $edit4->uas = $request->input('uas');

        $edit4->save();

        return redirect('raport4')->with('success', 'Raport Berhasil Diupdate!');
    }

    public function deleteraport4($id)
    {
        $raport4 = Raport::findorFail($id);
        $raport4->delete();
        return redirect('raport4')->with('success', 'Data Berhasil Dihapus!');
    }

    public function exportpdf4()
    {
        $data4 = Raport::select('username', 'kelas', 'tugas', 'ujian', 'kkm', 'kkm', 'uts', 'uas', 'jumlah_nilai', 'kelas', 'id', 'kelas_4',)
        ->where('kelas_4', 'true')
        ->get();

        view()->share('data4', $data4);
        $pdf = FacadePdf::loadview('pages.Raport.Raportkelas4-pdf');
        return $pdf->download('Raport Siswa Kelas 4.pdf');
    }

    // Akhir Raport 4

    // Raport 5
    public function index5()
    {
        $raport5 = Raport::select('username', 'kelas', 'tugas', 'ujian', 'kkm', 'kkm', 'uts', 'uas', 'jumlah_nilai', 'kelas', 'id', 'kelas_5',)
        ->where('kelas_5', 'true')
        ->get();

        return view('pages.Raport.raport5', compact('raport5'));
    }

    public function tambah5()
    {
        $kelas5Users = User::where('kelas', 'Kelas 5')->get(['username']);
        $kelas5 = User::where('kelas', 'Kelas 5')->get();
        return view('pages.Raport.tambah5', compact('kelas5Users', 'kelas5'));
    }

    public function store5(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|unique:nilai,username',
            'kelas' => 'required',
            'tugas' => 'required|numeric',
            'ujian' => 'required|numeric',
            'kkm' => 'required|numeric',
            'uts' => 'required|numeric',
            'uas' => 'required|numeric',
            'jumlah_nilai' => 'required|numeric',
            'kelas_5',
            'grade',
        ]);

        $validateData['kelas_5'] = 'true';

        $raport = Raport::create($validateData);

        return redirect('raport5')->with('Silabus berhasil ditambahkan');
    }

    public function edit5($id)
    {
        $edit5 = Raport::find($id);
        return view('pages.Raport.edit5', compact('edit5'));
    }

    public function update5(Request $request, $id)
    {
        $request->validate([
            'tugas' => 'required|numeric',
            'ujian' => 'required|numeric',
            'kkm' => 'required|numeric',
            'uts' => 'required|numeric',
            'uas' => 'required|numeric',
            'jumlah_nilai' => 'required|numeric',
            'grade',
        ]);

        $edit5 = Raport::find($id);
        $edit5->tugas = $request->input('tugas');
        $edit5->ujian = $request->input('ujian');
        $edit5->jumlah_nilai = $request->input('jumlah_nilai');
        $edit5->kkm = $request->input('kkm');
        $edit5->uts = $request->input('uts');
        $edit5->uas = $request->input('uas');

        $edit5->save();

        return redirect('raport5')->with('success', 'Raport Berhasil Diupdate!');
    }

    public function deleteraport5($id)
    {
        $raport5 = Raport::findorFail($id);
        $raport5->delete();
        return redirect('raport5')->with('success', 'Data Berhasil Dihapus!');
    }

    public function exportpdf5()
    {
        $data5 = Raport::select('username', 'kelas', 'tugas', 'ujian', 'kkm', 'kkm', 'uts', 'uas', 'jumlah_nilai', 'kelas', 'id', 'kelas_5',)
        ->where('kelas_5', 'true')
        ->get();

        view()->share('data5', $data5);
        $pdf = FacadePdf::loadview('pages.Raport.Raportkelas5-pdf');
        return $pdf->download('Raport Siswa Kelas 5.pdf');
    }

    // Akhir Raport 5

    // Raport 6
    public function index6()
    {
        $raport6 = Raport::select('username', 'kelas', 'tugas', 'ujian', 'kkm', 'kkm', 'uts', 'uas', 'jumlah_nilai', 'kelas', 'id', 'kelas_6',)
        ->where('kelas_6', 'true')
        ->get();

        return view('pages.Raport.raport6', compact('raport6'));
    }

    public function tambah6()
    {
        $kelas6Users = User::where('kelas', 'Kelas 6')->get(['username']);
        $kelas6 = User::where('kelas', 'Kelas 6')->get();
        return view('pages.Raport.tambah6', compact('kelas6Users', 'kelas6'));
    }

    public function store6(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|unique:nilai,username',
            'kelas' => 'required',
            'tugas' => 'required|numeric',
            'ujian' => 'required|numeric',
            'kkm' => 'required|numeric',
            'uts' => 'required|numeric',
            'uas' => 'required|numeric',
            'jumlah_nilai' => 'required|numeric',
            'kelas_6',
            'grade',
        ]);

        $validateData['kelas_6'] = 'true';

        $raport = Raport::create($validateData);

        return redirect('raport6')->with('Silabus berhasil ditambahkan');
    }

    public function edit6($id)
    {
        $edit6 = Raport::find($id);
        return view('pages.Raport.edit6', compact('edit6'));
    }

    public function update6(Request $request, $id)
    {
        $request->validate([
            'tugas' => 'required|numeric',
            'ujian' => 'required|numeric',
            'kkm' => 'required|numeric',
            'uts' => 'required|numeric',
            'uas' => 'required|numeric',
            'jumlah_nilai' => 'required|numeric',
            'grade',
        ]);

        $edit6 = Raport::find($id);
        $edit6->tugas = $request->input('tugas');
        $edit6->ujian = $request->input('ujian');
        $edit6->jumlah_nilai = $request->input('jumlah_nilai');
        $edit6->kkm = $request->input('kkm');
        $edit6->uts = $request->input('uts');
        $edit6->uas = $request->input('uas');

        $edit6->save();

        return redirect('raport6')->with('success', 'Raport Berhasil Diupdate!');
    }

    public function deleteraport6($id)
    {
        $raport6 = Raport::findorFail($id);
        $raport6->delete();
        return redirect('raport6')->with('success', 'Data Berhasil Dihapus!');
    }

    public function exportpdf6()
    {
        $data6 = Raport::select('username', 'kelas', 'tugas', 'ujian', 'kkm', 'kkm', 'uts', 'uas', 'jumlah_nilai', 'kelas', 'id', 'kelas_6',)
        ->where('kelas_6', 'true')
        ->get();

        view()->share('data6', $data6);
        $pdf = FacadePdf::loadview('pages.Raport.Raportkelas6-pdf');
        return $pdf->download('Raport Siswa Kelas 6.pdf');
    }

    // Akhir Raport 6
}
