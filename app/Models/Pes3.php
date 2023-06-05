<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Pes3 extends Model
{
        protected $table = "peskelas3";
        protected $primarykey = "id";
        protected $fillable = [
            'judul', 'file', 'deskripsi'];
    
        public function allData()
        {
            return DB::table('peskelas3')->get();
        }
    
        public function detailData($id)
        {
            return DB::table('peskelas3')->where('id', $id)->first();
        }
    
        public function addData($data)
        {
            DB::table('peskelas3')->insert($data);
        }
            
        use HasFactory, Notifiable;
}
