<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strength_Weakness extends Model
{
    public function calons()
    {
        return $this->belongsTo(Calon::class);
    }
}
