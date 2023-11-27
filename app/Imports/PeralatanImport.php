<?php

namespace App\Imports;

use App\Models\PeralatanAtauMesin;
use App\Models\PeralatanAtauMesinMasuk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;

class PeralatanImport implements ToModel, WithValidation
{
    public function rules(): array
    {
        return [
            '0' => 'required',
        ];
    }

    public function customValidationMessages()
    {
        return [
            '0.required' => 'Pastikan Nama Peralatan Ada di Kolom A Dari Paling Atas',
        ];
    }

    public function model(array $row)
    {
        return new PeralatanAtauMesin([
            'kode_peralatan' => $row[0],
            'nama_peralatan_atau_mesin' => $row[1],
            'kategori_id' => $row[2],
        ]);
    }
}
