<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Nilai extends Model
{
    protected $table = "nilai";
    protected $primarykey = "id";
    protected $fillable = [
        'jumlah_nilai', 'id_user'
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
