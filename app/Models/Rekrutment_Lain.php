<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekrutment_Lain extends Model
{
    protected $guarded = ['id'];
    public function calons()
    {
        return $this->belongsTo(Calon::class);
    }
}
