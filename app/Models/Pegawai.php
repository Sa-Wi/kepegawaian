<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }
    public function posisi()
    {
        return $this->belongsTo(Posisi::class)->withTrashed();
    }
}
