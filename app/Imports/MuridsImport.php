<?php

namespace App\Imports;

use App\Models\Murid;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class MuridsImport implements ToModel, WithValidation, WithStartRow
{
    protected $kelas_id;

    public function __construct($kelas_id)
    {
        $this->kelas_id = $kelas_id;
    }

    public function rules(): array
    {
        return [
            '0' => 'required',
        ];
    }

    public function customValidationMessages()
    {
        return [
            '0.required' => 'Pastikan Nama Murid Ada di Kolom A Dari Baris Kedua, Tidak Ada Yang Kosong Dan Sheet Di Excel Hanya Satu',
        ];
    }

    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new Murid([
            'nama_murid' => $row[0],
            'kelas_id' => $this->kelas_id,
        ]);
    }
}

