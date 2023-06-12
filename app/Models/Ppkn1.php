<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Ppkn1 extends Model
{
        protected $table = "ppknkelas1";
        protected $primarykey = "id";
        protected $fillable = [
            'judul', 'file', 'deskripsi'];
    
        public function allData()
        {
            return DB::table('ppknkelas1')->get();
        }
    
        public function detailData($id)
        {
            return DB::table('ppknkelas1')->where('id', $id)->first();
        }
    
        public function addData($data)
        {
            DB::table('ppknkelas1')->insert($data);
        }
            
        use HasFactory, Notifiable;
}
