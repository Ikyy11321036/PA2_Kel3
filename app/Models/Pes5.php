<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Pes5 extends Model
{
        protected $table = "peskelas5";
        protected $primarykey = "id";
        protected $fillable = [
            'judul', 'file', 'deskripsi'];
    
        public function allData()
        {
            return DB::table('peskelas5')->get();
        }
    
        public function detailData($id)
        {
            return DB::table('peskelas5')->where('id', $id)->first();
        }
    
        public function addData($data)
        {
            DB::table('peskelas5')->insert($data);
        }
            
        use HasFactory, Notifiable;
}
