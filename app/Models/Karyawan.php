<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';

    protected $fillable = [
        'nik', 'nama', 'no_hp', 'divisi', 'jenis_kelamin',
        'tanggal_lahir', 'email', 'username', 'password',
    ];

    protected $hidden = ['password'];
}