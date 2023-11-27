<?php

namespace App\Imports;

use App\Models\Ruangan;
use App\Models\PeralatanAtauMesin;
use App\Models\PeralatanAtauMesinMasuk;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\KategoriPeralatanAtauMesin;
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
        $catid = KategoriPeralatanAtauMesin::where('nama_kategori', $row[2])->first()->id;
        $ruanganid = Ruangan::where('nama_ruangan', $row[3])->first()->id;
        $harga = preg_replace('/[^0-9]/', '', $row[4]);

        return new PeralatanAtauMesin([
            'kode_peralatan' => $row[0],
            'nama_peralatan_atau_mesin' => $row[1],
            'kategori_id' => $catid,
            'ruangan_id' => $ruanganid,
            'harga' => $harga,
        ]);
        
    }
}
