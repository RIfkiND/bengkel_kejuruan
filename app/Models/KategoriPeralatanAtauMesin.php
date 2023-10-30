<?php

namespace App\Models;

use App\Models\PeralatanAtauMesin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriPeralatanAtauMesin extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function peralatan()
    {
        return $this->hasMany(PeralatanAtauMesin::class, 'kategori_id', 'id');
    }
}
