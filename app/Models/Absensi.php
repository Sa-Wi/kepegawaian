<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Absensi extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $with = ['pegawai'];
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id')->withTrashed();
    }
}
