<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlatAtauBahan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function spesifikasi()
    {
        return $this->hasOne(SpesifikasiAlatAtauBahan::class, 'a_atau_b_id', 'id');
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }

    public function alatmasuk()
    {
        return $this->hasMany(AlatAtauBahanMasuk::class, 'alat_atau_bahan_id', 'id');
    }
    public function saldoalat()
    {
        return $this->alatmasuk()->sum('saldo');
    }
    public function alatkeluar()
    {
        return $this->hasMany(AlatAtauBahanKeluar::class, 'alat_atau_bahan_id', 'id');
    }


}
