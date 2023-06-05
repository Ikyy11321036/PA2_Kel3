<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Ppkn5 extends Model
{
        protected $table = "ppknkelas5";
        protected $primarykey = "id";
        protected $fillable = [
            'judul', 'file', 'deskripsi'];
    
        public function allData()
        {
            return DB::table('ppknkelas5')->get();
        }
    
        public function detailData($id)
        {
            return DB::table('ppknkelas5')->where('id', $id)->first();
        }
    
        public function addData($data)
        {
            DB::table('ppknkelas5')->insert($data);
        }
            
        use HasFactory, Notifiable;
}
