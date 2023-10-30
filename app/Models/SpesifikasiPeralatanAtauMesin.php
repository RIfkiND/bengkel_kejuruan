<?php

namespace App\Models;

use App\Models\PeralatanAtauMesin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SpesifikasiPeralatanAtauMesin extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function peralatanataumesin()
    {
        return $this->hasOne(PeralatanAtauMesin::class, 'id', 'p_atau_m_id');
    }
}
