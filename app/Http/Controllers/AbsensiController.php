<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use PDF;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function indexabsen()
    {
        $data = Siswa::all();
        return view('pages.Absensi.indexabsen', compact('data'));
    }

    public function create()
    {
        return view('pages.Absensi.create');
    }

    public function insert(Request $request)
    {
        $absens = Siswa::create($request->all());
        return redirect('absensisiswa')->with('success', 'Data Berhasil Ditambah');
    }

    public function edit($id)
    {
        $absens = Siswa::find($id);
        return view('pages.Absensi.edittambah', compact('absens'));
    }

    public function update(Request $request, $id)
    {
        $absens = Siswa::find($id);

        $validateData = $request->validate([
            'name' => 'string|max:255',
            'absensi' => 'required|in:Hadir,Izin,Alpha,Sakit',
            'keterangan' => 'required',
            'date' => 'required|date|date_format:Y-m-d',
        ], [
            'name.string' => 'Nama hanya dapat berupa huruf saja',
            'name.max' => 'Nama terlalu panjang',
            'absensi.required' => 'Harap mengisi absensi berikut',
            'keterangan.required' => 'Keterangan harus diisi',
            'date.required' => 'Tanggal harus diisi',
        ]);

        $absens->name = $validateData['name'];
        $absens->absensi = $validateData['absensi'];
        $absens->keterangan = $validateData['keterangan'];
        $absens->date = $validateData['date'];
        
        $absens->save();

        return redirect('absensisiswa')->with('success', 'Data Berhasil Ditambah');
    }

    public function submitDate(Request $request)
    {
        $selectedDate = $request->input('selected_date');
        return view('pages.Absensi.indexabsen', ['selectedDate' => $selectedDate], compact('selectedDate'));
    }


    public function remove($id)
    {
        $dataabsen = Siswa::find($id);
        $dataabsen->delete();
        return redirect('absensisiswa')->with('success', 'Data Berhasil Dihapus!');
    }

    public function exportpdfabsen()
    {
        $data = Siswa::all();

        view()->share('data', $data);
        $pdf = FacadePdf::loadview('pages.Absensi.absensiswa-pdf');
        return $pdf->download('Absensi Siswa.pdf');
    }
}
