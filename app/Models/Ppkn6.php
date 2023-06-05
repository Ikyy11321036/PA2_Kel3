<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Ppkn6 extends Model
{
        protected $table = "ppknkelas6";
        protected $primarykey = "id";
        protected $fillable = [
            'judul', 'file', 'deskripsi'];
    
        public function allData()
        {
            return DB::table('ppknkelas6')->get();
        }
    
        public function detailData($id)
        {
            return DB::table('ppknkelas6')->where('id', $id)->first();
        }
    
        public function addData($data)
        {
            DB::table('ppknkelas6')->insert($data);
        }
            
        use HasFactory, Notifiable;
}
