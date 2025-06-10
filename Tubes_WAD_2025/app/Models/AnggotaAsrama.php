<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaAsrama extends Model
{
    use HasFactory;

    protected $table = 'anggota_asramas';

    protected $fillable = ['nama', 'nim'];
    protected $primaryKey = 'anggota_id';
    public function pelanggaran()
    {
        return $this->hasMany(Pelanggaran::class, 'anggota_id');
    }

    public function terlambat()
    {
        return $this->hasMany(Terlambat::class, 'anggota_id');
    }
}
