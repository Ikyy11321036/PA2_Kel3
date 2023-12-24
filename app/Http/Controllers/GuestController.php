<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuestController extends Controller
{
    public function index()
    {
        $organisasi = Struktur::all();
        $if = Informasi::all();
        return view('pages.guest.dashboard', compact('organisasi', 'if'));
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