<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'nip',
        'nama',
        'posisi',
        'phone',
        'alamat'
    ];
    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }
}
