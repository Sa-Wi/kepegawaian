<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posisi extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $guarded = ['id'];
    public function pegawais()
    {
        return $this->hasMany(Pegawai::class);
    }
    public function calons()
    {
        return $this->hasMany(Calon::class);
    }
}
