<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuestController extends Controller
{
    public function index()
    {
        $organisasi = Struktur::all();
        return view('pages.guest.dashboard', compact('organisasi'));
    }

    public function blocked()
    {
        return view('pages.guest.block');
    }

    public function create()
    {
        return view('pages.guest.tambah');
    }
}