<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Siswa extends Model
{
    protected $table = "siswas";
    protected $primarykey = "id";
    protected $fillable = [
        'name', 'jeniskelamin', 'telpon', 'kelas', 'alamat', 'foto'];

    public function allData()
    {
        return DB::table('siswas')->get();
    }

    public function detailData($id)
    {
        return DB::table('siswas')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('siswas')->insert($data);
    }
        
    use HasFactory, Notifiable;
}