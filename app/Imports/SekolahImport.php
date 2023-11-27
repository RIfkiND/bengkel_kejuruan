<?php

namespace App\Imports;

use App\Models\Sekolah;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;

class SekolahImport implements ToModel, WithValidation
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
            '0.required' => 'Pastikan Nama Sekolah Ada di Kolom A Dari Paling Atas',
        ];
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Sekolah([
            'nama_sekolah' => $row[0],
        ]);
    }
}
