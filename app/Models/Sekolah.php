<?php

namespace App\Models;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Ruangan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sekolah extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function guru()
    {
        return $this->hasMany(Guru::class);
    }

    public function ruangan()
    {
        return $this->hasMany(Ruangan::class);
    }

    public function user()
    {
        return $this->hasMany(User::class, 'sekolah_id', 'id');
    }

    public function getTotalMuridCountAttribute()
    {
        return $this->kelas->sum(function ($kelas) {
            return $kelas->murid->count();
        });
    }

    public function getTotalPeralatanCountAttribute()
    {
        return $this->ruangan->sum(function ($ruangan) {
            return $ruangan->peralatanataumesin->count();
        });
    }
}
