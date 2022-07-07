<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calon extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $with = ['bahasas', 'beasiswas', 'keluargas', 'organisasis', 'pendidikans', 'pengalaman__kerjas', 'rekrutment__lains', 'relatives'];

    public function posisi()
    {
        return $this->belongsTo(Posisi::class);
    }

    public function bahasas()
    {
        return $this->hasMany(Bahasa::class);
    }
    public function beasiswas()
    {
        return $this->hasMany(Beasiswa::class);
    }
    public function keluargas()
    {
        return $this->hasMany(Keluarga::class);
    }
    public function organisasis()
    {
        return $this->hasMany(Organisasi::class);
    }
    public function pendidikans()
    {
        return $this->hasMany(Pendidikan::class);
    }
    public function pengalaman__kerjas()
    {
        return $this->hasMany(Pengalaman_Kerja::class);
    }
    public function rekrutment__lains()
    {
        return $this->hasMany(Rekrutment_Lain::class);
    }
    public function relatives()
    {
        return $this->hasMany(Relative::class);
    }
    public function strength__weaknesses()
    {
        return $this->hasMany(Bahasa::class);
    }
}
