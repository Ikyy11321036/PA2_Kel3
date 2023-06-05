<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Absensi extends Model
{
    protected $table = "absensi";
    protected $primarykey = "id";
    protected $fillable = [
        'username', 'absensi', 'keterangan', 'kelas'];

    public function allData()
    {
        return DB::table('absensi')->get();
    }

    public function detailData($id)
    {
        return DB::table('absensi')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('absensi')->insert($data);
    }
        
    use HasFactory, Notifiable;
}
