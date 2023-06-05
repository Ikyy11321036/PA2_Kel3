<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Raport extends Model
{
    protected $table = "nilai";
    protected $primarykey = "id";
    protected $fillable = [
        'tingkat_kelas', 'tugas', 'ujian', 'kkm', 'uts', 'uas', 'jumlah_nilai', 'username', 'grade', 'kelas',
        'kelas_1', 'kelas_2', 'kelas_3', 'kelas_4', 'kelas_5', 'kelas_6',
    ];

    public function allData()
    {
        return DB::table('nilai')->get();
    }

    public function detailData($id)
    {
        return DB::table('nilai')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('nilai')->insert($data);
    }

    public function getGradeAttribute()
    {
        $jumlah_nilai = $this->attributes['jumlah_nilai'];
        if ($jumlah_nilai >= 90) {
            return 'A';
        } elseif ($jumlah_nilai >= 80) {
            return 'B';
        } elseif ($jumlah_nilai >= 70) {
            return 'C';
        } elseif ($jumlah_nilai >= 60) {
            return 'D';
        } else {
            return 'E';
        }
    }

    use HasFactory, Notifiable;
}
