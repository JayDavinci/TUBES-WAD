<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terlambat extends Model
{
    use HasFactory;

    protected $fillable = ['anggota_id', 'waktu_masuk'];

    public function anggota()
    {
        return $this->belongsTo(AnggotaAsrama::class, 'anggota_id');
    }
}
