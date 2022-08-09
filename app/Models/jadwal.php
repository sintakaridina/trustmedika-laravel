<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    use HasFactory;
    protected $fillable = [
        'pegawai_id', 'poli_id', 'hari', 'waktu_mulai', 'waktu_akhir'
    ];
    protected $dates = ['waktu_mulai', 'waktu_akhir'];
    public function pegawai() {
        return $this->belongsTo(Pegawai::class, 'pegawai_id', 'id');
    }
    public function poli() {
        return $this->belongsTo(Poli::class, 'poli_id', 'id');
    }
}
