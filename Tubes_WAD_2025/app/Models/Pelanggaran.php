<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    use HasFactory;

    protected $fillable = ['anggota_id', 'jenis', 'foto', 'waktu'];

    public function anggota()
    {
        return $this->belongsTo(AnggotaAsrama::class, 'anggota_id');
    }
}
