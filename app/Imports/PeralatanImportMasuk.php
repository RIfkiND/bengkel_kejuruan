<?php

namespace App\Imports;

use App\Models\PeralatanAtauMesinMasuk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;

class PeralatanImportMasuk implements ToModel
{
    protected $peralatan;

    public function __construct($peralatan)
    {
        $this->peralatan = $peralatan;
    }

    public function model(array $row)
    {
        $date = date('Y-m-d');

        $peralatanMasuk = new PeralatanAtauMesinMasuk([
            'tanggal_masuk' => $date,
            'sumber_dana' => $row[3],
        ]);

        $peralatanMasuk->peralatan()->associate($this->peralatan);

        return $peralatanMasuk;
    }
}
