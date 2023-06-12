<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Pengumuman extends Model
{
    protected $table = "pengumuman";
    protected $primarykey = "id";
    protected $fillable = [
<<<<<<< HEAD
        'hari_tanggal', 'judul', 'deskripsi', 'file', 'name'];
=======
        'hari_tanggal', 'judul', 'deskripsi'];
>>>>>>> origin/master

    public function allData()
    {
        return DB::table('pengumuman')->get();
    }

    public function detailData($id)
    {
        return DB::table('pengumuman')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('pengumuman')->insert($data);
    }
        
    use HasFactory, Notifiable;
}