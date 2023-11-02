<?php

namespace App\Models;

use App\Models\Guru;
use App\Models\Murid;
use App\Models\PeralatanAtauMesin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemakaian extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function peralatan()
    {
        return $this->belongsTo(PeralatanAtauMesin::class, 'peralatan_atau_mesin_id', 'id');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
