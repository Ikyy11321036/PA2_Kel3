<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Informasi extends Model
{
    protected $table = "informasi";
    protected $primarykey = "id";
    protected $fillable = ['latar_belakang', 'judul'];

    public function allData()
    {
        return DB::table('informasi')->get();
    }

    public function detailData($id)
    {
        return DB::table('informasi')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('informasi')->insert($data);
    }
        
    use HasFactory, Notifiable;
}
