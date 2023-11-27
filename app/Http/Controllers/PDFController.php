<?php

namespace App\Http\Controllers;

use App\Models\AlatAtauBahan;
use App\Models\AlatAtauBahanMasuk;
use App\Models\Guru;
use App\Models\Ruangan;
use App\Models\Sekolah;
use App\Models\Pemakaian;
use Illuminate\Http\Request;
use App\Models\PeralatanAtauMesin;
use App\Models\AlatAtauBahanKeluar;
use App\Models\PengajuanAlatAtauBahan;
use App\Models\PemeliharaanDanPerawatan;
use App\Models\SpesifikasiAlatAtauBahan;

class PDFController extends Controller
{
    public $historyData, $alathistory;
    public function kartupemakaaianalat($id)
    {

        $peralatan = PeralatanAtauMesin::find($id);
        $pemakai = Pemakaian::where('peralatan_atau_mesin_id', $id)->get();
        $sekolah = Sekolah::find($peralatan->ruangan->sekolah_id);
        $ruangan = Ruangan::find($peralatan->ruangan_id);



        $data = [

            'date' => date('m/d/Y'),
            'pemakais' => $pemakai,
            'peralatan' => $peralatan,
            'sekolah' => $sekolah,
            'ruangan' => $ruangan,

        ];


        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.pdf.kartupemakaaianalatPDF', $data)->setPaper('a4', 'landscape');;

        return $pdf->stream();

    }
    public function kartuperawatanalat($id)
    {
        $peralatan = PeralatanAtauMesin::find($id);
        $sekolah = Sekolah::find($peralatan->ruangan->sekolah_id);
        $ruangan = Ruangan::find($peralatan->ruangan_id);
        $pemeliharaans = PemeliharaanDanPerawatan::where('peralatan_atau_mesin_id',$id)->get();


        $data = [

            'title' => 'Kartu Perawatan Alat',

            'date' => date('m/d/Y'),

            'pemeliharaans' => $pemeliharaans,
            'peralatan' => $peralatan,
            'sekolah' => $sekolah,
            'ruangan' => $ruangan,

        ];


        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.pdf.kartuperawatanalatPDF', $data)->setPaper('a4', 'landscape');;



        // return $pdf->download('kartu-peralatan pm-0'. $peralatan->id .'.pdf');
        return $pdf->stream();
    }
    public function inventarisalat($id)
    {
        $ruangan = Ruangan::find($id);
        $peralatans = PeralatanAtauMesin::where('ruangan_id', $id)->get();
        $sekolah = Sekolah::find($ruangan->sekolah_id);




        $data = [

            'title' => 'Daftar Inventaris Alat',
            'date' => date('m/d/Y'),

            'sekolah' => $sekolah,
            'ruangan' => $ruangan,
            'peralatans' => $peralatans,

        ];


        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.pdf.inventarisalatPDF', $data)->setPaper('a4', 'landscape');;



        return $pdf->stream();
    }
    public function kartupeminjamanalat()
    {
        $peralatan = PeralatanAtauMesin::find(1);
        $peminjaman = Pemakaian::find(1);

        $sekolah = Sekolah::find($peralatan->ruangan->sekolah_id);
        $ruangan = Ruangan::find($peralatan->ruangan_id);



        $data = [

            'title' => 'Kartu Peminjaman Alat',

            'date' => date('m/d/Y'),

            'peralatan' => $peralatan,
            'sekolah' => $sekolah,
            'ruangan' => $ruangan,
            'peminjaman' => $peminjaman,

        ];


        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.pdf.kartupeminjamanalatPDF', $data)->setPaper('a3', 'potrait');;



        return $pdf->stream();
    }
    public function bukupemeliharaanalat($id)
    {
        $ruangan = Ruangan::find($id);
        $sekolah = Sekolah::find($ruangan->sekolah_id);
        if ($ruangan) {
            $peralatan = PeralatanAtauMesin::where('ruangan_id', $id)->get();  // Retrieve all equipment in the room

            $pemeliharaans = collect();  // Initialize an empty collection to store maintenance data

            foreach ($peralatan as $peralatanItem) {
                // For each equipment, retrieve maintenance data and add it to the collection
                $maintenanceData = PemeliharaanDanPerawatan::where('peralatan_atau_mesin_id', $peralatanItem->id)->get();
                $pemeliharaans = $pemeliharaans->merge($maintenanceData);
            }

            // Now you have all maintenance data for all equipment in the room in $pemeliharaans
            // You can also get the school data using $sekolah = Sekolah::find($ruangan->sekolah_id);
        } else {
            // Handle the case where the room with the given ID is not found
            // You may want to return an error response or redirect the user
        }


        $data = [

            'title' => 'Buku Pemeliharaan Alat',

            'date' => date('m/d/Y'),

            'pemeliharaans' => $pemeliharaans,
            'sekolah' => $sekolah,
            'peralatan' => $peralatan,
            'ruangan' => $ruangan,

        ];


        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.pdf.bukupemeliharaanalatPDF', $data)->setPaper('a4', 'landscape');;



        return $pdf->stream();
    }
    public function kartustok($id)
    {
    
        $bahans = AlatAtauBahan::where('ruangan_id', $id)->first();

        $spesifikasi = SpesifikasiAlatAtauBahan::where('a_atau_b_id', 'id');

        $sekolah = Sekolah::find($bahans->ruangan->sekolah_id);
        $ruangan = Ruangan::find($bahans->ruangan_id);



        $data = [

            'title' => 'Kartu Alat dan Bahan',

            'date' => date('m/d/Y'),

            'bahans' => $bahans,
            'sekolah' => $sekolah,
            'ruangan' => $ruangan,
            'spesifikasi' => $spesifikasi,

        ];


        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.pdf.kartustokPDF', $data)->setPaper('a4', 'landscape');;



        return $pdf->stream();
    }
    public function kebutuhanalatbahandiklat()
    {
        $peralatan = PeralatanAtauMesin::find(1);

        $sekolah = Sekolah::find($peralatan->ruangan->sekolah_id);
        $ruangan = Ruangan::find($peralatan->ruangan_id);



        $data = [

            'title' => 'Rencana Kebutuhan Alat dan Bahan',

            'date' => date('m/d/Y'),

            'peralatan' => $peralatan,
            'sekolah' => $sekolah,
            'ruangan' => $ruangan,

        ];


        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.pdf.kebutuhanalatbahandiklatPDF', $data)->setPaper('a4', 'landscape');;



        return $pdf->stream();
    }
    public function bukuindukbaranginventaris($id)
    {
        $ruangan = Ruangan::find($id);
        $sekolah = Sekolah::find($ruangan->sekolah_id);
        $bahans = AlatAtauBahan::where('ruangan_id', $id)->get();
        $saldo = AlatAtauBahanMasuk::where('alat_atau_bahan_id', $id)->get();


        $data = [

            'date' => date('m/d/Y'),

            'bahans' => $bahans,
            'sekolah' => $sekolah,
            'ruangan' => $ruangan,
            'saldo' => $saldo,

        ];


        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.pdf.bukuindukbaranginventarisPDF', $data)->setPaper('a3', 'landscape');;



        return $pdf->stream();
    }
    public function tandaterimapengambilanbarang()
    {
        $peralatan = PeralatanAtauMesin::find(1);

        $sekolah = Sekolah::find($peralatan->ruangan->sekolah_id);
        $ruangan = Ruangan::find($peralatan->ruangan_id);



        $data = [

            'title' => 'Buku Pemeliharaan Alat',

            'date' => date('m/d/Y'),

            'peralatan' => $peralatan,
            'sekolah' => $sekolah,
            'ruangan' => $ruangan,

        ];


        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.pdf.tandaterimapengambilanbarangPDF', $data)->setPaper('a4', 'landscape');;



        return $pdf->stream();
    }
    public function pengeluaranbarang($id)
    {
        $ruangan = Ruangan::find($id);
        $sekolah = Sekolah::find($ruangan->sekolah_id);
        $bahans = AlatAtauBahan::where('ruangan_id', $id)->get();
        $alatkeluar = AlatAtauBahanKeluar::where('alat_atau_bahan_id', $id)->get();


        $data = [

            'title' => 'Buku Pemeliharaan Alat',

            'date' => date('Y-m-d'),

            'bahans' => $bahans,
            'alatkeluar' => $alatkeluar,
            'sekolah' => $sekolah,
            'ruangan' => $ruangan,

        ];


        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.pdf.pengeluaranbarangPDF', $data)->setPaper('a4', 'landscape');;



        return $pdf->stream();
    }
    public function daftarruangbarang($id)
    {
        $ruangan = Ruangan::find($id);
        $sekolah = Sekolah::find($ruangan->sekolah_id);
        $peralatans = PeralatanAtauMesin::where('ruangan_id', $id)->get();



        $data = [

            'title' => 'Buku Pemeliharaan Alat',

            'date' => date('m/d/Y'),

            'peralatans' => $peralatans,
            'sekolah' => $sekolah,
            'ruangan' => $ruangan,

        ];


        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.pdf.daftarruangbarangPDF', $data)->setPaper('a4', 'landscape');;



        return $pdf->stream();
    }
    public function laporankerusakan()
    {
        $peralatan = PeralatanAtauMesin::find(1);

        $sekolah = Sekolah::find($peralatan->ruangan->sekolah_id);
        $ruangan = Ruangan::find($peralatan->ruangan_id);



        $data = [

            'title' => 'Buku Pemeliharaan Alat',

            'date' => date('m/d/Y'),

            'peralatan' => $peralatan,
            'sekolah' => $sekolah,
            'ruangan' => $ruangan,

        ];


        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.pdf.laporankerusakanPDF', $data)->setPaper('a4', 'landscape');;



        return $pdf->stream();
    }
    public function serahterimabarang()
    {
        $peralatan = PeralatanAtauMesin::find(1);

        $sekolah = Sekolah::find($peralatan->ruangan->sekolah_id);
        $ruangan = Ruangan::find($peralatan->ruangan_id);



        $data = [

            'title' => 'Buku Pemeliharaan Alat',

            'date' => date('m/d/Y'),

            'peralatan' => $peralatan,
            'sekolah' => $sekolah,
            'ruangan' => $ruangan,

        ];


        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.pdf.serahterimabarangPDF', $data)->setPaper('a4', 'landscape');;



        return $pdf->stream();
    }
}
