<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class poli extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_poli'
    ];
    // public function jadwal() {
    //     return $this->hasMany(Jadwal::class, "poli_id", "id");
    // }
}
