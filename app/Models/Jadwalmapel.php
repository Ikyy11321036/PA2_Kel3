<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Jadwalmapel extends Model
{
    protected $table = "jadwal";
    protected $primarykey = "id";
    protected $fillable = [
        'hari', 'waktu_pelajaran', 'matapelajaran',
        'kelas_1', 'kelas_2', 'kelas_3', 'kelas_4', 'kelas_5', 'kelas_6',
    ];

    public function allData()
    {
        return DB::table('jadwal')->get();
    }

    public function detailData($id)
    {
        return DB::table('jadwal')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('jadwal')->insert($data);
    }
        
    use HasFactory, Notifiable;
}
