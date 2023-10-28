<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kelas()
    {
        return $this->belongsTo(KelasMurid::class);
    }

    // public function sekolah()
    // {
    //     return $this->belongsTo(Sekolah::class);
    // }

}
