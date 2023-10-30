<?php

namespace App\Models;

use App\Models\Ruangan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PeralatanAtauMesin extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriPeralatanAtauMesin::class, 'kategori_id', 'id');
    }

    public function peralatanmasuk()
    {
        return $this->hasOne(PeralatanAtauMesinMasuk::class, 'peralatan_atau_mesin_id', 'id');
    }

    public function spesifikasi()
    {
        return $this->hasOne(SpesifikasiPeralatanAtauMesin::class, 'p_atau_m_id', 'id');
    }

}
