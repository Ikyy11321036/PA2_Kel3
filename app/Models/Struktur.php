<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Struktur extends Model
{
    protected $table = "struktur";
    protected $primarykey = "id";
    protected $fillable = ['gambar'];

    public function allData()
    {
        return DB::table('struktur')->get();
    }

    public function detailData($id)
    {
        return DB::table('struktur')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('struktur')->insert($data);
    }
        
    use HasFactory, Notifiable;
}
