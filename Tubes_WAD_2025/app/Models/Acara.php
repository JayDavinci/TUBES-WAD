<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    protected $table = 'acaras';
    protected $primaryKey = 'acara_id';
    protected $fillable = ['nama_acara', 'penyelenggara','tanggal_acara'];
}