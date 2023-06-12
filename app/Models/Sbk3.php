<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Sbk3 extends Model
{
        protected $table = "sbkkelas3";
        protected $primarykey = "id";
        protected $fillable = [
            'judul', 'file', 'deskripsi'];
    
        public function allData()
        {
            return DB::table('sbkkelas3')->get();
        }
    
        public function detailData($id)
        {
            return DB::table('sbkkelas3')->where('id', $id)->first();
        }
    
        public function addData($data)
        {
            DB::table('sbkkelas3')->insert($data);
        }
            
        use HasFactory, Notifiable;
}
