<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Ruangan;
use App\Models\PeralatanAtauMesin;
use App\Models\PeralatanAtauMesinMasuk;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use App\Models\KategoriPeralatanAtauMesin;
use App\Models\SpesifikasiPeralatanAtauMesin;
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

        $parsedDateTahun = Date::excelToDateTimeObject($row[7]);
        $parsedDateTanggalMasuk = Date::excelToDateTimeObject($row[10]);

        $peralatan = new PeralatanAtauMesin([
            'kode_peralatan' => $row[0],
            'nama_peralatan_atau_mesin' => $row[1],
            'kategori_id' => $catid,
            'ruangan_id' => $ruanganid,
            'harga' => $harga,
        ]);

        $peralatan->save();

        $date = date('Y-m-d');
        PeralatanAtauMesinMasuk::create([
            'tanggal_masuk' => $parsedDateTanggalMasuk,
            'peralatan_atau_mesin_id' => $peralatan->id,
            'sumber_dana' => $row[9],
        ]);

        SpesifikasiPeralatanAtauMesin::create([
            'merk' => $row[5],
            'tipe_atau_model' => $row[6],
            'tahun' => $parsedDateTahun,
            'kapasitas' => $row[8],
            'p_atau_m_id' => $peralatan->id,
        ]);

        return $peralatan;
    }
}
