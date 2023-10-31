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
    public function peralatankeluar()
    {
        return $this->hasOne(PeralatanAtauMesinKeluar::class, 'peralatan_atau_mesin_id', 'id');
    }
    public function spesifikasi()
    {
        return $this->hasOne(SpesifikasiPeralatanAtauMesin::class, 'p_atau_m_id', 'id');
    }

    public function pemeliharaan()
    {
        return $this->hasMany(PemeliharaanDanPerawatan::class, 'peralatan_atau_mesin_id', 'id');
    }

    public function pemakaian()
    {
        //hasMany pemakaian::calass where status pengajuan == di setujui
        return $this->hasMany(Pemakaian::class,'peralatan_atau_mesin_id', 'id');
    }

}
