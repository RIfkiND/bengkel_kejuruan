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
            '1' => 'required',
            '2' => 'required',
            '3' => 'required',
            '4' => 'required',
            '5' => 'required',
            '6' => 'required',
            '7' => 'required',
            '8' => 'required',
            '9' => 'required',
            '10' => 'required',
        ];
    }

    public function customValidationMessages()
    {
        return [
            '0.required' => 'Pastikan Kode Peralatan Ada di Kolom A Dari Paling Atas',
            '1.required' => 'Pastikan Nama Peralatan Ada di Kolom B Dari Paling Atas',
            '2.required' => 'Pastikan Nama Kategori Ada di Kolom C Dari Paling Atas',
            '3.required' => 'Pastikan Nama Ruangan Ada di Kolom D Dari Paling Atas',
            '4.required' => 'Pastikan Harga Ada di Kolom E Dari Paling Atas',
            '5.required' => 'Pastikan Merk Ada di Kolom F Dari Paling Atas',
            '6.required' => 'Pastikan Type/Model Ada di Kolom G Dari Paling Atas',
            '7.required' => 'Pastikan Tahun Dibuat Ada di Kolom H Dari Paling Atas',
            '8.required' => 'Pastikan Kapasitas Ada di Kolom I Dari Paling Atas',
            '9.required' => 'Pastikan Sumber Dana Ada di Kolom J Dari Paling Atas',
            '10.required' => 'Pastikan Tanggal Masuk Ada di Kolom K Dari Paling Atas',
        ];
    }

    public function model(array $row)
    {
        $catid = KategoriPeralatanAtauMesin::where('nama_kategori', $row[2])->where('sekolah_id', auth()->user()->sekolah_id)->first()->id;
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
