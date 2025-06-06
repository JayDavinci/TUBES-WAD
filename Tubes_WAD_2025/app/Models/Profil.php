<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $table = 'anggota_asramas';
    protected $primaryKey = 'anggota_id';
    protected $fillable = [
        'nama', 'nim', 'fakultas', 'prodi', 'jenis_kelamin', 'foto'
    ];
}