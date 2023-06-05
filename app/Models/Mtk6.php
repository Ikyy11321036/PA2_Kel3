<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Mtk6 extends Model
{
        protected $table = "mtkkelas6";
        protected $primarykey = "id";
        protected $fillable = [
            'judul', 'file', 'deskripsi'];
    
        public function allData()
        {
            return DB::table('mtkkelas6')->get();
        }
    
        public function detailData($id)
        {
            return DB::table('mtkkelas6')->where('id', $id)->first();
        }
    
        public function addData($data)
        {
            DB::table('mtkkelas6')->insert($data);
        }
            
        use HasFactory, Notifiable;
}
