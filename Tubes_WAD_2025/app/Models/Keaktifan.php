<?php

// Dzaki Muhamad Hilmi
// 102022330134
// SI4709

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keaktifan extends Model
{
    protected $table = 'keaktifans';
    protected $primaryKey = 'keaktifans_id';
    protected $fillable = ['acara_id', 'anggota_id','waktu_hadir'];
    
    public function anggota()
    {
        return $this->belongsTo(AnggotaAsrama::class, 'anggota_id');
    }
    
    public function acara()
    {
        return $this->belongsTo(Acara::class, 'acara_id');
    }
}
