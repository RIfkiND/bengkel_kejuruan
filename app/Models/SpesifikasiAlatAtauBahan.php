<?php

namespace App\Models;

use App\Models\AlatAtauBahan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SpesifikasiAlatAtauBahan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // public function alatataubahan()
    // {
    //     return $this->belongsTo(AlatAtauBahan::class);
    // }

}
