<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class MataPelajaran extends Model
{
    protected $table = "mata_pelajaran";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama_matapelajaran', 'tingkat_kelas', 'deskripsi', 'durasi'];

    public function allData()
    {
        return DB::table('mata_pelajaran')->get();
    }

    public function detailData($id)
    {
        return DB::table('mata_pelajaran')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('mata_pelajaran')->insert($data);
    }
        
    use HasFactory, Notifiable;
}
