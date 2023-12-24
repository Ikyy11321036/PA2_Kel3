<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Silabus extends Model
{
        protected $table = "materi";
        protected $primarykey = "id";
        protected $fillable = [
            'nama_materi', 'file', 'silabus', 'tematik', 'mtk', 'english', 'pes', 'agama', 'kelas'];
    
        public function allData()
        {
            return DB::table('materi')->get();
        }
    
        public function detailData($id)
        {
            return DB::table('materi')->where('id', $id)->first();
        }
    
        public function addData($data)
        {
            DB::table('materi')->insert($data);
        }
            
        use HasFactory, Notifiable;
}
