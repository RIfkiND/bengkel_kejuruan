<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KebutuhanAlatBahanDiklat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function peralatans()
    {
        return $this->belongsTo(PeralatanAtauMesin::class, 'm_atau_p_id');
    }

    public function alat()
    {
        return $this->belongsTo(AlatAtauBahan::class, 'a_atau_b_id');
    }
}
