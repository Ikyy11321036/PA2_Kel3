<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('auth.changepassword');
    }

    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail(__('Kata Sandi yang Lama Tidak Cocok.'));
                }
            }],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'],
        ], [
            'current_password.required' => 'Kata Sandi Harus Sesuai Dengan Kata Sandi yang Lama',
            'password.required' => 'Kata Sandi yang Baru Harap Diisi',
            'password.string' => 'Kata Sandi Harus Berupa Huruf',
            'password.min' => 'Kata Sandi Minimal 8 huruf',
            'password.regex' => 'Password harus terdiri dari setidaknya 8 karakter dengan kombinasi minimal satu karakter huruf kecil, satu karakter huruf besar, satu angka, dan satu karakter simbol (@$!%*?&)',
        ]);

        Auth::user()->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('dashboard')->with('Password Berhasil Diubah');
    }
}
