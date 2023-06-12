<?php

namespace App\Http\Controllers;

use App\Models\Jadwalmapel;
use App\Models\MataPelajaran;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use PDF;
use Illuminate\Support\Facades\Redis;

class JadwalmapelController extends Controller
{
    // Jadwal Untuk Kelas 1
    public function index()
    {
        $data = Jadwalmapel::select('senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'waktu_pelajaran', 'id', 'kelas_1')
        ->where('kelas_1', 'true')
        ->get();
        return view('pages.Jadwal.jadwalmapel', compact('data'));
    }

    public function tambahkelas1()
    {
        $jadwal1 = MataPelajaran::where('tingkat_kelas', 'Kelas 1')->get(['nama_matapelajaran']);
        return view('pages.Jadwal.tambahjadwal', compact('jadwal1'));
    }

    public function insertdata1(Request $request)
    {
        $validateData = $request->validate([
            'senin' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'selasa' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'rabu' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'kamis' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'jumat' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'sabtu' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'waktu_pelajaran' => 'required',
            'kelas_1',
        ], [
            'senin.required' => 'Kolom Senin harus diisi',
            'senin.max' => 'Kolom Senin tidak boleh lebih dari :max karakter',
            'senin.regex' => 'Kolom Senin hanya boleh diisi dengan huruf dan spasi',
            'selasa.required' => 'Kolom Selasa harus diisi',
            'selasa.max' => 'Kolom Selasa tidak boleh lebih dari :max karakter',
            'selasa.regex' => 'Kolom Selasa hanya boleh diisi dengan huruf dan spasi',
            'rabu.required' => 'Kolom Rabu harus diisi',
            'rabu.max' => 'Kolom Rabu tidak boleh lebih dari :max karakter',
            'rabu.regex' => 'Kolom Rabu hanya boleh diisi dengan huruf dan spasi',
            'kamis.required' => 'Kolom Kamis harus diisi',
            'kamis.max' => 'Kolom Kamis tidak boleh lebih dari :max karakter',
            'kamis.regex' => 'Kolom Kamis hanya boleh diisi dengan huruf dan spasi',
            'jumat.required' => 'Kolom Jumat harus diisi',
            'jumat.max' => 'Kolom Jumat tidak boleh lebih dari :max karakter',
            'jumat.regex' => 'Kolom Jumat hanya boleh diisi dengan huruf dan spasi',
            'sabtu.required' => 'Kolom Sabtu harus diisi',
            'sabtu.max' => 'Kolom Sabtu tidak boleh lebih dari :max karakter',
            'sabtu.regex' => 'Kolom Sabtu hanya boleh diisi dengan huruf dan spasi',
            'waktu_pelajaran.required' => 'Kolom Waktu harus diisi',
        ]);

        $validateData['kelas_1'] = 'true';

        $murid1 = Jadwalmapel::create($validateData);

        return redirect()->route('matapelajaran');
    }

    public function edit($id)
    {
        $murid1 = Jadwalmapel::find($id);
        $jadwaledit1 = MataPelajaran::where('tingkat_kelas', 'Kelas 1')->get(['nama_matapelajaran']);
        return view('pages.Jadwal.update1', compact('murid1', 'jadwaledit1'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'senin' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'selasa' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'rabu' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'kamis' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'jumat' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'sabtu' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'waktu_pelajaran' => 'required',
        ], [
            'senin.required' => 'Kolom Senin harus diisi',
            'senin.max' => 'Kolom Senin tidak boleh lebih dari :max karakter',
            'senin.regex' => 'Kolom Senin hanya boleh diisi dengan huruf dan spasi',
            'selasa.required' => 'Kolom Selasa harus diisi',
            'selasa.max' => 'Kolom Selasa tidak boleh lebih dari :max karakter',
            'selasa.regex' => 'Kolom Selasa hanya boleh diisi dengan huruf dan spasi',
            'rabu.required' => 'Kolom Rabu harus diisi',
            'rabu.max' => 'Kolom Rabu tidak boleh lebih dari :max karakter',
            'rabu.regex' => 'Kolom Rabu hanya boleh diisi dengan huruf dan spasi',
            'kamis.required' => 'Kolom Kamis harus diisi',
            'kamis.max' => 'Kolom Kamis tidak boleh lebih dari :max karakter',
            'kamis.regex' => 'Kolom Kamis hanya boleh diisi dengan huruf dan spasi',
            'jumat.required' => 'Kolom Jumat harus diisi',
            'jumat.max' => 'Kolom Jumat tidak boleh lebih dari :max karakter',
            'jumat.regex' => 'Kolom Jumat hanya boleh diisi dengan huruf dan spasi',
            'sabtu.required' => 'Kolom Sabtu harus diisi',
            'sabtu.max' => 'Kolom Sabtu tidak boleh lebih dari :max karakter',
            'sabtu.regex' => 'Kolom Sabtu hanya boleh diisi dengan huruf dan spasi',
            'waktu_pelajaran.required' => 'Kolom Waktu harus diisi',
        ]);

        $murid1 = JadwalMapel::find($id);
        $murid1->senin = $request->input('senin');
        $murid1->selasa = $request->input('selasa');
        $murid1->rabu = $request->input('rabu');
        $murid1->kamis = $request->input('kamis');
        $murid1->jumat = $request->input('jumat');
        $murid1->sabtu = $request->input('sabtu');
        $murid1->waktu_pelajaran = $request->input('waktu_pelajaran');

        $murid1->save();

        return redirect('matapelajaran')->with('success', 'Data Berhasil Diupdate!');
    }

    public function remove($id)
    {
        $data = Jadwalmapel::find($id);
        $data->delete();

        return redirect('matapelajaran')->with('success', 'Data Berhasil Dihapus!');
    }

    public function exportpdf()
    {
        $data = Jadwalmapel::select('senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'waktu_pelajaran', 'id', 'kelas_1')
        ->where('kelas_1', 'true')
        ->get();

        view()->share('data', $data);
        $pdf = FacadePdf::loadview('pages.Jadwal.Jadwalkelas1-pdf');
        return $pdf->download('Jadwal Siswa Kelas 1.pdf');
    }
    // Akhir Jadwal Untuk Kelas 1

    // Jadwal Untuk Kelas 3
    public function index3()
    {
        $data3 = Jadwalmapel::select('senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'waktu_pelajaran', 'id', 'kelas_3')
        ->where('kelas_3', 'true')
        ->get();
        return view('pages.Jadwal.jadwalmapel3', compact('data3'));
    }

    public function tambahkelas3()
    {
        $jadwal3 = MataPelajaran::where('tingkat_kelas', 'Kelas 3')->get(['nama_matapelajaran']);
        return view('pages.Jadwal.tambahjadwal3', compact('jadwal3'));
    }

    public function insertdata3(Request $request)
    {
        $validateData = $request->validate([
            'senin' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'selasa' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'rabu' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'kamis' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'jumat' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'sabtu' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'waktu_pelajaran' => 'required',
            'kelas_3',
        ], [
            'senin.required' => 'Kolom Senin harus diisi',
            'senin.max' => 'Kolom Senin tidak boleh lebih dari :max karakter',
            'senin.regex' => 'Kolom Senin hanya boleh diisi dengan huruf dan spasi',
            'selasa.required' => 'Kolom Selasa harus diisi',
            'selasa.max' => 'Kolom Selasa tidak boleh lebih dari :max karakter',
            'selasa.regex' => 'Kolom Selasa hanya boleh diisi dengan huruf dan spasi',
            'rabu.required' => 'Kolom Rabu harus diisi',
            'rabu.max' => 'Kolom Rabu tidak boleh lebih dari :max karakter',
            'rabu.regex' => 'Kolom Rabu hanya boleh diisi dengan huruf dan spasi',
            'kamis.required' => 'Kolom Kamis harus diisi',
            'kamis.max' => 'Kolom Kamis tidak boleh lebih dari :max karakter',
            'kamis.regex' => 'Kolom Kamis hanya boleh diisi dengan huruf dan spasi',
            'jumat.required' => 'Kolom Jumat harus diisi',
            'jumat.max' => 'Kolom Jumat tidak boleh lebih dari :max karakter',
            'jumat.regex' => 'Kolom Jumat hanya boleh diisi dengan huruf dan spasi',
            'sabtu.required' => 'Kolom Sabtu harus diisi',
            'sabtu.max' => 'Kolom Sabtu tidak boleh lebih dari :max karakter',
            'sabtu.regex' => 'Kolom Sabtu hanya boleh diisi dengan huruf dan spasi',
            'waktu_pelajaran.required' => 'Kolom Waktu harus diisi',
        ]);

        $validateData['kelas_3'] = 'true';

        $murid3 = Jadwalmapel::create($validateData);

        return redirect()->route('matapelajaran3');
    }

    public function edit3($id)
    {
        $murid3 = Jadwalmapel::find($id);
        $jadwaledit3 = MataPelajaran::where('tingkat_kelas', 'Kelas 3')->get(['nama_matapelajaran']);
        return view('pages.Jadwal.update3', compact('murid3', 'jadwaledit3'));
    }

    public function update3(Request $request, $id)
    {
        $validateData = $request->validate([
            'senin' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'selasa' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'rabu' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'kamis' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'jumat' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'sabtu' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'waktu_pelajaran' => 'required',
        ], [
            'senin.required' => 'Kolom Senin harus diisi',
            'senin.max' => 'Kolom Senin tidak boleh lebih dari :max karakter',
            'senin.regex' => 'Kolom Senin hanya boleh diisi dengan huruf dan spasi',
            'selasa.required' => 'Kolom Selasa harus diisi',
            'selasa.max' => 'Kolom Selasa tidak boleh lebih dari :max karakter',
            'selasa.regex' => 'Kolom Selasa hanya boleh diisi dengan huruf dan spasi',
            'rabu.required' => 'Kolom Rabu harus diisi',
            'rabu.max' => 'Kolom Rabu tidak boleh lebih dari :max karakter',
            'rabu.regex' => 'Kolom Rabu hanya boleh diisi dengan huruf dan spasi',
            'kamis.required' => 'Kolom Kamis harus diisi',
            'kamis.max' => 'Kolom Kamis tidak boleh lebih dari :max karakter',
            'kamis.regex' => 'Kolom Kamis hanya boleh diisi dengan huruf dan spasi',
            'jumat.required' => 'Kolom Jumat harus diisi',
            'jumat.max' => 'Kolom Jumat tidak boleh lebih dari :max karakter',
            'jumat.regex' => 'Kolom Jumat hanya boleh diisi dengan huruf dan spasi',
            'sabtu.required' => 'Kolom Sabtu harus diisi',
            'sabtu.max' => 'Kolom Sabtu tidak boleh lebih dari :max karakter',
            'sabtu.regex' => 'Kolom Sabtu hanya boleh diisi dengan huruf dan spasi',
            'waktu_pelajaran.required' => 'Kolom Waktu harus diisi',
        ]);

        $murid3 = JadwalMapel::find($id);
        $murid3->senin = $request->input('senin');
        $murid3->selasa = $request->input('selasa');
        $murid3->rabu = $request->input('rabu');
        $murid3->kamis = $request->input('kamis');
        $murid3->jumat = $request->input('jumat');
        $murid3->sabtu = $request->input('sabtu');
        $murid3->waktu_pelajaran = $request->input('waktu_pelajaran');

        $murid3->save();

        return redirect('matapelajaran3')->with('success', 'Data Berhasil Diupdate!');
    }

    public function remove3($id)
    {
        $data = Jadwalmapel::find($id);
        $data->delete();

        return redirect('matapelajaran3')->with('success', 'Data Berhasil Dihapus!');
    }

    public function exportpdf3()
    {
        $data3 = Jadwalmapel::select('senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'waktu_pelajaran', 'id', 'kelas_3')
        ->where('kelas_3', 'true')
        ->get();

        view()->share('data3', $data3);
        $pdf = FacadePdf::loadview('pages.Jadwal.Jadwalkelas3-pdf');
        return $pdf->download('Jadwal Siswa Kelas 3.pdf');
    }
    // Akhir Jadwal Untuk Kelas 3

    // Jadwal Untuk Kelas 2
    public function index2()
    {
        $data2 = Jadwalmapel::select('senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'waktu_pelajaran', 'id', 'kelas_2')
        ->where('kelas_2', 'true')
        ->get();
        return view('pages.Jadwal.jadwalmapel2', compact('data2'));
    }

    public function tambahkelas2()
    {
        $jadwal2 = MataPelajaran::where('tingkat_kelas', 'Kelas 2')->get(['nama_matapelajaran']);
        return view('pages.Jadwal.tambahjadwal2', compact('jadwal2'));
    }

    public function insertdata2(Request $request)
    {
        $validateData = $request->validate([
            'senin' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'selasa' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'rabu' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'kamis' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'jumat' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'sabtu' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'waktu_pelajaran' => 'required',
            'kelas_2',
        ], [
            'senin.required' => 'Kolom Senin harus diisi',
            'senin.max' => 'Kolom Senin tidak boleh lebih dari :max karakter',
            'senin.regex' => 'Kolom Senin hanya boleh diisi dengan huruf dan spasi',
            'selasa.required' => 'Kolom Selasa harus diisi',
            'selasa.max' => 'Kolom Selasa tidak boleh lebih dari :max karakter',
            'selasa.regex' => 'Kolom Selasa hanya boleh diisi dengan huruf dan spasi',
            'rabu.required' => 'Kolom Rabu harus diisi',
            'rabu.max' => 'Kolom Rabu tidak boleh lebih dari :max karakter',
            'rabu.regex' => 'Kolom Rabu hanya boleh diisi dengan huruf dan spasi',
            'kamis.required' => 'Kolom Kamis harus diisi',
            'kamis.max' => 'Kolom Kamis tidak boleh lebih dari :max karakter',
            'kamis.regex' => 'Kolom Kamis hanya boleh diisi dengan huruf dan spasi',
            'jumat.required' => 'Kolom Jumat harus diisi',
            'jumat.max' => 'Kolom Jumat tidak boleh lebih dari :max karakter',
            'jumat.regex' => 'Kolom Jumat hanya boleh diisi dengan huruf dan spasi',
            'sabtu.required' => 'Kolom Sabtu harus diisi',
            'sabtu.max' => 'Kolom Sabtu tidak boleh lebih dari :max karakter',
            'sabtu.regex' => 'Kolom Sabtu hanya boleh diisi dengan huruf dan spasi',
            'waktu_pelajaran.required' => 'Kolom Waktu harus diisi',
        ]);

        $validateData['kelas_2'] = 'true';

        $murid2 = Jadwalmapel::create($validateData);

        return redirect()->route('matapelajaran2');
    }

    public function edit2($id)
    {
        $murid2 = Jadwalmapel::find($id);
        $jadwaledit2 = MataPelajaran::where('tingkat_kelas', 'Kelas 2')->get(['nama_matapelajaran']);
        return view('pages.Jadwal.update2', compact('murid2', 'jadwaledit2'));
    }

    public function update2(Request $request, $id)
    {
        $validateData = $request->validate([
            'senin' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'selasa' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'rabu' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'kamis' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'jumat' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'sabtu' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'waktu_pelajaran' => 'required',
        ], [
            'senin.required' => 'Kolom Senin harus diisi',
            'senin.max' => 'Kolom Senin tidak boleh lebih dari :max karakter',
            'senin.regex' => 'Kolom Senin hanya boleh diisi dengan huruf dan spasi',
            'selasa.required' => 'Kolom Selasa harus diisi',
            'selasa.max' => 'Kolom Selasa tidak boleh lebih dari :max karakter',
            'selasa.regex' => 'Kolom Selasa hanya boleh diisi dengan huruf dan spasi',
            'rabu.required' => 'Kolom Rabu harus diisi',
            'rabu.max' => 'Kolom Rabu tidak boleh lebih dari :max karakter',
            'rabu.regex' => 'Kolom Rabu hanya boleh diisi dengan huruf dan spasi',
            'kamis.required' => 'Kolom Kamis harus diisi',
            'kamis.max' => 'Kolom Kamis tidak boleh lebih dari :max karakter',
            'kamis.regex' => 'Kolom Kamis hanya boleh diisi dengan huruf dan spasi',
            'jumat.required' => 'Kolom Jumat harus diisi',
            'jumat.max' => 'Kolom Jumat tidak boleh lebih dari :max karakter',
            'jumat.regex' => 'Kolom Jumat hanya boleh diisi dengan huruf dan spasi',
            'sabtu.required' => 'Kolom Sabtu harus diisi',
            'sabtu.max' => 'Kolom Sabtu tidak boleh lebih dari :max karakter',
            'sabtu.regex' => 'Kolom Sabtu hanya boleh diisi dengan huruf dan spasi',
            'waktu_pelajaran.required' => 'Kolom Waktu harus diisi',
        ]);

        $murid2 = JadwalMapel::find($id);
        $murid2->senin = $request->input('senin');
        $murid2->selasa = $request->input('selasa');
        $murid2->rabu = $request->input('rabu');
        $murid2->kamis = $request->input('kamis');
        $murid2->jumat = $request->input('jumat');
        $murid2->sabtu = $request->input('sabtu');
        $murid2->waktu_pelajaran = $request->input('waktu_pelajaran');

        $murid2->save();

        return redirect('matapelajaran2')->with('success', 'Data Berhasil Diupdate!');
    }

    public function remove2($id)
    {
        $data = Jadwalmapel::find($id);
        $data->delete();

        return redirect('matapelajaran2')->with('success', 'Data Berhasil Dihapus!');
    }

    public function exportpdf2()
    {
        $data2 = Jadwalmapel::select('senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'waktu_pelajaran', 'id', 'kelas_2')
        ->where('kelas_2', 'true')
        ->get();

        view()->share('data2', $data2);
        $pdf = FacadePdf::loadview('pages.Jadwal.Jadwalkelas2-pdf');
        return $pdf->download('Jadwal Siswa Kelas 2.pdf');
    }
    // Akhir Jadwal Untuk Kelas 2

    // Jadwal Untuk Kelas 4
    public function index4()
    {
        $data4 = Jadwalmapel::select('senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'waktu_pelajaran', 'id', 'kelas_4')
        ->where('kelas_4', 'true')
        ->get();
        return view('pages.Jadwal.jadwalmapel4', compact('data4'));
    }

    public function tambahkelas4()
    {
        $jadwal4 = MataPelajaran::where('tingkat_kelas', 'Kelas 4')->get(['nama_matapelajaran']);
        return view('pages.Jadwal.tambahjadwal4', compact('jadwal4'));
    }

    public function insertdata4(Request $request)
    {
        $validateData = $request->validate([
            'senin' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'selasa' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'rabu' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'kamis' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'jumat' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'sabtu' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'waktu_pelajaran' => 'required',
            'kelas_4',
        ], [
            'senin.required' => 'Kolom Senin harus diisi',
            'senin.max' => 'Kolom Senin tidak boleh lebih dari :max karakter',
            'senin.regex' => 'Kolom Senin hanya boleh diisi dengan huruf dan spasi',
            'selasa.required' => 'Kolom Selasa harus diisi',
            'selasa.max' => 'Kolom Selasa tidak boleh lebih dari :max karakter',
            'selasa.regex' => 'Kolom Selasa hanya boleh diisi dengan huruf dan spasi',
            'rabu.required' => 'Kolom Rabu harus diisi',
            'rabu.max' => 'Kolom Rabu tidak boleh lebih dari :max karakter',
            'rabu.regex' => 'Kolom Rabu hanya boleh diisi dengan huruf dan spasi',
            'kamis.required' => 'Kolom Kamis harus diisi',
            'kamis.max' => 'Kolom Kamis tidak boleh lebih dari :max karakter',
            'kamis.regex' => 'Kolom Kamis hanya boleh diisi dengan huruf dan spasi',
            'jumat.required' => 'Kolom Jumat harus diisi',
            'jumat.max' => 'Kolom Jumat tidak boleh lebih dari :max karakter',
            'jumat.regex' => 'Kolom Jumat hanya boleh diisi dengan huruf dan spasi',
            'sabtu.required' => 'Kolom Sabtu harus diisi',
            'sabtu.max' => 'Kolom Sabtu tidak boleh lebih dari :max karakter',
            'sabtu.regex' => 'Kolom Sabtu hanya boleh diisi dengan huruf dan spasi',
            'waktu_pelajaran.required' => 'Kolom Waktu harus diisi',
        ]);

        $validateData['kelas_4'] = 'true';

        $murid4 = Jadwalmapel::create($validateData);

        return redirect()->route('matapelajaran4');
    }

    public function edit4($id)
    {
        $murid4 = Jadwalmapel::find($id);
<<<<<<< HEAD
        $jadwaledit4 = MataPelajaran::where('tingkat_kelas', 'Kelas 4')->get(['nama_matapelajaran']);
        return view('pages.Jadwal.update4', compact('murid4', 'jadwaledit4'));
=======
        $jadwal4 = MataPelajaran::where('tingkat_kelas', 'Kelas 4')->get(['nama_matapelajaran']);
        return view('pages.Jadwal.update4', compact('murid4', 'jadwal4'));
>>>>>>> origin/master
    }

    public function update4(Request $request, $id)
    {
        $validateData = $request->validate([
            'senin' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'selasa' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'rabu' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'kamis' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'jumat' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'sabtu' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'waktu_pelajaran' => 'required',
        ], [
            'senin.required' => 'Kolom Senin harus diisi',
            'senin.max' => 'Kolom Senin tidak boleh lebih dari :max karakter',
            'senin.regex' => 'Kolom Senin hanya boleh diisi dengan huruf dan spasi',
            'selasa.required' => 'Kolom Selasa harus diisi',
            'selasa.max' => 'Kolom Selasa tidak boleh lebih dari :max karakter',
            'selasa.regex' => 'Kolom Selasa hanya boleh diisi dengan huruf dan spasi',
            'rabu.required' => 'Kolom Rabu harus diisi',
            'rabu.max' => 'Kolom Rabu tidak boleh lebih dari :max karakter',
            'rabu.regex' => 'Kolom Rabu hanya boleh diisi dengan huruf dan spasi',
            'kamis.required' => 'Kolom Kamis harus diisi',
            'kamis.max' => 'Kolom Kamis tidak boleh lebih dari :max karakter',
            'kamis.regex' => 'Kolom Kamis hanya boleh diisi dengan huruf dan spasi',
            'jumat.required' => 'Kolom Jumat harus diisi',
            'jumat.max' => 'Kolom Jumat tidak boleh lebih dari :max karakter',
            'jumat.regex' => 'Kolom Jumat hanya boleh diisi dengan huruf dan spasi',
            'sabtu.required' => 'Kolom Sabtu harus diisi',
            'sabtu.max' => 'Kolom Sabtu tidak boleh lebih dari :max karakter',
            'sabtu.regex' => 'Kolom Sabtu hanya boleh diisi dengan huruf dan spasi',
            'waktu_pelajaran.required' => 'Kolom Waktu harus diisi',
        ]);

        $murid4 = JadwalMapel::find($id);
        $murid4->senin = $request->input('senin');
        $murid4->selasa = $request->input('selasa');
        $murid4->rabu = $request->input('rabu');
        $murid4->kamis = $request->input('kamis');
        $murid4->jumat = $request->input('jumat');
        $murid4->sabtu = $request->input('sabtu');
        $murid4->waktu_pelajaran = $request->input('waktu_pelajaran');

        $murid4->save();

        return redirect('matapelajaran4')->with('success', 'Data Berhasil Diupdate!');
    }

    public function remove4($id)
    {
        $data = Jadwalmapel::find($id);
        $data->delete();

        return redirect('matapelajaran4')->with('success', 'Data Berhasil Dihapus!');
    }

    public function exportpdf4()
    {
        $data4 = Jadwalmapel::select('senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'waktu_pelajaran', 'id', 'kelas_4')
        ->where('kelas_4', 'true')
        ->get();

        view()->share('data4', $data4);
        $pdf = FacadePdf::loadview('pages.Jadwal.Jadwalkelas4-pdf');
        return $pdf->download('Jadwal Siswa Kelas 4.pdf');
    }
    // Akhir Jadwal Untuk Kelas 4

    // Jadwal Untuk Kelas 5
    public function index5()
    {
        $data5 = Jadwalmapel::select('senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'waktu_pelajaran', 'id', 'kelas_5')
        ->where('kelas_5', 'true')
        ->get();
        return view('pages.Jadwal.jadwalmapel5', compact('data5'));
    }

    public function tambahkelas5()
    {
        $jadwal5 = MataPelajaran::where('tingkat_kelas', 'Kelas 5')->get(['nama_matapelajaran']);
        return view('pages.Jadwal.tambahjadwal5', compact('jadwal5'));
    }

    public function insertdata5(Request $request)
    {
        $validateData = $request->validate([
            'senin' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'selasa' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'rabu' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'kamis' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'jumat' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'sabtu' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'waktu_pelajaran' => 'required',
            'kelas_5',
        ], [
            'senin.required' => 'Kolom Senin harus diisi',
            'senin.max' => 'Kolom Senin tidak boleh lebih dari :max karakter',
            'senin.regex' => 'Kolom Senin hanya boleh diisi dengan huruf dan spasi',
            'selasa.required' => 'Kolom Selasa harus diisi',
            'selasa.max' => 'Kolom Selasa tidak boleh lebih dari :max karakter',
            'selasa.regex' => 'Kolom Selasa hanya boleh diisi dengan huruf dan spasi',
            'rabu.required' => 'Kolom Rabu harus diisi',
            'rabu.max' => 'Kolom Rabu tidak boleh lebih dari :max karakter',
            'rabu.regex' => 'Kolom Rabu hanya boleh diisi dengan huruf dan spasi',
            'kamis.required' => 'Kolom Kamis harus diisi',
            'kamis.max' => 'Kolom Kamis tidak boleh lebih dari :max karakter',
            'kamis.regex' => 'Kolom Kamis hanya boleh diisi dengan huruf dan spasi',
            'jumat.required' => 'Kolom Jumat harus diisi',
            'jumat.max' => 'Kolom Jumat tidak boleh lebih dari :max karakter',
            'jumat.regex' => 'Kolom Jumat hanya boleh diisi dengan huruf dan spasi',
            'sabtu.required' => 'Kolom Sabtu harus diisi',
            'sabtu.max' => 'Kolom Sabtu tidak boleh lebih dari :max karakter',
            'sabtu.regex' => 'Kolom Sabtu hanya boleh diisi dengan huruf dan spasi',
            'waktu_pelajaran.required' => 'Kolom Waktu harus diisi',
        ]);

        $validateData['kelas_5'] = 'true';

        $murid5 = Jadwalmapel::create($validateData);

        return redirect()->route('matapelajaran5');
    }

    public function edit5($id)
    {
        $murid5 = Jadwalmapel::find($id);
<<<<<<< HEAD
        $jadwaledit5 = MataPelajaran::where('tingkat_kelas', 'Kelas 5')->get(['nama_matapelajaran']);
        return view('pages.Jadwal.update5', compact('murid5', 'jadwaledit5'));
=======
        $jadwal5 = MataPelajaran::where('tingkat_kelas', 'Kelas 5')->get(['nama_matapelajaran']);
        return view('pages.Jadwal.update5', compact('murid5', 'jadwal5'));
>>>>>>> origin/master
    }

    public function update5(Request $request, $id)
    {
        $validateData = $request->validate([
            'senin' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'selasa' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'rabu' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'kamis' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'jumat' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'sabtu' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'waktu_pelajaran' => 'required',
        ], [
            'senin.required' => 'Kolom Senin harus diisi',
            'senin.max' => 'Kolom Senin tidak boleh lebih dari :max karakter',
            'senin.regex' => 'Kolom Senin hanya boleh diisi dengan huruf dan spasi',
            'selasa.required' => 'Kolom Selasa harus diisi',
            'selasa.max' => 'Kolom Selasa tidak boleh lebih dari :max karakter',
            'selasa.regex' => 'Kolom Selasa hanya boleh diisi dengan huruf dan spasi',
            'rabu.required' => 'Kolom Rabu harus diisi',
            'rabu.max' => 'Kolom Rabu tidak boleh lebih dari :max karakter',
            'rabu.regex' => 'Kolom Rabu hanya boleh diisi dengan huruf dan spasi',
            'kamis.required' => 'Kolom Kamis harus diisi',
            'kamis.max' => 'Kolom Kamis tidak boleh lebih dari :max karakter',
            'kamis.regex' => 'Kolom Kamis hanya boleh diisi dengan huruf dan spasi',
            'jumat.required' => 'Kolom Jumat harus diisi',
            'jumat.max' => 'Kolom Jumat tidak boleh lebih dari :max karakter',
            'jumat.regex' => 'Kolom Jumat hanya boleh diisi dengan huruf dan spasi',
            'sabtu.required' => 'Kolom Sabtu harus diisi',
            'sabtu.max' => 'Kolom Sabtu tidak boleh lebih dari :max karakter',
            'sabtu.regex' => 'Kolom Sabtu hanya boleh diisi dengan huruf dan spasi',
            'waktu_pelajaran.required' => 'Kolom Waktu harus diisi',
        ]);

        $murid5 = JadwalMapel::find($id);
        $murid5->senin = $request->input('senin');
        $murid5->selasa = $request->input('selasa');
        $murid5->rabu = $request->input('rabu');
        $murid5->kamis = $request->input('kamis');
        $murid5->jumat = $request->input('jumat');
        $murid5->sabtu = $request->input('sabtu');
        $murid5->waktu_pelajaran = $request->input('waktu_pelajaran');

        $murid5->save();

        return redirect('matapelajaran5')->with('success', 'Data Berhasil Diupdate!');
    }

    public function remove5($id)
    {
        $data = Jadwalmapel::find($id);
        $data->delete();

        return redirect('matapelajaran5')->with('success', 'Data Berhasil Dihapus!');
    }

    public function exportpdf5()
    {
        $data5 = Jadwalmapel::select('senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'waktu_pelajaran', 'id', 'kelas_5')
        ->where('kelas_5', 'true')
        ->get();

        view()->share('data5', $data5);
        $pdf = FacadePdf::loadview('pages.Jadwal.Jadwalkelas5-pdf');
        return $pdf->download('Jadwal Siswa Kelas 5.pdf');
    }
    // Akhir Jadwal Untuk Kelas 5

    // Jadwal Untuk Kelas 6
    public function index6()
    {
        $data6 = Jadwalmapel::select('senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'waktu_pelajaran', 'id', 'kelas_6')
        ->where('kelas_6', 'true')
        ->get();
        return view('pages.Jadwal.jadwalmapel6', compact('data6'));
    }

    public function tambahkelas6()
    {
        $jadwal6 = MataPelajaran::where('tingkat_kelas', 'Kelas 6')->get(['nama_matapelajaran']);
        return view('pages.Jadwal.tambahjadwal6', compact('jadwal6'));
    }

    public function insertdata6(Request $request)
    {
        $validateData = $request->validate([
            'senin' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'selasa' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'rabu' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'kamis' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'jumat' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'sabtu' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'waktu_pelajaran' => 'required',
            'kelas_6',
        ], [
            'senin.required' => 'Kolom Senin harus diisi',
            'senin.max' => 'Kolom Senin tidak boleh lebih dari :max karakter',
            'senin.regex' => 'Kolom Senin hanya boleh diisi dengan huruf dan spasi',
            'selasa.required' => 'Kolom Selasa harus diisi',
            'selasa.max' => 'Kolom Selasa tidak boleh lebih dari :max karakter',
            'selasa.regex' => 'Kolom Selasa hanya boleh diisi dengan huruf dan spasi',
            'rabu.required' => 'Kolom Rabu harus diisi',
            'rabu.max' => 'Kolom Rabu tidak boleh lebih dari :max karakter',
            'rabu.regex' => 'Kolom Rabu hanya boleh diisi dengan huruf dan spasi',
            'kamis.required' => 'Kolom Kamis harus diisi',
            'kamis.max' => 'Kolom Kamis tidak boleh lebih dari :max karakter',
            'kamis.regex' => 'Kolom Kamis hanya boleh diisi dengan huruf dan spasi',
            'jumat.required' => 'Kolom Jumat harus diisi',
            'jumat.max' => 'Kolom Jumat tidak boleh lebih dari :max karakter',
            'jumat.regex' => 'Kolom Jumat hanya boleh diisi dengan huruf dan spasi',
            'sabtu.required' => 'Kolom Sabtu harus diisi',
            'sabtu.max' => 'Kolom Sabtu tidak boleh lebih dari :max karakter',
            'sabtu.regex' => 'Kolom Sabtu hanya boleh diisi dengan huruf dan spasi',
            'waktu_pelajaran.required' => 'Kolom Waktu harus diisi',
        ]);

        $validateData['kelas_6'] = 'true';

        $murid6 = Jadwalmapel::create($validateData);

        return redirect()->route('matapelajaran6');
    }

    public function edit6($id)
    {
        $murid6 = Jadwalmapel::find($id);
<<<<<<< HEAD
        $jadwaledit6 = MataPelajaran::where('tingkat_kelas', 'Kelas 6')->get(['nama_matapelajaran']);
        return view('pages.Jadwal.update6', compact('murid6', 'jadwaledit6'));
=======
        $jadwal6 = MataPelajaran::where('tingkat_kelas', 'Kelas 6')->get(['nama_matapelajaran']);
        return view('pages.Jadwal.update6', compact('murid6', 'jadwal6'));
>>>>>>> origin/master
    }

    public function update6(Request $request, $id)
    {
        $validateData = $request->validate([
            'senin' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'selasa' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'rabu' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'kamis' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'jumat' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'sabtu' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'waktu_pelajaran' => 'required',
        ], [
            'senin.required' => 'Kolom Senin harus diisi',
            'senin.max' => 'Kolom Senin tidak boleh lebih dari :max karakter',
            'senin.regex' => 'Kolom Senin hanya boleh diisi dengan huruf dan spasi',
            'selasa.required' => 'Kolom Selasa harus diisi',
            'selasa.max' => 'Kolom Selasa tidak boleh lebih dari :max karakter',
            'selasa.regex' => 'Kolom Selasa hanya boleh diisi dengan huruf dan spasi',
            'rabu.required' => 'Kolom Rabu harus diisi',
            'rabu.max' => 'Kolom Rabu tidak boleh lebih dari :max karakter',
            'rabu.regex' => 'Kolom Rabu hanya boleh diisi dengan huruf dan spasi',
            'kamis.required' => 'Kolom Kamis harus diisi',
            'kamis.max' => 'Kolom Kamis tidak boleh lebih dari :max karakter',
            'kamis.regex' => 'Kolom Kamis hanya boleh diisi dengan huruf dan spasi',
            'jumat.required' => 'Kolom Jumat harus diisi',
            'jumat.max' => 'Kolom Jumat tidak boleh lebih dari :max karakter',
            'jumat.regex' => 'Kolom Jumat hanya boleh diisi dengan huruf dan spasi',
            'sabtu.required' => 'Kolom Sabtu harus diisi',
            'sabtu.max' => 'Kolom Sabtu tidak boleh lebih dari :max karakter',
            'sabtu.regex' => 'Kolom Sabtu hanya boleh diisi dengan huruf dan spasi',
            'waktu_pelajaran.required' => 'Kolom Waktu harus diisi',
        ]);

        $murid6 = JadwalMapel::find($id);
        $murid6->senin = $request->input('senin');
        $murid6->selasa = $request->input('selasa');
        $murid6->rabu = $request->input('rabu');
        $murid6->kamis = $request->input('kamis');
        $murid6->jumat = $request->input('jumat');
        $murid6->sabtu = $request->input('sabtu');
        $murid6->waktu_pelajaran = $request->input('waktu_pelajaran');

        $murid6->save();

        return redirect('matapelajaran6')->with('success', 'Data Berhasil Diupdate!');
    }

    public function remove6($id)
    {
        $data = Jadwalmapel::find($id);
        $data->delete();

        return redirect('matapelajaran6')->with('success', 'Data Berhasil Dihapus!');
    }

    public function exportpdf6()
    {
        $data6 = Jadwalmapel::select('senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'waktu_pelajaran', 'id', 'kelas_6')
        ->where('kelas_6', 'true')
        ->get();

        view()->share('data6', $data6);
        $pdf = FacadePdf::loadview('pages.Jadwal.Jadwalkelas6-pdf');
        return $pdf->download('Jadwal Siswa Kelas 6.pdf');
    }
    // Akhir Jadwal Untuk Kelas 6
}
