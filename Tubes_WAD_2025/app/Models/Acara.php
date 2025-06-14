<?php

// Dzaki Muhamad Hilmi
// 102022330134
// SI4709

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    protected $table = 'acaras';
    protected $primaryKey = 'acara_id';
    protected $fillable = ['nama_acara', 'penyelenggara','tanggal_acara'];
}