<?php

namespace App\Imports;

use App\Models\Ruangan;
use App\Models\AlatAtauBahan;
use App\Models\AlatAtauBahanMasuk;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\SpesifikasiAlatAtauBahan;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class AlatAtauBahanImport implements ToModel, WithValidation, WithStartRow
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
            '11' => 'required',
            '12' => 'required',
            '13' => 'required',
        ];
    }
    public function customValidationMessages()
    {
        $messages = [
            '0.required' => 'Pastikan Kode Alat/Bahan Ada di Kolom A Dari Baris Kedua, Tidak Ada Yang Kosong Dan Sheet Di Excel Hanya Satu',
            '1.required' => 'Pastikan Jenis Alat/Bahan Ada di Kolom B Dari Baris Kedua, Tidak Ada Yang Kosong Dan Sheet Di Excel Hanya Satu',
            '2.required' => 'Pastikan Nama Alat/Bahan Ada di Kolom C Dari Baris Kedua, Tidak Ada Yang Kosong Dan Sheet Di Excel Hanya Satu',
            '3.required' => 'Pastikan Jumlah Ada di Kolom D Dari Baris Kedua, Tidak Ada Yang Kosong Dan Sheet Di Excel Hanya Satu',
            '4.required' => 'Pastikan Satuan Ada di Kolom E Dari Baris Kedua, Tidak Ada Yang Kosong Dan Sheet Di Excel Hanya Satu',
            '5.required' => 'Pastikan Harga Ada di Kolom F Dari Baris Kedua, Tidak Ada Yang Kosong Dan Sheet Di Excel Hanya Satu',
            '6.required' => 'Pastikan Merk Ada di Kolom G Dari Baris Kedua, Tidak Ada Yang Kosong Dan Sheet Di Excel Hanya Satu',
            '7.required' => 'Pastikan Tipe/Model Ada di Kolom H Dari Baris Kedua, Tidak Ada Yang Kosong Dan Sheet Di Excel Hanya Satu',
            '8.required' => 'Pastikan Dimensi Ada di Kolom I Dari Baris Kedua, Tidak Ada Yang Kosong Dan Sheet Di Excel Hanya Satu',
            '9.required' => 'Pastikan Tahun A/B Dibuat Ada di Kolom J Dari Baris Kedua, Tidak Ada Yang Kosong Dan Sheet Di Excel Hanya Satu',
            '10.required' => 'Pastikan Ruangan Ada di Kolom K Dari Baris Kedua, Tidak Ada Yang Kosong Dan Sheet Di Excel Hanya Satu',
            '11.required' => 'Pastikan Total Harga Ada di Kolom K Dari Baris Kedua, Tidak Ada Yang Kosong Dan Sheet Di Excel Hanya Satu',
            '12.required' => 'Pastikan Sumber Dana Ada di Kolom K Dari Baris Kedua, Tidak Ada Yang Kosong Dan Sheet Di Excel Hanya Satu',
            '13.required' => 'Pastikan Tanggal Masuk Ada di Kolom K Dari Baris Kedua, Tidak Ada Yang Kosong Dan Sheet Di Excel Hanya Satu',
        ];

        return $messages;
    }
    public function startRow(): int
    {
        return 2;
    }
    public function model(array $row)
    {
        $ruanganid = Ruangan::where('nama_ruangan', $row[10])->first()->id;
        $harga = preg_replace('/[^0-9]/', '', $row[6]);
        $harga_total = preg_replace('/[^0-9]/', '', $row[11]);

        $parsedDateTahun = Date::excelToDateTimeObject($row[9]);
        $parsedDateTanggalMasuk = Date::excelToDateTimeObject($row[13]);

        $peralatan = new AlatAtauBahan([
            'kode_bahan' => $row[0],
            'kode' => $row[1],
            'nama_alat_atau_bahan' => $row[3],
            'volume' => $row[4],
            'satuan' => $row[5],
            'ruangan_id' => $ruanganid,
            'harga' => $harga,
        ]);

        $peralatan->save();

        AlatAtauBahanMasuk::create([
            'tanggal_masuk' => $parsedDateTanggalMasuk,
            'alat_atau_bahan_id' => $peralatan->id,
            'volume' => $row[4],
            'sumber_dana' => $row[12],
            'saldo' => $harga_total,
        ]);

        SpesifikasiAlatAtauBahan::create([
            'merk' => $row[6],
            'tipe_atau_model' => $row[7],
            'tahun' => $parsedDateTahun,
            'dimensi' => $row[8],
            'a_atau_b_id' => $peralatan->id,
        ]);

        return $peralatan;
    }
}
