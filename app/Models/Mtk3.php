<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Mtk3 extends Model
{
        protected $table = "mtkkelas3";
        protected $primarykey = "id";
        protected $fillable = [
            'judul', 'file', 'deskripsi'];
    
        public function allData()
        {
            return DB::table('mtkkelas3')->get();
        }
    
        public function detailData($id)
        {
            return DB::table('mtkkelas3')->where('id', $id)->first();
        }
    
        public function addData($data)
        {
            DB::table('mtkkelas3')->insert($data);
        }
            
        use HasFactory, Notifiable;
}
