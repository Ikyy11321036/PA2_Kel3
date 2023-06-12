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
use App\Http\Controllers\JadwalmapelController2;
use App\Http\Controllers\JadwalmapelController3;
use App\Http\Controllers\JadwalmapelController4;
use App\Http\Controllers\JadwalmapelController5;
use App\Http\Controllers\JadwalmapelController6;
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
    return view('pages.guest.dashboard', compact('organisasi'));
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
<<<<<<< HEAD
Route::get('jadwal4', [JadwalmapelController::class, 'index4'])->name('jadwal4');
=======
Route::get('matapelajaran4', [JadwalmapelController::class, 'index4'])->name('matapelajaran4');
>>>>>>> origin/master
Route::get('matapelajaran5', [JadwalmapelController::class, 'index5'])->name('matapelajaran5');
Route::get('matapelajaran6', [JadwalmapelController::class, 'index6'])->name('matapelajaran6');

// Melihat Isi Pengumuman
Route::get('pengumuman', [PengumumanController::class, 'indexpengumuman'])->name('pengumuman');
Route::get('/isi-pengumuman/{id}', [PengumumanController::class, 'melihat'])->name('isipengumuman');

<<<<<<< HEAD
//API Pengumuman
Route::post('/pengumuman/create', [PengumumanController::class, 'create']);
Route::get('/pengumuman/create', [PengumumanController::class, 'showCreateForm']);

=======
>>>>>>> origin/master
//Mengelola dan Melihat Silabus
Route::get('indexsilabus', [SilabusController::class, 'index'])->name('indexsilabus');
Route::get('enteragamasilabus', [SilabusController::class, 'indexagama'])->name('indexagamasilabus');
Route::get('enterppknsilabus', [SilabusController::class, 'indexppkn'])->name('indexppknsilabus');
Route::get('enterindosilabus', [SilabusController::class, 'indexindo'])->name('indexindosilabus');
Route::get('entermtksilabus', [SilabusController::class, 'indexmtk'])->name('indexmtksilabus');
Route::get('enteripasilabus', [SilabusController::class, 'indexipa'])->name('indexipasilabus');
Route::get('enteripssilabus', [SilabusController::class, 'indexips'])->name('indexipssilabus');
Route::get('entersbksilabus', [SilabusController::class, 'indexsbk'])->name('indexsbksilabus');
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
<<<<<<< HEAD
Route::post('/update-raport1/{id}', [RaportController::class, 'update1'])->name('update-raport1');
=======
Route::get('/update-raport1/{id}', [RaportController::class, 'update1'])->name('update-raport1');
>>>>>>> origin/master
Route::get('/deleteraport1/{id}', [RaportController::class, 'deleteraport1'])->name('removeraport1.destroy');

Route::get('/tambahraport2', [RaportController::class, 'tambah2'])->name('tambah2');
Route::post('/menambahraport2', [RaportController::class, 'store2'])->name('add2');
Route::get('edit-raport2/{id}', [RaportController::class, 'edit2'])->name('editraport2');
<<<<<<< HEAD
Route::post('/update-raport2/{id}', [RaportController::class, 'update2'])->name('update-raport2');
=======
Route::get('/update-raport2/{id}', [RaportController::class, 'update2'])->name('update-raport2');
>>>>>>> origin/master
Route::get('/deleteraport2/{id}', [RaportController::class, 'deleteraport2'])->name('removeraport2.destroy');

Route::get('/tambahraport3', [RaportController::class, 'tambah3'])->name('tambah3');
Route::post('/menambahraport3', [RaportController::class, 'store3'])->name('add3');
Route::get('edit-raport3/{id}', [RaportController::class, 'edit3'])->name('editraport3');
<<<<<<< HEAD
Route::post('/update-raport3/{id}', [RaportController::class, 'update3'])->name('update-raport3');
=======
Route::get('/update-raport3/{id}', [RaportController::class, 'update3'])->name('update-raport3');
>>>>>>> origin/master
Route::get('/deleteraport3/{id}', [RaportController::class, 'deleteraport3'])->name('removeraport3.destroy');

Route::get('/tambahraport4', [RaportController::class, 'tambah4'])->name('tambah4');
Route::post('/menambahraport4', [RaportController::class, 'store4'])->name('add4');
Route::get('edit-raport4/{id}', [RaportController::class, 'edit4'])->name('editraport4');
<<<<<<< HEAD
Route::post('/update-raport4/{id}', [RaportController::class, 'update4'])->name('update-raport4');
=======
Route::get('/update-raport4/{id}', [RaportController::class, 'update4'])->name('update-raport4');
>>>>>>> origin/master
Route::get('/deleteraport4/{id}', [RaportController::class, 'deleteraport4'])->name('removeraport4.destroy');

Route::get('/tambahraport5', [RaportController::class, 'tambah5'])->name('tambah5');
Route::post('/menambahraport5', [RaportController::class, 'store5'])->name('add5');
Route::get('edit-raport5/{id}', [RaportController::class, 'edit5'])->name('editraport5');
<<<<<<< HEAD
Route::post('/update-raport5/{id}', [RaportController::class, 'update5'])->name('update-raport5');
=======
Route::get('/update-raport5/{id}', [RaportController::class, 'update5'])->name('update-raport5');
>>>>>>> origin/master
Route::get('/deleteraport5/{id}', [RaportController::class, 'deleteraport5'])->name('removeraport5.destroy');

Route::get('/tambahraport6', [RaportController::class, 'tambah6'])->name('tambah6');
Route::post('/menambahraport6', [RaportController::class, 'store6'])->name('add6');
Route::get('edit-raport6/{id}', [RaportController::class, 'edit6'])->name('editraport6');
<<<<<<< HEAD
Route::post('/update-raport6/{id}', [RaportController::class, 'update6'])->name('update-raport6');
=======
Route::get('/update-raport6/{id}', [RaportController::class, 'update6'])->name('update-raport6');
>>>>>>> origin/master
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

// Mengelola Nilai Siswa
// Tambah Nilai Siswa 1
Route::get('/tambahnilai1', [NilaiController::class, 'tambahnilai1'])->name('tambahnilai1');
Route::post('/insertnilai', [NilaiController::class, 'create'])->name('insertnilai');

// Edit Nilai Siswa
Route::get('/edit-nilai1/{id}', [NilaiController::class, 'edit'])->name('edit-nilai1');
Route::post('/update-nilai1/{id}', [NilaiController::class, 'update'])->name('update-nilai1');

// Hapus Nilai Siswa
Route::get('deletenilai1/{id}', [NilaiController::class, 'remove'])->name('removenilai1.destroy');

// Tambah Nilai Siswa 2
Route::get('/tambahnilai2', [NilaiController2::class, 'tambahnilai2'])->name('tambahnilai2');
Route::post('/insertnilai2', [NilaiController2::class, 'create'])->name('insertnilai2');

// Edit Nilai Siswa
Route::get('/edit-nilai2/{id}', [NilaiController2::class, 'edit'])->name('edit-nilai2');
Route::post('/update-nilai2/{id}', [NilaiController2::class, 'update'])->name('update-nilai2');

// Hapus Nilai Siswa
Route::get('deletenilai2/{id}', [NilaiController2::class, 'remove'])->name('removenilai2.destroy');

// Tambah Nilai Siswa 3
Route::get('/tambahnilai3', [NilaiController3::class, 'tambahnilai3'])->name('tambahnilai3');
Route::post('/insertnilai3', [NilaiController3::class, 'create'])->name('insertnilai3');

// Edit Nilai Siswa
Route::get('/edit-nilai3/{id}', [NilaiController3::class, 'edit'])->name('edit-nilai3');
Route::post('/update-nilai3/{id}', [NilaiController3::class, 'update'])->name('update-nilai3');

// Hapus Nilai Siswa
Route::get('deletenilai3/{id}', [NilaiController3::class, 'remove'])->name('removenilai3.destroy');

// Tambah Nilai Siswa 4
Route::get('/tambahnilai4', [NilaiController4::class, 'tambahnilai4'])->name('tambahnilai4');
Route::post('/insertnilai4', [NilaiController4::class, 'create'])->name('insertnilai4');

// Edit Nilai Siswa
Route::get('/edit-nilai4/{id}', [NilaiController4::class, 'edit'])->name('edit-nilai4');
Route::post('/update-nilai4/{id}', [NilaiController4::class, 'update'])->name('update-nilai4');

// Hapus Nilai Siswa
Route::get('deletenilai4/{id}', [NilaiController4::class, 'remove'])->name('removenilai4.destroy');

// Tambah Nilai Siswa 5
Route::get('/tambahnilai5', [NilaiController5::class, 'tambahnilai5'])->name('tambahnilai5');
Route::post('/insertnilai5', [NilaiController5::class, 'create'])->name('insertnilai5');

// Edit Nilai Siswa
Route::get('/edit-nilai5/{id}', [NilaiController5::class, 'edit'])->name('edit-nilai5');
Route::post('/update-nilai5/{id}', [NilaiController5::class, 'update'])->name('update-nilai5');

// Hapus Nilai Siswa
Route::get('deletenilai5/{id}', [NilaiController5::class, 'remove'])->name('removenilai5.destroy');

// Tambah Nilai Siswa 6
Route::get('/tambahnilai6', [NilaiController6::class, 'tambahnilai6'])->name('tambahnilai6');
Route::post('/insertnilai6', [NilaiController6::class, 'create'])->name('insertnilai6');

// Edit Nilai Siswa
Route::get('/edit-nilai6/{id}', [NilaiController6::class, 'edit'])->name('edit-nilai6');
Route::post('/update-nilai6/{id}', [NilaiController6::class, 'update'])->name('update-nilai6');

// Hapus Nilai Siswa
Route::get('deletenilai6/{id}', [NilaiController6::class, 'remove'])->name('removenilai6.destroy');

//Mengelola Mata Pelajaran Siswa
//Agama
//Agama Kelas 1
Route::get('/tambahagama1', [AgamasController::class, 'tambahagama1'])->name('tambahagama1');
Route::post('/insertagama1', [AgamasController::class, 'createkelas1'])->name('insertagama1');

//Edit Agama 1
Route::get('/edit-agama1/{id}', [AgamasController::class, 'edit1'])->name('edit-agama1');
Route::post('/update-agama1/{id}', [AgamasController::class, 'updateagama1'])->name('update-agama1');

//Hapus Agama 1
Route::get('deleteagama1/{id}', [AgamasController::class, 'removeagama1'])->name('removeagama1.destroy');

//Agama Kelas 2
Route::get('/tambahagama2', [AgamasController2::class, 'tambahagama2'])->name('tambahagama2');
Route::post('/insertagama2', [AgamasController2::class, 'createkelas2'])->name('insertagama2');

//Edit Agama 2
Route::get('/edit-agama2/{id}', [AgamasController2::class, 'edit2'])->name('edit-agama2');
Route::post('/update-agama2/{id}', [AgamasController2::class, 'updateagama2'])->name('update-agama2');

//Hapus Agama 2
Route::get('deleteagama2/{id}', [AgamasController2::class, 'removeagama2'])->name('removeagama2.destroy');

//Agama Kelas 3
Route::get('/tambahagama3', [AgamasController3::class, 'tambahagama3'])->name('tambahagama3');
Route::post('/insertagama3', [AgamasController3::class, 'createkelas3'])->name('insertagama3');

//Edit Agama 3
Route::get('/edit-agama3/{id}', [AgamasController3::class, 'edit3'])->name('edit-agama3');
Route::post('/update-agama3/{id}', [AgamasController3::class, 'updateagama3'])->name('update-agama3');

//Hapus Agama 3
Route::get('deleteagama3/{id}', [AgamasController3::class, 'removeagama3'])->name('removeagama3.destroy');

//Agama Kelas 4
Route::get('/tambahagama4', [AgamasController4::class, 'tambahagama4'])->name('tambahagama4');
Route::post('/insertagama4', [AgamasController4::class, 'createkelas4'])->name('insertagama4');

//Edit Agama 4
Route::get('/edit-agama4/{id}', [AgamasController4::class, 'edit4'])->name('edit-agama4');
Route::post('/update-agama4/{id}', [AgamasController4::class, 'updateagama4'])->name('update-agama4');

//Hapus Agama 4
Route::get('deleteagama4/{id}', [AgamasController4::class, 'removeagama4'])->name('removeagama4.destroy');

//Agama Kelas 5
Route::get('/tambahagama5', [AgamasController5::class, 'tambahagama5'])->name('tambahagama5');
Route::post('/insertagama5', [AgamasController5::class, 'createkelas5'])->name('insertagama5');

//Edit Agama 5
Route::get('/edit-agama5/{id}', [AgamasController5::class, 'edit5'])->name('edit-agama5');
Route::post('/update-agama5/{id}', [AgamasController5::class, 'updateagama5'])->name('update-agama5');

//Hapus Agama 5
Route::get('deleteagama5/{id}', [AgamasController5::class, 'removeagama5'])->name('removeagama5.destroy');

//Agama Kelas 6
Route::get('/tambahagama6', [AgamasController6::class, 'tambahagama6'])->name('tambahagama6');
Route::post('/insertagama6', [AgamasController6::class, 'createkelas6'])->name('insertagama6');

//Edit Agama 6
Route::get('/edit-agama6/{id}', [AgamasController6::class, 'edit6'])->name('edit-agama6');
Route::post('/update-agama6/{id}', [AgamasController6::class, 'updateagama6'])->name('update-agama6');

//Hapus Agama 6
Route::get('deleteagama6/{id}', [AgamasController6::class, 'removeagama6'])->name('removeagama6.destroy');

//Mengelola Mata Pelajaran Siswa
//PPKN

//PPKN Kelas 1
Route::get('/tambahppkn1', [PpknController::class, 'tambahppkn1'])->name('tambahppkn1');
Route::post('/insertppkn1', [PpknController::class, 'createkelas1'])->name('insertppkn1');

//Edit PPKN 1
Route::get('/edit-ppkn1/{id}', [PpknController::class, 'edit1'])->name('edit-ppkn1');
Route::post('/update-ppkn1/{id}', [PpknController::class, 'updateppkn1'])->name('update-ppkn1');

//Hapus PPKN 1
Route::get('deleteppkn1/{id}', [PpknController::class, 'removeppkn1'])->name('removeppkn1.destroy');

//PPKN Kelas 2
Route::get('/tambahppkn2', [PpknController2::class, 'tambahppkn2'])->name('tambahppkn2');
Route::post('/insertppkn2', [PpknController2::class, 'createkelas2'])->name('insertppkn2');

//Edit PPKN 2
Route::get('/edit-ppkn2/{id}', [PpknController2::class, 'edit2'])->name('edit-ppkn2');
Route::post('/update-ppkn2/{id}', [PpknController2::class, 'updateppkn2'])->name('update-ppkn2');

//Hapus PPKN 2
Route::get('deleteppkn2/{id}', [PpknController2::class, 'removeppkn2'])->name('removeppkn2.destroy');

//PPKN Kelas 3
Route::get('/tambahppkn3', [PpknController3::class, 'tambahppkn3'])->name('tambahppkn3');
Route::post('/insertppkn3', [PpknController3::class, 'createkelas3'])->name('insertppkn3');

//Edit PPKN 3
Route::get('/edit-ppkn3/{id}', [PpknController3::class, 'edit3'])->name('edit-ppkn3');
Route::post('/update-ppkn3/{id}', [PpknController3::class, 'updateppkn3'])->name('update-ppkn3');

//Hapus PPKN 3
Route::get('deleteppkn3/{id}', [PpknController3::class, 'removeppkn3'])->name('removeppkn3.destroy');

//PPKN Kelas 4
Route::get('/tambahppkn4', [PpknController4::class, 'tambahppkn4'])->name('tambahppkn4');
Route::post('/insertppkn4', [PpknController4::class, 'createkelas4'])->name('insertppkn4');

//Edit PPKN 4
Route::get('/edit-ppkn4/{id}', [PpknController4::class, 'edit4'])->name('edit-ppkn4');
Route::post('/update-ppkn4/{id}', [PpknController4::class, 'updateppkn4'])->name('update-ppkn4');

//Hapus PPKN 4
Route::get('deleteppkn4/{id}', [PpknController4::class, 'removeppkn4'])->name('removeppkn4.destroy');

//PPKN Kelas 5
Route::get('/tambahppkn5', [PpknController5::class, 'tambahppkn5'])->name('tambahppkn5');
Route::post('/insertppkn5', [PpknController5::class, 'createkelas5'])->name('insertppkn5');

//Edit PPKN 5
Route::get('/edit-ppkn5/{id}', [PpknController5::class, 'edit5'])->name('edit-ppkn5');
Route::post('/update-ppkn5/{id}', [PpknController5::class, 'updateppkn5'])->name('update-ppkn5');

//Hapus PPKN 5
Route::get('deleteppkn5/{id}', [PpknController5::class, 'removeppkn5'])->name('removeppkn5.destroy');

//PPKN Kelas 6
Route::get('/tambahppkn6', [PpknController6::class, 'tambahppkn6'])->name('tambahppkn6');
Route::post('/insertppkn6', [PpknController6::class, 'createkelas6'])->name('insertppkn6');

//Edit PPKN 6
Route::get('/edit-ppkn6/{id}', [PpknController6::class, 'edit6'])->name('edit-ppkn6');
Route::post('/update-ppkn6/{id}', [PpknController6::class, 'updateppkn6'])->name('update-ppkn6');

//Hapus PPKN 6
Route::get('deleteppkn6/{id}', [PpknController6::class, 'removeppkn6'])->name('removeppkn6.destroy');

//Mengelola Mata Pelajaran Siswa
//Bahasa Indonesia
//Bahasa Indonesia Kelas 1
Route::get('/tambahindo1', [IndoController::class, 'tambahindo1'])->name('tambahindo1');
Route::post('/insertindo1', [IndoController::class, 'createkelas1'])->name('insertindo1');

//Edit Bahasa Indonesia 1
Route::get('/edit-indo1/{id}', [IndoController::class, 'edit1'])->name('edit-indo1');
Route::post('/update-indo1/{id}', [IndoController::class, 'updateindo1'])->name('update-indo1');

//Hapus Bahasa Indonesia 1
Route::get('deleteindo1/{id}', [IndoController::class, 'removeindo1'])->name('removeindo1.destroy');

//Bahasa Indonesia Kelas 2
Route::get('/tambahindo2', [IndoController2::class, 'tambahindo2'])->name('tambahindo2');
Route::post('/insertindo2', [IndoController2::class, 'createkelas2'])->name('insertindo2');

//Edit Bahasa Indonesia 2
Route::get('/edit-indo2/{id}', [IndoController2::class, 'edit2'])->name('edit-indo2');
Route::post('/update-indo2/{id}', [IndoController2::class, 'updateindo2'])->name('update-indo2');

//Hapus Bahasa Indonesia 2
Route::get('deleteindo2/{id}', [IndoController2::class, 'removeindo2'])->name('removeindo2.destroy');

//Bahasa Indonesia Kelas 3
Route::get('/tambahindo3', [IndoController3::class, 'tambahindo3'])->name('tambahindo3');
Route::post('/insertindo3', [IndoController3::class, 'createkelas3'])->name('insertindo3');

//Edit Bahasa Indonesia 3
Route::get('/edit-indo3/{id}', [IndoController3::class, 'edit3'])->name('edit-indo3');
Route::post('/update-indo3/{id}', [IndoController3::class, 'updateindo3'])->name('update-indo3');

//Hapus Bahasa Indonesia 3
Route::get('deleteindo3/{id}', [IndoController3::class, 'removeindo3'])->name('removeindo3.destroy');

//Bahasa Indonesia Kelas 4
Route::get('/tambahindo4', [IndoController4::class, 'tambahindo4'])->name('tambahindo4');
Route::post('/insertindo4', [IndoController4::class, 'createkelas4'])->name('insertindo4');

//Edit Bahasa Indonesia 4
Route::get('/edit-indo4/{id}', [IndoController4::class, 'edit4'])->name('edit-indo4');
Route::post('/update-indo4/{id}', [IndoController4::class, 'updateindo4'])->name('update-indo4');

//Hapus Bahasa Indonesia 4
Route::get('deleteindo4/{id}', [IndoController4::class, 'removeindo4'])->name('removeindo4.destroy');

//Bahasa Indonesia Kelas 5
Route::get('/tambahindo5', [IndoController5::class, 'tambahindo5'])->name('tambahindo5');
Route::post('/insertindo5', [IndoController5::class, 'createkelas5'])->name('insertindo5');

//Edit Bahasa Indonesia 5
Route::get('/edit-indo5/{id}', [IndoController5::class, 'edit5'])->name('edit-indo5');
Route::post('/update-indo5/{id}', [IndoController5::class, 'updateindo5'])->name('update-indo5');

//Hapus Bahasa Indonesia 5
Route::get('deleteindo5/{id}', [IndoController5::class, 'removeindo5'])->name('removeindo5.destroy');

//Bahasa Indonesia Kelas 6
Route::get('/tambahindo6', [IndoController6::class, 'tambahindo6'])->name('tambahindo6');
Route::post('/insertindo6', [IndoController6::class, 'createkelas6'])->name('insertindo6');

//Edit Bahasa Indonesia 6
Route::get('/edit-indo6/{id}', [IndoController6::class, 'edit6'])->name('edit-indo6');
Route::post('/update-indo6/{id}', [IndoController6::class, 'updateindo6'])->name('update-indo6');

//Hapus Bahasa Indonesia 6
Route::get('deleteindo6/{id}', [IndoController6::class, 'removeindo6'])->name('removeindo6.destroy');

//Mengelola Mata Pelajaran Siswa
//Matematika
//Matematika Kelas 1
Route::get('/tambahmtk1', [MtkController::class, 'tambahmtk1'])->name('tambahmtk1');
Route::post('/insertmtk1', [MtkController::class, 'createkelas1'])->name('insertmtk1');

//Edit Matematika 1
Route::get('/edit-mtk1/{id}', [MtkController::class, 'edit1'])->name('edit-mtk1');
Route::post('/update-mtk1/{id}', [MtkController::class, 'updatemtk1'])->name('update-mtk1');

//Hapus Matematika 1
Route::get('deletemtk1/{id}', [MtkController::class, 'removemtk1'])->name('removemtk1.destroy');

//Matematika Kelas 2
Route::get('/tambahmtk2', [MtkController2::class, 'tambahmtk2'])->name('tambahmtk2');
Route::post('/insertmtk2', [MtkController2::class, 'createkelas2'])->name('insertmtk2');

//Edit Matematika 2
Route::get('/edit-mtk2/{id}', [MtkController2::class, 'edit2'])->name('edit-mtk2');
Route::post('/update-mtk2/{id}', [MtkController2::class, 'updatemtk2'])->name('update-mtk2');

//Hapus Matematika 2
Route::get('deletemtk2/{id}', [MtkController2::class, 'removemtk2'])->name('removemtk2.destroy');

//Matematika Kelas 3
Route::get('/tambahmtk3', [MtkController3::class, 'tambahmtk3'])->name('tambahmtk3');
Route::post('/insertmtk3', [MtkController3::class, 'createkelas3'])->name('insertmtk3');

//Edit Matematika 3
Route::get('/edit-mtk3/{id}', [MtkController3::class, 'edit3'])->name('edit-mtk3');
Route::post('/update-mtk3/{id}', [MtkController3::class, 'updatemtk3'])->name('update-mtk3');

//Hapus Matematika 3
Route::get('deletemtk3/{id}', [MtkController3::class, 'removemtk3'])->name('removemtk3.destroy');

//Matematika Kelas 4
Route::get('/tambahmtk4', [MtkController4::class, 'tambahmtk4'])->name('tambahmtk4');
Route::post('/insertmtk4', [MtkController4::class, 'createkelas4'])->name('insertmtk4');

//Edit Matematika 4
Route::get('/edit-mtk4/{id}', [MtkController4::class, 'edit4'])->name('edit-mtk4');
Route::post('/update-mtk4/{id}', [MtkController4::class, 'updatemtk4'])->name('update-mtk4');

//Hapus Matematika 4
Route::get('deletemtk4/{id}', [MtkController4::class, 'removemtk4'])->name('removemtk4.destroy');

//Matematika Kelas 5
Route::get('/tambahmtk5', [MtkController5::class, 'tambahmtk5'])->name('tambahmtk5');
Route::post('/insertmtk5', [MtkController5::class, 'createkelas5'])->name('insertmtk5');

//Edit Matematika 5
Route::get('/edit-mtk5/{id}', [MtkController5::class, 'edit5'])->name('edit-mtk5');
Route::post('/update-mtk5/{id}', [MtkController5::class, 'updatemtk5'])->name('update-mtk5');

//Hapus Matematika 5
Route::get('deletemtk5/{id}', [MtkController5::class, 'removemtk5'])->name('removemtk5.destroy');

//Matematika Kelas 6
Route::get('/tambahmtk6', [MtkController6::class, 'tambahmtk6'])->name('tambahmtk6');
Route::post('/insertmtk6', [MtkController6::class, 'createkelas6'])->name('insertmtk6');

//Edit Matematika 6
Route::get('/edit-mtk6/{id}', [MtkController6::class, 'edit6'])->name('edit-mtk6');
Route::post('/update-mtk6/{id}', [MtkController6::class, 'updatemtk6'])->name('update-mtk6');

//Hapus Matematika 6
Route::get('deletemtk6/{id}', [MtkController6::class, 'removemtk6'])->name('removemtk6.destroy');

//Mengelola Mata Pelajaran Siswa
//Ilmu Pengetahuan Alam
//Ilmu Pengetahuan Alam Kelas 1
Route::get('/tambahipa1', [IpaController::class, 'tambahipa1'])->name('tambahipa1');
Route::post('/insertipa1', [IpaController::class, 'createkelas1'])->name('insertipa1');

//Edit Ilmu Pengetahuan Alam 1
Route::get('/edit-ipa1/{id}', [IpaController::class, 'edit1'])->name('edit-ipa1');
Route::post('/update-ipa1/{id}', [IpaController::class, 'updateipa1'])->name('update-ipa1');

//Hapus Ilmu Pengetahuan Alam 1
Route::get('deleteipa1/{id}', [IpaController::class, 'removeipa1'])->name('removeipa1.destroy');

//Ilmu Pengetahuan Alam Kelas 2
Route::get('/tambahipa2', [IpaController2::class, 'tambahipa2'])->name('tambahipa2');
Route::post('/insertipa2', [IpaController2::class, 'createkelas2'])->name('insertipa2');

//Edit Ilmu Pengetahuan Alam 2
Route::get('/edit-ipa2/{id}', [IpaController2::class, 'edit2'])->name('edit-ipa2');
Route::post('/update-ipa2/{id}', [IpaController2::class, 'updateipa2'])->name('update-ipa2');

//Hapus Ilmu Pengetahuan Alam 2
Route::get('deleteipa2/{id}', [IpaController2::class, 'removeipa2'])->name('removeipa2.destroy');

//Ilmu Pengetahuan Alam Kelas 3
Route::get('/tambahipa3', [IpaController3::class, 'tambahipa3'])->name('tambahipa3');
Route::post('/insertipa3', [IpaController3::class, 'createkelas3'])->name('insertipa3');

//Edit Ilmu Pengetahuan Alam 3
Route::get('/edit-ipa3/{id}', [IpaController3::class, 'edit3'])->name('edit-ipa3');
Route::post('/update-ipa3/{id}', [IpaController3::class, 'updateipa3'])->name('update-ipa3');

//Hapus Ilmu Pengetahuan Alam 3
Route::get('deleteipa3/{id}', [IpaController3::class, 'removeipa3'])->name('removeipa3.destroy');

//Ilmu Pengetahuan Alam Kelas 4
Route::get('/tambahipa4', [IpaController4::class, 'tambahipa4'])->name('tambahipa4');
Route::post('/insertipa4', [IpaController4::class, 'createkelas4'])->name('insertipa4');

//Edit Ilmu Pengetahuan Alam 4
Route::get('/edit-ipa4/{id}', [IpaController4::class, 'edit4'])->name('edit-ipa4');
Route::post('/update-ipa4/{id}', [IpaController4::class, 'updateipa4'])->name('update-ipa4');

//Hapus Ilmu Pengetahuan Alam 4
Route::get('deleteipa4/{id}', [IpaController4::class, 'removeipa4'])->name('removeipa4.destroy');

//Ilmu Pengetahuan Alam Kelas 5
Route::get('/tambahipa5', [IpaController5::class, 'tambahipa5'])->name('tambahipa5');
Route::post('/insertipa5', [IpaController5::class, 'createkelas5'])->name('insertipa5');

//Edit Ilmu Pengetahuan Alam 5
Route::get('/edit-ipa5/{id}', [IpaController5::class, 'edit5'])->name('edit-ipa5');
Route::post('/update-ipa5/{id}', [IpaController5::class, 'updateipa5'])->name('update-ipa5');

//Hapus Ilmu Pengetahuan Alam 5
Route::get('deleteipa5/{id}', [IpaController5::class, 'removeipa5'])->name('removeipa5.destroy');

//Ilmu Pengetahuan Alam Kelas 6
Route::get('/tambahipa6', [IpaController6::class, 'tambahipa6'])->name('tambahipa6');
Route::post('/insertipa6', [IpaController6::class, 'createkelas6'])->name('insertipa6');

//Edit Ilmu Pengetahuan Alam 6
Route::get('/edit-ipa6/{id}', [IpaController6::class, 'edit6'])->name('edit-ipa6');
Route::post('/update-ipa6/{id}', [IpaController6::class, 'updateipa6'])->name('update-ipa6');

//Hapus Ilmu Pengetahuan Alam 6
Route::get('deleteipa6/{id}', [IpaController6::class, 'removeipa6'])->name('removeipa6.destroy');

//Mengelola Mata Pelajaran Siswa
//Ilmu Pengetahuan Sosial
//Ilmu Pengetahuan Sosial Kelas 1
Route::get('/tambahips1', [IpsController::class, 'tambahips1'])->name('tambahips1');
Route::post('/insertips1', [IpsController::class, 'createkelas1'])->name('insertips1');

//Edit Ilmu Pengetahuan Sosial 1
Route::get('/edit-ips1/{id}', [IpsController::class, 'edit1'])->name('edit-ips1');
Route::post('/update-ips1/{id}', [IpsController::class, 'updateips1'])->name('update-ips1');

//Hapus Ilmu Pengetahuan Sosial 1
Route::get('deleteips1/{id}', [IpsController::class, 'removeips1'])->name('removeips1.destroy');

//Ilmu Pengetahuan Sosial Kelas 2
Route::get('/tambahips2', [IpsController2::class, 'tambahips2'])->name('tambahips2');
Route::post('/insertips2', [IpsController2::class, 'createkelas2'])->name('insertips2');

//Edit Ilmu Pengetahuan Sosial 2
Route::get('/edit-ips2/{id}', [IpsController2::class, 'edit2'])->name('edit-ips2');
Route::post('/update-ips2/{id}', [IpsController2::class, 'updateips2'])->name('update-ips2');

//Hapus Ilmu Pengetahuan Sosial 2
Route::get('deleteips2/{id}', [IpsController2::class, 'removeips2'])->name('removeips2.destroy');

//Ilmu Pengetahuan Sosial Kelas 3
Route::get('/tambahips3', [IpsController3::class, 'tambahips3'])->name('tambahips3');
Route::post('/insertips3', [IpsController3::class, 'createkelas3'])->name('insertips3');

//Edit Ilmu Pengetahuan Sosial 3
Route::get('/edit-ips3/{id}', [IpsController3::class, 'edit3'])->name('edit-ips3');
Route::post('/update-ips3/{id}', [IpsController3::class, 'updateips3'])->name('update-ips3');

//Hapus Ilmu Pengetahuan Sosial 3
Route::get('deleteips3/{id}', [IpsController3::class, 'removeips3'])->name('removeips3.destroy');

//Ilmu Pengetahuan Sosial Kelas 4
Route::get('/tambahips4', [IpsController4::class, 'tambahips4'])->name('tambahips4');
Route::post('/insertips4', [IpsController4::class, 'createkelas4'])->name('insertips4');

//Edit Ilmu Pengetahuan Sosial 4
Route::get('/edit-ips4/{id}', [IpsController4::class, 'edit4'])->name('edit-ips4');
Route::post('/update-ips4/{id}', [IpsController4::class, 'updateips4'])->name('update-ips4');

//Hapus Ilmu Pengetahuan Sosial 4
Route::get('deleteips4/{id}', [IpsController4::class, 'removeips4'])->name('removeips4.destroy');

//Ilmu Pengetahuan Sosial Kelas 5
Route::get('/tambahips5', [IpsController5::class, 'tambahips5'])->name('tambahips5');
Route::post('/insertips5', [IpsController5::class, 'createkelas5'])->name('insertips5');

//Edit Ilmu Pengetahuan Sosial 5
Route::get('/edit-ips5/{id}', [IpsController5::class, 'edit5'])->name('edit-ips5');
Route::post('/update-ips5/{id}', [IpsController5::class, 'updateips5'])->name('update-ips5');

//Hapus Ilmu Pengetahuan Sosial 5
Route::get('deleteips5/{id}', [IpsController5::class, 'removeips5'])->name('removeips5.destroy');

//Ilmu Pengetahuan Sosial Kelas 6
Route::get('/tambahips6', [IpsController6::class, 'tambahips6'])->name('tambahips6');
Route::post('/insertips6', [IpsController6::class, 'createkelas6'])->name('insertips6');

//Edit Ilmu Pengetahuan Sosial 6
Route::get('/edit-ips6/{id}', [IpsController6::class, 'edit6'])->name('edit-ips6');
Route::post('/update-ips6/{id}', [IpsController6::class, 'updateips6'])->name('update-ips6');

//Hapus Ilmu Pengetahuan Sosial 6
Route::get('deleteips6/{id}', [IpsController6::class, 'removeips6'])->name('removeips6.destroy');

//Mengelola Mata Pelajaran Siswa
//Seni Budaya
//Seni Budaya Kelas 1
Route::get('/tambahsbk1', [SbkController::class, 'tambahsbk1'])->name('tambahsbk1');
Route::post('/insertsbk1', [SbkController::class, 'createkelas1'])->name('insertsbk1');

//Edit Seni Budaya 1
Route::get('/edit-sbk1/{id}', [SbkController::class, 'edit1'])->name('edit-sbk1');
Route::post('/update-sbk1/{id}', [SbkController::class, 'updatesbk1'])->name('update-sbk1');

//Hapus Seni Budaya 1
Route::get('deletesbk1/{id}', [SbkController::class, 'removesbk1'])->name('removesbk1.destroy');

//Seni Budaya Kelas 2
Route::get('/tambahsbk2', [SbkController2::class, 'tambahsbk2'])->name('tambahsbk2');
Route::post('/insertsbk2', [SbkController2::class, 'createkelas2'])->name('insertsbk2');

//Edit Seni Budaya 2
Route::get('/edit-sbk2/{id}', [SbkController2::class, 'edit2'])->name('edit-sbk2');
Route::post('/update-sbk2/{id}', [SbkController2::class, 'updatesbk2'])->name('update-sbk2');

//Hapus Seni Budaya 2
Route::get('deletesbk2/{id}', [SbkController2::class, 'removesbk2'])->name('removesbk2.destroy');

//Seni Budaya Kelas 3
Route::get('/tambahsbk3', [SbkController3::class, 'tambahsbk3'])->name('tambahsbk3');
Route::post('/insertsbk3', [SbkController3::class, 'createkelas3'])->name('insertsbk3');

//Edit Seni Budaya 3
Route::get('/edit-sbk3/{id}', [SbkController3::class, 'edit3'])->name('edit-sbk3');
Route::post('/update-sbk3/{id}', [SbkController3::class, 'updatesbk3'])->name('update-sbk3');

//Hapus Seni Budaya 3
Route::get('deletesbk3/{id}', [SbkController3::class, 'removesbk3'])->name('removesbk3.destroy');

//Seni Budaya Kelas 4
Route::get('/tambahsbk4', [SbkController4::class, 'tambahsbk4'])->name('tambahsbk4');
Route::post('/insertsbk4', [SbkController4::class, 'createkelas4'])->name('insertsbk4');

//Edit Seni Budaya 4
Route::get('/edit-sbk4/{id}', [SbkController4::class, 'edit4'])->name('edit-sbk4');
Route::post('/update-sbk4/{id}', [SbkController4::class, 'updatesbk4'])->name('update-sbk4');

//Hapus Seni Budaya 4
Route::get('deletesbk4/{id}', [SbkController4::class, 'removesbk4'])->name('removesbk4.destroy');

//Seni Budaya Kelas 5
Route::get('/tambahsbk5', [SbkController5::class, 'tambahsbk5'])->name('tambahsbk5');
Route::post('/insertsbk5', [SbkController5::class, 'createkelas5'])->name('insertsbk5');

//Edit Seni Budaya 5
Route::get('/edit-sbk5/{id}', [SbkController5::class, 'edit5'])->name('edit-sbk5');
Route::post('/update-sbk5/{id}', [SbkController5::class, 'updatesbk5'])->name('update-sbk5');

//Hapus Seni Budaya 5
Route::get('deletesbk5/{id}', [SbkController5::class, 'removesbk5'])->name('removesbk5.destroy');

//Seni Budaya Kelas 6
Route::get('/tambahsbk6', [SbkController6::class, 'tambahsbk6'])->name('tambahsbk6');
Route::post('/insertsbk6', [SbkController6::class, 'createkelas6'])->name('insertsbk6');

//Edit Seni Budaya 6
Route::get('/edit-sbk6/{id}', [SbkController6::class, 'edit6'])->name('edit-sbk6');
Route::post('/update-sbk6/{id}', [SbkController6::class, 'updatesbk6'])->name('update-sbk6');

//Hapus Seni Budaya 6
Route::get('deletesbk6/{id}', [SbkController6::class, 'removesbk6'])->name('removesbk6.destroy');

//Mengelola Mata Pelajaran Siswa
//Penjas
//Penjas Kelas 1
Route::get('/tambahpes1', [PesController::class, 'tambahpes1'])->name('tambahpes1');
Route::post('/insertpes1', [PesController::class, 'createkelas1'])->name('insertpes1');

//Edit Penjas 1
Route::get('/edit-pes1/{id}', [PesController::class, 'edit1'])->name('edit-pes1');
Route::post('/update-pes1/{id}', [PesController::class, 'updatepes1'])->name('update-pes1');

//Hapus Penjas 1
Route::get('deletepes1/{id}', [PesController::class, 'removepes1'])->name('removepes1.destroy');

//Penjas Kelas 2
Route::get('/tambahpes2', [PesController2::class, 'tambahpes2'])->name('tambahpes2');
Route::post('/insertpes2', [PesController2::class, 'createkelas2'])->name('insertpes2');

//Edit Penjas 2
Route::get('/edit-pes2/{id}', [PesController2::class, 'edit2'])->name('edit-pes2');
Route::post('/update-pes2/{id}', [PesController2::class, 'updatepes2'])->name('update-pes2');

//Hapus Penjas 2
Route::get('deletepes2/{id}', [PesController2::class, 'removepes2'])->name('removepes2.destroy');

//Penjas Kelas 3
Route::get('/tambahpes3', [PesController3::class, 'tambahpes3'])->name('tambahpes3');
Route::post('/insertpes3', [PesController3::class, 'createkelas3'])->name('insertpes3');

//Edit Penjas 3
Route::get('/edit-pes3/{id}', [PesController3::class, 'edit3'])->name('edit-pes3');
Route::post('/update-pes3/{id}', [PesController3::class, 'updatepes3'])->name('update-pes3');

//Hapus Penjas 3
Route::get('deletepes3/{id}', [PesController3::class, 'removepes3'])->name('removepes3.destroy');

//Penjas Kelas 4
Route::get('/tambahpes4', [PesController4::class, 'tambahpes4'])->name('tambahpes4');
Route::post('/insertpes4', [PesController4::class, 'createkelas4'])->name('insertpes4');

//Edit Penjas 4
Route::get('/edit-pes4/{id}', [PesController4::class, 'edit4'])->name('edit-pes4');
Route::post('/update-pes4/{id}', [PesController4::class, 'updatepes4'])->name('update-pes4');

//Hapus Penjas 4
Route::get('deletepes4/{id}', [PesController4::class, 'removepes4'])->name('removepes4.destroy');

//Penjas Kelas 5
Route::get('/tambahpes5', [PesController5::class, 'tambahpes5'])->name('tambahpes5');
Route::post('/insertpes5', [PesController5::class, 'createkelas5'])->name('insertpes5');

//Edit Penjas 5
Route::get('/edit-pes5/{id}', [PesController5::class, 'edit5'])->name('edit-pes5');
Route::post('/update-pes5/{id}', [PesController5::class, 'updatepes5'])->name('update-pes5');

//Hapus Penjas 5
Route::get('deletepes5/{id}', [PesController5::class, 'removepes5'])->name('removepes5.destroy');

//Penjas Kelas 6
Route::get('/tambahpes6', [PesController6::class, 'tambahpes6'])->name('tambahpes6');
Route::post('/insertpes6', [PesController6::class, 'createkelas6'])->name('insertpes6');

//Edit Penjas 6
Route::get('/edit-pes6/{id}', [PesController6::class, 'edit6'])->name('edit-pes6');
Route::post('/update-pes6/{id}', [PesController6::class, 'updatepes6'])->name('update-pes6');

//Hapus Penjas 6
Route::get('deletepes6/{id}', [PesController6::class, 'removepes6'])->name('removepes6.destroy');

//Tambah Murid Absensi
Route::get('/tambahabsen', [AbsensiController::class, 'create'])->name('tambahabsen');
Route::post('/insertabsen', [AbsensiController::class, 'insert'])->name('insertabsen');
Route::post('/datesubmit', [AbsensiController::class, 'submitDate'])->name('datesubmit');

//Hapus Murid Absensi
Route::get('/deleteabsen/{id}', [AbsensiController::class, 'remove'])->name('removeabsen.destroy');

//Mengelola Silabus Agama
Route::get('silabusagama', [SilabusController::class, 'add'])->name('silabusagama');
Route::post('silabuspostagama', [SilabusController::class, 'create_agama'])->name('silabuspostagama');

Route::get('/edit-silabusagama/{id}', [SilabusController::class, 'edit'])->name('editsilabusagama');
Route::post('/update-silabusagama/{id}', [SilabusController::class, 'update'])->name('update-silabusagama');

Route::get('/deletesilabusagama/{id}', [SilabusController::class, 'delete'])->name('removesilabusagama.destroy');

//Mengelola Silabus PPKN
Route::get('silabusppkn', [SilabusController::class, 'addppkn'])->name('silabusppkn');
Route::post('silabuspostppkn', [SilabusController::class, 'create_ppkn'])->name('silabuspostppkn');

Route::get('/edit-silabusppkn/{id}', [SilabusController::class, 'editppkn'])->name('editsilabusppkn');
Route::post('/update-silabusppkn/{id}', [SilabusController::class, 'updateppkn'])->name('update-silabusppkn');

Route::get('/deletesilabusppkn/{id}', [SilabusController::class, 'deleteppkn'])->name('removesilabusppkn.destroy');

//Mengelola Silabus Bahasa Indonesia
Route::get('silabusindo', [SilabusController::class, 'addindo'])->name('silabusindo');
Route::post('silabuspostindo', [SilabusController::class, 'create_indo'])->name('silabuspostindo');

Route::get('/edit-silabusindo/{id}', [SilabusController::class, 'editindo'])->name('editsilabusindo');
Route::post('/update-silabusindo/{id}', [SilabusController::class, 'updateindo'])->name('update-silabusindo');

Route::get('/deletesilabusindo/{id}', [SilabusController::class, 'deleteindo'])->name('removesilabusindo.destroy');

//Mengelola Silabus Matematika
Route::get('silabusmtk', [SilabusController::class, 'addmtk'])->name('silabusmtk');
Route::post('silabuspostmtk', [SilabusController::class, 'create_mtk'])->name('silabuspostmtk');

Route::get('/edit-silabusmtk/{id}', [SilabusController::class, 'editmtk'])->name('editsilabusmtk');
Route::post('/update-silabusmtk/{id}', [SilabusController::class, 'updatemtk'])->name('update-silabusmtk');

Route::get('/deletesilabusmtk/{id}', [SilabusController::class, 'deletemtk'])->name('removesilabusmtk.destroy');

//Mengelola Silabus IPA
Route::get('silabusipa', [SilabusController::class, 'addipa'])->name('silabusipa');
Route::post('silabuspostipa', [SilabusController::class, 'create_ipa'])->name('silabuspostipa');

Route::get('/edit-silabusipa/{id}', [SilabusController::class, 'editipa'])->name('editsilabusipa');
Route::post('/update-silabusipa/{id}', [SilabusController::class, 'updateipa'])->name('update-silabusipa');

Route::get('/deletesilabusipa/{id}', [SilabusController::class, 'deleteipa'])->name('removesilabusipa.destroy');

//Mengelola Silabus IPS
Route::get('silabusips', [SilabusController::class, 'addips'])->name('silabusips');
Route::post('silabuspostips', [SilabusController::class, 'create_ips'])->name('silabuspostips');

Route::get('/edit-silabusips/{id}', [SilabusController::class, 'editips'])->name('editsilabusips');
Route::post('/update-silabusips/{id}', [SilabusController::class, 'updateips'])->name('update-silabusips');

Route::get('/deletesilabusips/{id}', [SilabusController::class, 'deleteips'])->name('removesilabusips.destroy');

//Mengelola Silabus SBK
Route::get('silabussbk', [SilabusController::class, 'addsbk'])->name('silabussbk');
Route::post('silabuspostsbk', [SilabusController::class, 'create_sbk'])->name('silabuspostsbk');

Route::get('/edit-silabussbk/{id}', [SilabusController::class, 'editsbk'])->name('editsilabussbk');
Route::post('/update-silabussbk/{id}', [SilabusController::class, 'updatesbk'])->name('update-silabussbk');

Route::get('/deletesilabussbk/{id}', [SilabusController::class, 'deletesbk'])->name('removesilabussbk.destroy');

//Mengelola Silabus Penjas
Route::get('silabuspenjas', [SilabusController::class, 'addpenjas'])->name('silabuspenjas');
Route::post('silabuspostpenjas', [SilabusController::class, 'create_penjas'])->name('silabuspostpenjas');

Route::get('/edit-silabuspenjas/{id}', [SilabusController::class, 'editpenjas'])->name('editsilabuspenjas');
Route::post('/update-silabuspenjas/{id}', [SilabusController::class, 'updatepenjas'])->name('update-silabuspenjas');

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