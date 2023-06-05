<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Sbk2 extends Model
{
        protected $table = "sbkkelas2";
        protected $primarykey = "id";
        protected $fillable = [
            'judul', 'file', 'deskripsi'];
    
        public function allData()
        {
            return DB::table('sbkkelas2')->get();
        }
    
        public function detailData($id)
        {
            return DB::table('sbkkelas2')->where('id', $id)->first();
        }
    
        public function addData($data)
        {
            DB::table('sbkkelas2')->insert($data);
        }
            
        use HasFactory, Notifiable;
}
