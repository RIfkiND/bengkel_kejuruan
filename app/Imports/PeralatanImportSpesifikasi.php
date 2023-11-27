<?php

namespace App\Imports;

use App\Models\SpesifikasiAlatAtauBahan;
use Maatwebsite\Excel\Concerns\ToModel;

class PeralatanImportSpesifikasi implements ToModel
{
    protected $peralatan;

    public function __construct($peralatan)
    {
        $this->peralatan = $peralatan;
    }
    public function model(array $row)
    {
        $spesifikasi = new SpesifikasiAlatAtauBahan([
            'merk' => $row[5],
            'tipe_atau_model' => $row[6],
            'tahun' => $row[7],
            'kapasitas' => $row[8],
        ]);

        $spesifikasi->peralatan()->associate($this->peralatan);

        return $spesifikasi;
    }
}
