<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Nilai4 extends Model
{
    protected $table = "nilaisiswas4";
    protected $primarykey = "id";
    protected $fillable = [
        'namasiswa', 'tugas', 'ujian', 'average', 'uts', 'uas', 'nilairaport', 'grade'
    ];

    public function allData()
    {
        return DB::table('nilaisiswas4')->get();
    }

    public function detailData($id)
    {
        return DB::table('nilaisiswas4')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('nilaisiswas4')->insert($data);
    }

    public function getGradeAttribute()
    {
        $nilairaport = $this->attributes['nilairaport'];
        if ($nilairaport >= 90) {
            return 'A';
        } elseif ($nilairaport >= 80) {
            return 'B';
        } elseif ($nilairaport >= 70) {
            return 'C';
        } elseif ($nilairaport >= 60) {
            return 'D';
        } else {
            return 'E';
        }
    }

    use HasFactory, Notifiable;
}
