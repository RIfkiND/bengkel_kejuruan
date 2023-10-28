<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\Sekolah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SekolahKelas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }
    
    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
    
}
