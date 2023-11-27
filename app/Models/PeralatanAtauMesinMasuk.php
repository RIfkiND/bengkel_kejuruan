<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeralatanAtauMesinMasuk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function peralatan()
    {
        return $this->belongsTo(PeralatanAtauMesin::class, 'peralatan_atau_mesin_id');
    }
}
