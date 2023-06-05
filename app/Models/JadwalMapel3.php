<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class JadwalMapel3 extends Model
{
    protected $table = "jadwalmapels3";
    protected $primarykey = "id";
    protected $fillable = [
        'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'waktu'];

    public function allData()
    {
        return DB::table('jadwalmapels3')->get();
    }

    public function detailData($id)
    {
        return DB::table('jadwalmapels3')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('jadwalmapels3')->insert($data);
    }
        
    use HasFactory, Notifiable;
}
