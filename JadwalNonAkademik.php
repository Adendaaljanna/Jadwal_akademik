<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalNonAkademik extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kegiatan', 'tanggal', 'jam', 'lokasi', 'penanggung_jawab', 'keterangan'
    ];
}
