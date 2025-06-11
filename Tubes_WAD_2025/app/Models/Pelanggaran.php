<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    use HasFactory;
    protected $table = 'pelanggaran';
    protected $primaryKey = 'pelanggaran_id';

    protected $fillable = ['anggota_id', 'jenis','deskripsi', 'foto', 'waktu'];

    public function anggota()
    {
        return $this->belongsTo(AnggotaAsrama::class, 'anggota_id');
    }
}