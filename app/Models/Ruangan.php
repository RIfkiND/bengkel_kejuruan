<?php

namespace App\Models;

use App\Models\PeralatanAtauMesin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ruangan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function peralatanataumesin()
    {
        return $this->hasMany(PeralatanAtauMesin::class);
    }

    public function peralatanataumesinDitempat()
    {
        return $this->hasMany(PeralatanAtauMesin::class)->where('kondisi', 'ditempat');
    }

    public function alat()
    {
        return $this->hasMany(AlatAtauBahan::class, 'ruangan_id', 'id');
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }
}
