<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    public function pegawais()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
