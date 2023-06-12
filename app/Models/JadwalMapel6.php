<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class JadwalMapel6 extends Model
{
    protected $table = "jadwalmapels6";
    protected $primarykey = "id";
    protected $fillable = [
        'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'waktu'];

    public function allData()
    {
        return DB::table('jadwalmapels6')->get();
    }

    public function detailData($id)
    {
        return DB::table('jadwalmapels6')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('jadwalmapels6')->insert($data);
    }
        
    use HasFactory, Notifiable;
}
