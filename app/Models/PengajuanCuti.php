<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanCuti extends Model
{
    protected $table = 'pengajuan_cuti';

    protected $fillable = [
        'karyawan_id', 'hak_cuti', 'sisa_cuti', 'ambil_cuti',
        'tanggal_mulai', 'tanggal_akhir', 'alasan', 'status',
    ];
}