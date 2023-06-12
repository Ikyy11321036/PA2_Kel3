<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function viewkepsek()
    {
        $kepsek = User::where('role', 'admin')
            ->where('jabatan', 'Kepala Sekolah')
            ->get();
        return view('pages.DataUser.kepsek', compact('kepsek'));
    }

    public function create()
    {
        return view('pages.DataUser.tambahkepsek');
    }

    public function viewguru()
    {
        $guru = User::where('role', 'admin')
            ->where('jabatan', 'Guru')
            ->get();
        return view('pages.DataUser.guru', compact('guru'));
    }

    public function creates()
    {
        return view('pages.DataUser.tambahguru');
    }

    public function viewmurid()
    {
        $siswa = User::where('role', 'user')
            ->orderBy('kelas', 'asc')
            ->get();
        return view('pages.DataUser.siswa', compact('siswa'));
    }

    public function tambah()
    {
        return view('pages.DataUser.tambahsiswa');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'nip' => 'required|numeric|min:18',
            'no_telepon' => 'required|numeric|min:12',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tgl_lahir' => 'required|date_format:Y-m-d',
            'tpt_lahir' => 'required|max:100',
            'jabatan' => 'required|string',
            'agama' => 'required',
            'alamat' => 'required|max:100',
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'],
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'username.required' => 'Username harus diisi.',
            'username.string' => 'Username harus berupa teks.',
            'username.max' => 'Username maksimal 255 karakter.',
            'username.unique' => 'Username sudah digunakan.',
            'nip.required' => 'NIP harus diisi.',
            'nip.numeric' => 'NIP harus berupa angka.',
            'nip.min' => 'NIP minimal 18 angka.',
            'no_telepon.required' => 'Nomor telepon harus diisi.',
            'no_telepon.numeric' => 'Nomor telepon harus berupa angka.',
            'no_telepon.min' => 'Nomor telepon minimal 12 angka.',
            'jenis_kelamin.required' => 'Jenis kelamin harus dipilih.',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-Laki atau Perempuan.',
            'tgl_lahir.required' => 'Tanggal lahir harus diisi.',
            'tgl_lahir.date_format' => 'Format tanggal lahir harus Y-m-d.',
            'tpt_lahir.required' => 'Tempat lahir harus diisi.',
            'tpt_lahir.max' => 'Tempat lahir maksimal 100 karakter.',
            'jabatan.required' => 'Jabatan harus diisi.',
            'jabatan.string' => 'Jabatan harus berupa teks.',
            'agama.required' => 'Agama harus dipilih.',
            'alamat.required' => 'Alamat harus diisi.',
            'alamat.max' => 'Alamat maksimal 100 karakter.',
            'password.required' => 'Password harus diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
            'password.regex' => 'Password harus mengandung setidaknya satu huruf kecil, satu huruf besar, satu angka, dan satu karakter khusus.',
            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.mimes' => 'File gambar harus berformat jpeg, png, jpg, atau gif.',
            'foto.max' => 'Ukuran file gambar maksimal 2MB.',
        ]);

        if ($request->hasFile('foto')) {
            $filename = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('fotodata/', $filename);
            $validateData['foto'] = $filename;
        }

        $validateData['role'] = 'admin';
        $validateData['password'] = Hash::make($validateData['password']);

        $user = User::create($validateData);

        return redirect('dashboard')->with('success', 'Registrasi berhasil, silahkan login.');
    }

    public function insert(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'nisn' => 'required|numeric|min:10',
            'no_telepon' => 'required|numeric|min:12',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tgl_lahir' => 'required|date_format:Y-m-d',
            'tpt_lahir' => 'required|max:100',
            'kelas' => 'required|string',
            'agama' => 'required',
            'alamat' => 'required|max:100',
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'],
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'username.required' => 'Username harus diisi.',
            'username.string' => 'Username harus berupa teks.',
            'username.max' => 'Username maksimal 255 karakter.',
            'username.unique' => 'Username sudah digunakan.',
            'nisn.required' => 'NISN harus diisi.',
            'nisn.numeric' => 'NISN harus berupa angka.',
            'nisn.min' => 'NISN minimal 10 angka.',
            'no_telepon.required' => 'Nomor telepon harus diisi.',
            'no_telepon.numeric' => 'Nomor telepon harus berupa angka.',
            'no_telepon.min' => 'Nomor telepon minimal 12 angka.',
            'jenis_kelamin.required' => 'Jenis kelamin harus dipilih.',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-Laki atau Perempuan.',
            'tgl_lahir.required' => 'Tanggal lahir harus diisi.',
            'tgl_lahir.date_format' => 'Format tanggal lahir harus Y-m-d.',
            'tpt_lahir.required' => 'Tempat lahir harus diisi.',
            'tpt_lahir.max' => 'Tempat lahir maksimal 100 karakter.',
            'kelas.required' => 'Kelas harus diisi.',
            'kelas.string' => 'Kelas harus berupa teks.',
            'agama.required' => 'Agama harus dipilih.',
            'alamat.required' => 'Alamat harus diisi.',
            'alamat.max' => 'Alamat maksimal 100 karakter.',
            'password.required' => 'Password harus diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
            'password.regex' => 'Password harus mengandung setidaknya satu huruf kecil, satu huruf besar, satu angka, dan satu karakter khusus.',
            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.mimes' => 'File gambar harus berformat jpeg, png, jpg, atau gif.',
            'foto.max' => 'Ukuran file gambar maksimal 2MB.',
        ]);

        if ($request->hasFile('foto')) {
            $filename = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('fotodata/', $filename);
            $validateData['foto'] = $filename;
        }

        $validateData['password'] = Hash::make($validateData['password']);

        $user = User::create($validateData);

        return redirect('dashboard')->with('success', 'Registrasi berhasil, silahkan login.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            session(['authenticated' => true]);
            session(['username' => $user->username]);
            session(['id' => $user->id]);
            session(['email' => $user->email]);
            session(['role' => $user->role]);

            return redirect('dashboard');
        } else {
            return redirect('login')->with('error', 'Username atau password salah');
        }
    }

    public function home()
    {
        $users = User::where('id', session('id'))->get();
        return view('pages.dashboard.informasisekolah', compact('users'));
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda telah berhasil keluar. Silakan login kembali untuk mengakses halaman.')
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
    }

    public function editkepsek($id)
    {
        $kepseks = User::find($id);
        return view('pages.DataUser.editkepsek', compact('kepseks'));
    }

    public function updatekepsek(Request $request, $id)
    {
        $validateData = $request->validate([
            'username' => 'string|max:255',
            'nip' => 'numeric|min:18',
            'no_telepon' => 'numeric|min:12',
            'jenis_kelamin' => 'in:Laki-Laki,Perempuan',
            'tgl_lahir' => 'date_format:Y-m-d',
            'tpt_lahir' => 'max:100',
            'jabatan' => 'string',
            'agama' => 'string',
            'alamat' => 'max:100',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'username.string' => 'Username harus berupa teks.',
            'username.max' => 'Username maksimal 255 karakter.',
            'nip.numeric' => 'NIP harus berupa angka.',
            'nip.min' => 'NIP minimal 18 angka.',
            'no_telepon.numeric' => 'Nomor telepon harus berupa angka.',
            'no_telepon.min' => 'Nomor telepon minimal 12 angka.',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-Laki atau Perempuan.',
            'tgl_lahir.date_format' => 'Format tanggal lahir harus Y-m-d.',
            'tpt_lahir.max' => 'Tempat lahir maksimal 100 karakter.',
            'jabatan.string' => 'Jabatan harus berupa teks.',
            'agama.string' => 'Agama harus berupa teks.',
            'alamat.max' => 'Alamat maksimal 100 karakter.',
            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.mimes' => 'File gambar harus berformat jpeg, png, jpg, atau gif.',
            'foto.max' => 'Ukuran file gambar maksimal 2MB.',
        ]);

        $kepseks = User::find($id);
        $kepseks->username = $request->input('username');
        $kepseks->nip = $request->input('nip');
        $kepseks->no_telepon = $request->input('no_telepon');
        $kepseks->jenis_kelamin = $request->input('jenis_kelamin');
        $kepseks->tgl_lahir = $request->input('tgl_lahir');
        $kepseks->tpt_lahir = $request->input('tpt_lahir');
        $kepseks->jabatan = $request->input('jabatan');
        $kepseks->agama = $request->input('agama');
        $kepseks->alamat = $request->input('alamat');
        if (isset($validateData['foto'])) {
            $kepseks->foto = $validateData['foto'];
        }

        $kepseks->save();

        return redirect('kepalasekolah')->with('success', 'Kepala Sekolah Berhasil Diupdate!');
    }

    public function editteachers($id)
    {
        $teachers = User::find($id);
        return view('pages.DataUser.editteacher', compact('teachers'));
    }

    public function updateteachers(Request $request, $id)
    {
        $validateData = $request->validate([
            'username' => 'string|max:255',
            'nip' => 'numeric|min:18',
            'no_telepon' => 'numeric|min:12',
            'jenis_kelamin' => 'in:Laki-Laki,Perempuan',
            'tgl_lahir' => 'date_format:Y-m-d',
            'tpt_lahir' => 'max:100',
            'jabatan' => 'string',
            'agama' => 'string',
            'alamat' => 'max:100',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'username.string' => 'Username harus berupa teks.',
            'username.max' => 'Username maksimal 255 karakter.',
            'nip.numeric' => 'NIP harus berupa angka.',
            'nip.min' => 'NIP minimal 18 angka.',
            'no_telepon.numeric' => 'Nomor telepon harus berupa angka.',
            'no_telepon.min' => 'Nomor telepon minimal 12 angka.',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-Laki atau Perempuan.',
            'tgl_lahir.date_format' => 'Format tanggal lahir harus Y-m-d.',
            'tpt_lahir.max' => 'Tempat lahir maksimal 100 karakter.',
            'jabatan.string' => 'Jabatan harus berupa teks.',
            'agama.string' => 'Agama harus berupa teks.',
            'alamat.max' => 'Alamat maksimal 100 karakter.',
            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.mimes' => 'File gambar harus berformat jpeg, png, jpg, atau gif.',
            'foto.max' => 'Ukuran file gambar maksimal 2MB.',
        ]);

        $teachers = User::find($id);
        $teachers->username = $request->input('username');
        $teachers->nip = $request->input('nip');
        $teachers->no_telepon = $request->input('no_telepon');
        $teachers->jenis_kelamin = $request->input('jenis_kelamin');
        $teachers->tgl_lahir = $request->input('tgl_lahir');
        $teachers->tpt_lahir = $request->input('tpt_lahir');
        $teachers->jabatan = $request->input('jabatan');
        $teachers->agama = $request->input('agama');
        $teachers->alamat = $request->input('alamat');
        if (isset($validateData['foto'])) {
            $teachers->foto = $validateData['foto'];
        }

        $teachers->save();

        return redirect('teacher')->with('success', 'Kepala Sekolah Berhasil Diupdate!');
    }

    public function editstudents($id)
    {
        $students = User::find($id);
        return view('pages.DataUser.editstudent', compact('students'));
    }

    public function updatestudents(Request $request, $id)
    {
        $validateData = $request->validate([
            'username' => 'string|max:255',
            'nisn' => 'numeric|min:10',
            'no_telepon' => 'numeric|min:12',
            'jenis_kelamin' => 'in:Laki-Laki,Perempuan',
            'tgl_lahir' => 'date_format:Y-m-d',
            'tpt_lahir' => 'max:100',
            'kelas' => 'string',
            'agama' => 'string',
            'alamat' => 'max:100',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'username.string' => 'Username harus berupa teks.',
            'username.max' => 'Username maksimal 255 karakter.',
            'nisn.numeric' => 'NISN harus berupa angka.',
            'nisn.min' => 'NISN minimal 10 angka.',
            'no_telepon.numeric' => 'Nomor telepon harus berupa angka.',
            'no_telepon.min' => 'Nomor telepon minimal 12 angka.',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-Laki atau Perempuan.',
            'tgl_lahir.date_format' => 'Format tanggal lahir harus Y-m-d.',
            'tpt_lahir.max' => 'Tempat lahir maksimal 100 karakter.',
            'kelas.string' => 'Kelas harus berupa teks.',
            'agama.string' => 'Agama harus berupa teks.',
            'alamat.max' => 'Alamat maksimal 100 karakter.',
            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.mimes' => 'File gambar harus berformat jpeg, png, jpg, atau gif.',
            'foto.max' => 'Ukuran file gambar maksimal 2MB.',
        ]);

        $students = User::find($id);
        $students->username = $request->input('username');
        $students->nisn = $request->input('nisn');
        $students->no_telepon = $request->input('no_telepon');
        $students->jenis_kelamin = $request->input('jenis_kelamin');
        $students->tgl_lahir = $request->input('tgl_lahir');
        $students->tpt_lahir = $request->input('tpt_lahir');
        $students->kelas = $request->input('kelas');
        $students->agama = $request->input('agama');
        $students->alamat = $request->input('alamat');
        if (isset($validateData['foto'])) {
            $students->foto = $validateData['foto'];
        }

        $students->save();

        return redirect('murid')->with('success', 'Kepala Sekolah Berhasil Diupdate!');
    }

    public function deletekepsek($id)
    {
        $kepsek = User::find($id);
        $kepsek->delete();
        return redirect('kepalasekolah')->with('success', 'Data Berhasil Dihapus!');
    }

    public function deleteteacher($id)
    {
        $teacher = User::find($id);
        $teacher->delete();
        return redirect('teacher')->with('success', 'Data Berhasil Dihapus!');
    }

    public function deletestudent($id)
    {
        $student = User::find($id);
        $student->delete();
        return redirect('murid')->with('success', 'Data Berhasil Dihapus!');
    }
}
