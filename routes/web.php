<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AgamasController;
use App\Http\Controllers\AgamasController2;
use App\Http\Controllers\AgamasController3;
use App\Http\Controllers\AgamasController4;
use App\Http\Controllers\AgamasController5;
use App\Http\Controllers\AgamasController6;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\IndoController;
use App\Http\Controllers\IndoController2;
use App\Http\Controllers\IndoController3;
use App\Http\Controllers\IndoController4;
use App\Http\Controllers\IndoController5;
use App\Http\Controllers\IndoController6;
use App\Http\Controllers\IpaController;
use App\Http\Controllers\IpaController2;
use App\Http\Controllers\IpsController;
use App\Http\Controllers\IpsController2;
use App\Http\Controllers\JadwalmapelController;
use App\Models\Informasi;
use App\Http\Controllers\MtkController;
use App\Http\Controllers\MtkController2;
use App\Http\Controllers\MtkController3;
use App\Http\Controllers\MtkController4;
use App\Http\Controllers\MtkController5;
use App\Http\Controllers\MtkController6;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\NilaiController2;
use App\Http\Controllers\NilaiController3;
use App\Http\Controllers\NilaiController4;
use App\Http\Controllers\NilaiController5;
use App\Http\Controllers\NilaiController6;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SilabusController;
use App\Http\Controllers\PesController;
use App\Http\Controllers\PesController2;
use App\Http\Controllers\PesController3;
use App\Http\Controllers\PesController4;
use App\Http\Controllers\PesController5;
use App\Http\Controllers\PesController6;
use App\Http\Controllers\PpknController;
use App\Http\Controllers\PpknController2;
use App\Http\Controllers\PpknController3;
use App\Http\Controllers\PpknController4;
use App\Http\Controllers\PpknController5;
use App\Http\Controllers\PpknController6;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SbkController;
use App\Http\Controllers\SbkController2;
use App\Http\Controllers\SbkController3;
use App\Http\Controllers\SbkController4;
use App\Http\Controllers\SbkController5;
use App\Http\Controllers\SbkController6;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RaportController;
use App\Models\Struktur;
use App\Models\Agama1;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $organisasi = Struktur::all();
    $if = Informasi::all();
    return view('pages.guest.dashboard', compact('organisasi', 'if'));
});

// Dashboard
Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
//Event
Route::get('event',[EventController::class,'index'])->name('event');

//Mapel
Route::get('mapel',[MapelController::class,'index'])->name('mapel');

//Guru
Route::get('guru',[GuruController::class,'index'])->name('guru');

//Siswa
Route::get('siswa',[SiswaController::class,'index'])->name('siswa');

//Guest
Route::get('guest', [GuestController::class, 'index'])->name('guest');
Route::get('/guestaccess', [GuestController::class, 'blocked'])->name('guestaccess');

//Mengelola Absensi Siswa
Route::get('absensisiswa', [AbsensiController::class, 'indexabsen'])->name('absensisiswa');

// Menampilkan Nama Siswa Di Absensi
Route::get('/siswa/nama', [AbsensiController::class, 'getStudentNames']);
Route::get('/absensi/create', [AbsensiController::class, 'nameStudent']);

//Mengelola Profil
Route::get('/profile/edit', [ProfilController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::put('/profile/update', [ProfilController::class, 'update'])->name('profile.update')->middleware('auth');

// Mengelola Jadwal Siswa
Route::get('matapelajaran',  [JadwalmapelController::class,'index'])->name('matapelajaran');
Route::get('matapelajaran2', [JadwalmapelController::class, 'index2'])->name('matapelajaran2');
Route::get('matapelajaran3', [JadwalmapelController::class, 'index3'])->name('matapelajaran3');
Route::get('jadwal4', [JadwalmapelController::class, 'index4'])->name('jadwal4');
Route::get('matapelajaran5', [JadwalmapelController::class, 'index5'])->name('matapelajaran5');
Route::get('matapelajaran6', [JadwalmapelController::class, 'index6'])->name('matapelajaran6');

// Melihat Isi Pengumuman
Route::get('pengumuman', [PengumumanController::class, 'indexpengumuman'])->name('pengumuman');
Route::get('/isi-pengumuman/{id}', [PengumumanController::class, 'melihat'])->name('isipengumuman');

//API Pengumuman
Route::post('/pengumuman/create', [PengumumanController::class, 'create']);
Route::get('/pengumuman/create', [PengumumanController::class, 'showCreateForm']);

//Mengelola dan Melihat Silabus
Route::get('indexsilabus', [SilabusController::class, 'index'])->name('indexsilabus');
Route::get('enteragamasilabus', [SilabusController::class, 'indexagama'])->name('indexagamasilabus');
Route::get('entertematiksilabus', [SilabusController::class, 'indextematik'])->name('indextematiksilabus');
Route::get('enterenglishsilabus', [SilabusController::class, 'indexenglish'])->name('indexenglishsilabus');
Route::get('entermtksilabus', [SilabusController::class, 'indexmtk'])->name('indexmtksilabus');
Route::get('enterpenjassilabus', [SilabusController::class, 'indexpenjas'])->name('indexpenjassilabus');

// Mengelola Ubah Password
Route::get('/password/change', [ChangePasswordController::class, 'index'])->name('password.change');
Route::post('/password/change', [ChangePasswordController::class, 'store']);

//Mengelola Mata Pelajaran
Route::get('matapelajaransiswa', [CourseController::class, 'view'])->name('matapelajaransiswa');

// Mengelola Raport
Route::get('raport', [RaportController::class, 'index'])->name('raport');
Route::get('raport2', [RaportController::class, 'index2'])->name('raport2');
Route::get('raport3', [RaportController::class, 'index3'])->name('raport3');
Route::get('raport4', [RaportController::class, 'index4'])->name('raport4');
Route::get('raport5', [RaportController::class, 'index5'])->name('raport5');
Route::get('raport6', [RaportController::class, 'index6'])->name('raport6');

// Sortir Kelas
Route::post('/viewmurid', [RegisterController::class, 'viewmurid'])->name('viewmurid');

//Edit Absensi
Route::get('/edit-absensi/{id}', [AbsensiController::class, 'edit'])->name('edit-absensi');
Route::post('/update-absensi/{id}', [AbsensiController::class, 'update'])->name('update-absensi');

// Login & Register
Route::post('/login', 'App\Http\Controllers\RegisterController@login');
Route::get('/login', 'App\Http\Controllers\RegisterController@index');

Route::get('/login', [App\Http\Controllers\RegisterController::class, 'showLoginForm'])->name('login');

Route::group(['middleware' => 'App\Http\Middleware\AuthenticationMiddleware'], function () {
    Route::get('/logout', 'App\Http\Controllers\RegisterController@logout');

    Route::get('/home', 'App\Http\Controllers\RegisterController@home');
});
Route::post('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'hakakses:admin']], function(){
// Mengelola Raport
Route::get('/tambahraport1', [RaportController::class, 'tambah1'])->name('tambah1');
Route::post('/menambahraport1', [RaportController::class, 'store1'])->name('add1');
Route::get('edit-raport1/{id}', [RaportController::class, 'edit1'])->name('editraport1');
Route::post('/update-raport1/{id}', [RaportController::class, 'update1'])->name('update-raport1');
Route::get('/deleteraport1/{id}', [RaportController::class, 'deleteraport1'])->name('removeraport1.destroy');

Route::get('/tambahraport2', [RaportController::class, 'tambah2'])->name('tambah2');
Route::post('/menambahraport2', [RaportController::class, 'store2'])->name('add2');
Route::get('edit-raport2/{id}', [RaportController::class, 'edit2'])->name('editraport2');
Route::post('/update-raport2/{id}', [RaportController::class, 'update2'])->name('update-raport2');
Route::get('/deleteraport2/{id}', [RaportController::class, 'deleteraport2'])->name('removeraport2.destroy');

Route::get('/tambahraport3', [RaportController::class, 'tambah3'])->name('tambah3');
Route::post('/menambahraport3', [RaportController::class, 'store3'])->name('add3');
Route::get('edit-raport3/{id}', [RaportController::class, 'edit3'])->name('editraport3');
Route::post('/update-raport3/{id}', [RaportController::class, 'update3'])->name('update-raport3');
Route::get('/deleteraport3/{id}', [RaportController::class, 'deleteraport3'])->name('removeraport3.destroy');

Route::get('/tambahraport4', [RaportController::class, 'tambah4'])->name('tambah4');
Route::post('/menambahraport4', [RaportController::class, 'store4'])->name('add4');
Route::get('edit-raport4/{id}', [RaportController::class, 'edit4'])->name('editraport4');
Route::post('/update-raport4/{id}', [RaportController::class, 'update4'])->name('update-raport4');
Route::get('/deleteraport4/{id}', [RaportController::class, 'deleteraport4'])->name('removeraport4.destroy');

Route::get('/tambahraport5', [RaportController::class, 'tambah5'])->name('tambah5');
Route::post('/menambahraport5', [RaportController::class, 'store5'])->name('add5');
Route::get('edit-raport5/{id}', [RaportController::class, 'edit5'])->name('editraport5');
Route::post('/update-raport5/{id}', [RaportController::class, 'update5'])->name('update-raport5');
Route::get('/deleteraport5/{id}', [RaportController::class, 'deleteraport5'])->name('removeraport5.destroy');

Route::get('/tambahraport6', [RaportController::class, 'tambah6'])->name('tambah6');
Route::post('/menambahraport6', [RaportController::class, 'store6'])->name('add6');
Route::get('edit-raport6/{id}', [RaportController::class, 'edit6'])->name('editraport6');
Route::post('/update-raport6/{id}', [RaportController::class, 'update6'])->name('update-raport6');
Route::get('/deleteraport6/{id}', [RaportController::class, 'deleteraport6'])->name('removeraport6.destroy');

// Mengelola Mata Pelajaran
Route::get('tambahmapels', [CourseController::class, 'create'])->name('tambahmapels');
Route::post('/tambahmapel', [CourseController::class, 'addmatapelajaran'])->name('insertmatapelajaran');

Route::get('edit-mapelsiswa/{id}', [CourseController::class, 'edit'])->name('gantimapel');
Route::post('/update-mapelsiswa/{id}', [CourseController::class, 'update'])->name('update-mapelsiswa');

Route::get('/deletemapelsiswa/{id}', [CourseController::class, 'delete'])->name('removemapelsiswa.destroy');

// Tambah Kepsek dan Guru
Route::get('/tambahkepsek', [RegisterController::class, 'create'])->name('tambahkepsek');
Route::get('/addguru', [RegisterController::class, 'creates'])->name('addguru');
Route::get('/addsiswa', [RegisterController::class, 'tambah'])->name('siswatambah');

Route::post('/tambahkepsek', [RegisterController::class, 'store'])->name('insertkepsek');
Route::post('/menambahsiswa', [RegisterController::class, 'insert'])->name('menambahsiswa');

// Hapus Data Kepsek, Guru, Siswa
Route::get('/deletekepsek/{id}', [RegisterController::class, 'deletekepsek'])->name('removekepsek.destroy');
Route::get('/deleteteacher/{id}', [RegisterController::class, 'deleteteacher'])->name('removeteacher.destroy');
Route::get('/deletestudent/{id}', [RegisterController::class, 'deletestudent'])->name('removestudent.destroy');

// Tampilkan Data Kepsek, Guru, Siswa
Route::get('kepalasekolah', [RegisterController::class, 'viewkepsek'])->name('kepalasekolah');
Route::get('teacher', [RegisterController::class, 'viewguru'])->name('teacher');
Route::get('murid', [RegisterController::class, 'viewmurid'])->name('murid');

// Edit Data Kepsek, Guru, Siswa
Route::get('edit-kepsek/{id}', [RegisterController::class, 'editkepsek'])->name('editkepsek');
Route::post('/update-kepsek/{id}', [RegisterController::class, 'updatekepsek'])->name('update-kepsek');

Route::get('edit-teachers/{id}', [RegisterController::class, 'editteachers'])->name('editteachers');
Route::post('/update-teachers/{id}', [RegisterController::class, 'updateteachers'])->name('update-teachers');

Route::get('edit-students/{id}', [RegisterController::class, 'editstudents'])->name('editstudents');
Route::post('/update-students/{id}', [RegisterController::class, 'updatestudents'])->name('update-students');

// Register
Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');

// Update Struktur Organisasi
Route::get('tambahstruktur', [DashboardController::class, 'create'])->name('tambahstruktur');
Route::post('menambahstruktur', [DashboardController::class, 'tambah'])->name('menambahstruktur');

Route::get('edit-struktur/{id}', [DashboardController::class, 'edit'])->name('editstruktur');
Route::post('/updatestruktur/{id}', [DashboardController::class, 'update'])->name('updatestruktur');

Route::get('/deletestruktur/{id}', [DashboardController::class, 'delete'])->name('removestruktur.destroy');


Route::get('tambahinformasi', [DashboardController::class, 'createinformasi'])->name('tambahinformasi');
Route::post('menambahinformasi', [DashboardController::class, 'tambahinformasi'])->name('menambahinformasi');

Route::get('edit-informasi/{id}', [DashboardController::class, 'editinformasi'])->name('editinformasi');
Route::post('/updateinformasi/{id}', [DashboardController::class, 'updateinformasi'])->name('updateinformasi');

Route::get('/deleteinformasi/{id}', [DashboardController::class, 'remove'])->name('removeinformasi.destroy');

// Tambah Data Guru
Route::get('/tambahguru', [GuruController::class, 'tambahguru'])->name('tambahguru');
Route::post('/insert-dataguru', [GuruController::class, 'insert_guru'])->name('insertguru');

// Update Data Guru
Route::get('/edit-guru/{id}', [GuruController::class, 'edit'])->name('edit-guru');
Route::post('/update-guru/{id}', [GuruController::class, 'update'])->name('update-guru');

// Hapus Data Guru
Route::get('/deleteguru/{id}', [GuruController::class, 'delete'])->name('removeguru.destroy');

// Tambah Data Siswa
Route::get('/tambahsiswa', [SiswaController::class, 'tambahsiswa'])->name('tambahsiswa');
Route::post('/insert-data', [SiswaController::class, 'insert_siswa'])->name('insert');

// Update Data Siswa
Route::get('/edit-siswa/{id}', [SiswaController::class, 'edit'])->name('edit-guru');
Route::post('/update-siswa/{id}', [SiswaController::class, 'update'])->name('update-siswa');

// Hapus Data Siswa
Route::get('/deletesiswa/{id}', [SiswaController::class, 'remove'])->name('removesiswa.destroy');

// Siswa Kelas 1
Route::get('/tambahkelas1', [JadwalmapelController::class, 'tambahkelas1'])->name('tambahkelas1');
Route::post('/insertdata1', [JadwalmapelController::class, 'insertdata1'])->name('insertdata1');

Route::get('/edit-murid1/{id}', [JadwalmapelController::class, 'edit'])->name('edit-murid1');
Route::post('/update-murid1/{id}', [JadwalmapelController::class, 'update'])->name('update-murid1');

Route::get('/delete1/{id}', [JadwalmapelController::class, 'remove'])->name('remove1.destroy');

// Siswa Kelas 2
Route::get('/tambahkelas2', [JadwalmapelController::class, 'tambahkelas2'])->name('tambahkelas2');
Route::post('/insertdata2', [JadwalmapelController::class, 'insertdata2'])->name('insertdata2');

Route::get('/edit-murid2/{id}', [JadwalmapelController::class, 'edit2'])->name('edit-murid2');
Route::post('/update-murid2/{id}', [JadwalmapelController::class, 'update2'])->name('update-murid2');

Route::get('delete2/{id}', [JadwalmapelController::class, 'remove2'])->name('remove2.destroy');

// Siswa Kelas 3
Route::get('/tambahkelas3', [JadwalmapelController::class, 'tambahkelas3'])->name('tambahkelas3');
Route::post('/insertdata3', [JadwalmapelController::class, 'insertdata3'])->name('insertdata3');

Route::get('/edit-murid3/{id}', [JadwalmapelController::class, 'edit3'])->name('edit-murid3');
Route::post('/update-murid3/{id}', [JadwalmapelController::class, 'update3'])->name('update-murid3');

Route::get('delete3/{id}', [JadwalmapelController::class, 'remove3'])->name('remove3.destroy');

// Siswa Kelas 4
Route::get('matapelajaran4', [JadwalmapelController::class, 'index4'])->name('matapelajaran4');
Route::get('/tambahkelas4', [JadwalmapelController::class, 'tambahkelas4'])->name('tambahkelas4');
Route::post('/insertdata4', [JadwalmapelController::class, 'insertdata4'])->name('insertdata4');

Route::get('/edit-murid4/{id}', [JadwalmapelController::class, 'edit4'])->name('edit-murid4');
Route::post('/update-murid4/{id}', [JadwalmapelController::class, 'update4'])->name('update-murid4');

Route::get('delete4/{id}', [JadwalmapelController::class, 'remove4'])->name('remove4.destroy');

// Siswa Kelas 5
Route::get('/tambahkelas5', [JadwalmapelController::class, 'tambahkelas5'])->name('tambahkelas5');
Route::post('/insertdata5', [JadwalmapelController::class, 'insertdata5'])->name('insertdata5');

Route::get('/edit-murid5/{id}', [JadwalmapelController::class, 'edit5'])->name('edit-murid5');
Route::post('/update-murid5/{id}', [JadwalmapelController::class, 'update5'])->name('update-murid5');

Route::get('delete5/{id}', [JadwalMapelController::class, 'remove5'])->name('remove5.destroy');

// Siswa Kelas 6
Route::get('/tambahkelas6', [JadwalmapelController::class, 'tambahkelas6'])->name('tambahkelas6');
Route::post('/insertdata6', [JadwalmapelController::class, 'insertdata6'])->name('insertdata6');

Route::get('/edit-murid6/{id}', [JadwalmapelController::class, 'edit6'])->name('edit-murid6');
Route::post('/update-murid6/{id}', [JadwalmapelController::class, 'update6'])->name('update-murid6');

Route::get('delete6/{id}', [JadwalmapelController::class, 'remove6'])->name('remove6.destroy');

// Mengelola Pengumuman Sekolah
// Tambah Pengumuman
Route::get('/tambahpengumuman', [PengumumanController::class, 'tambahpengumuman'])->name('tambahpengumuman');
Route::post('/insertpengumuman', [PengumumanController::class, 'insertpengumuman'])->name('insertpengumuman');

// Edit Pengumuman
Route::get('/edit-pengumuman/{id}', [PengumumanController::class, 'edit'])->name('edit-pengumuman');
Route::post('/update-pengumuman/{id}', [PengumumanController::class, 'update'])->name('update-pengumuman');

// Hapus Pengumuman
Route::get('deletepengumuman/{id}', [PengumumanController::class, 'remove'])->name('removepengumuman.destroy');

//Mengelola Silabus Agama
Route::get('materiagama', [SilabusController::class, 'add'])->name('silabusagama');
Route::post('materipostagama', [SilabusController::class, 'create_agama'])->name('silabuspostagama');

Route::get('/edit-materiagama/{id}', [SilabusController::class, 'edit'])->name('editsilabusagama');
Route::post('/update-materiagama/{id}', [SilabusController::class, 'update'])->name('update-silabusagama');

Route::get('/deletesilabusagama/{id}', [SilabusController::class, 'delete'])->name('removesilabusagama.destroy');

//Mengelola Silabus Tematik
Route::get('materitematik', [SilabusController::class, 'addtematik'])->name('silabustematik');
Route::post('materiposttematik', [SilabusController::class, 'create_tematik'])->name('silabusposttematik');

Route::get('/edit-materitematik/{id}', [SilabusController::class, 'edittematik'])->name('editsilabustematik');
Route::post('/update-materitematik/{id}', [SilabusController::class, 'updatetematik'])->name('update-silabustematik');

Route::get('/deletesilabustematik/{id}', [SilabusController::class, 'deletetematik'])->name('removesilabustematik.destroy');

//Mengelola Silabus Bahasa Inggris
Route::get('materienglish', [SilabusController::class, 'addenglish'])->name('silabusenglish');
Route::post('materipostenglish', [SilabusController::class, 'create_english'])->name('silabuspostenglish');

Route::get('/edit-materienglish/{id}', [SilabusController::class, 'editenglish'])->name('editsilabusenglish');
Route::post('/update-materienglish/{id}', [SilabusController::class, 'updateenglish'])->name('update-silabusenglish');

Route::get('/deletesilabusenglish/{id}', [SilabusController::class, 'deleteenglish'])->name('removesilabusenglish.destroy');

//Mengelola Silabus Matematika
Route::get('materimtk', [SilabusController::class, 'addmtk'])->name('silabusmtk');
Route::post('materipostmtk', [SilabusController::class, 'create_mtk'])->name('silabuspostmtk');

Route::get('/edit-materimtk/{id}', [SilabusController::class, 'editmtk'])->name('editsilabusmtk');
Route::post('/update-materimtk/{id}', [SilabusController::class, 'updatemtk'])->name('update-silabusmtk');

Route::get('/deletesilabusmtk/{id}', [SilabusController::class, 'deletemtk'])->name('removesilabusmtk.destroy');

//Mengelola Silabus Penjas
Route::get('materipenjas', [SilabusController::class, 'addpenjas'])->name('silabuspenjas');
Route::post('materipostpenjas', [SilabusController::class, 'create_penjas'])->name('silabuspostpenjas');

Route::get('/edit-materipenjas/{id}', [SilabusController::class, 'editpenjas'])->name('editsilabuspenjas');
Route::post('/update-materipenjas/{id}', [SilabusController::class, 'updatepenjas'])->name('update-silabuspenjas');

Route::get('/deletesilabuspenjas/{id}', [SilabusController::class, 'deletepenjas'])->name('removesilabuspenjas.destroy');
});

// Profil
Route::get('profiluser', [ProfilController::class, 'index'])->name('profiluser');

//Export PDF
Route::get('/exportpdf', [RaportController::class, 'exportpdf'])->name('exportpdfraport1');
Route::get('/exportpdf2', [RaportController::class, 'exportpdf2'])->name('exportpdfraport2');
Route::get('/exportpdf3', [RaportController::class, 'exportpdf3'])->name('exportpdfraport3');
Route::get('/exportpdf4', [RaportController::class, 'exportpdf4'])->name('exportpdfraport4');
Route::get('/exportpdf5', [RaportController::class, 'exportpdf5'])->name('exportpdfraport5');
Route::get('/exportpdf6', [RaportController::class, 'exportpdf6'])->name('exportpdfraport6');

Route::get('/exportpdfjadwal', [JadwalmapelController::class, 'exportpdf'])->name('exportpdfjadwal');
Route::get('/exportpdfjadwal2', [JadwalmapelController::class, 'exportpdf2'])->name('exportpdfjadwal2');
Route::get('/exportpdfjadwal3', [JadwalmapelController::class, 'exportpdf3'])->name('exportpdfjadwal3');
Route::get('/exportpdfjadwal4', [JadwalmapelController::class, 'exportpdf4'])->name('exportpdfjadwal4');
Route::get('/exportpdfjadwal5', [JadwalmapelController::class, 'exportpdf5'])->name('exportpdfjadwal5');
Route::get('/exportpdfjadwal6', [JadwalmapelController::class, 'exportpdf6'])->name('exportpdfjadwal6');

Route::get('/exportpdfabsen', [AbsensiController::class, 'exportpdfabsen'])->name('exportpdfabsen');