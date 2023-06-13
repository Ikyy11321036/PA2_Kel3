<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Model implements Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $primarykey = "id";
    protected $fillable = [
        'username',
        'password',
        'foto',
        'alamat',
        'nisn',
        'nip',
        'tpt_lahir',
        'tgl_lahir',
        'no_telepon',
        'jabatan',
        'agama',
        'jenis_kelamin',
        'kelas',
        'role',
    ];

    use HasFactory, Notifiable, AuthenticableTrait;
}
