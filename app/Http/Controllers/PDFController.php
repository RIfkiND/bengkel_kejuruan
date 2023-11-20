<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Ruangan;
use App\Models\Sekolah;
use App\Models\Pemakaian;
use Illuminate\Http\Request;
use App\Models\PeralatanAtauMesin;
use App\Models\PengajuanAlatAtauBahan;
use App\Models\PemeliharaanDanPerawatan;

class PDFController extends Controller
{
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
    public function kartuperawatanalat()
    {
        $pemeliharaan = PemeliharaanDanPerawatan::find(1);
        $sekolah = Sekolah::find($pemeliharaan->peralatan->ruangan->sekolah_id);
        $ruangan = Ruangan::find($pemeliharaan->peralatan->ruangan_id);



        $data = [

            'title' => 'Kartu Perawatan Alat',

            'date' => date('m/d/Y'),

            'pemeliharaan' => $pemeliharaan,
            'sekolah' => $sekolah,
            'ruangan' => $ruangan,

        ];


        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.pdf.kartuperawatanalatPDF', $data)->setPaper('a4', 'landscape');;



        // return $pdf->download('kartu-peralatan pm-0'. $peralatan->id .'.pdf');
        return $pdf->stream();
    }
    public function inventarisalat()
    {
        $pengajuan = PengajuanAlatAtauBahan::find(1);

        $sekolah = Sekolah::find($pengajuan->sekolah_id);
        $guru = Guru::find($pengajuan->guru_id);



        $data = [

            'title' => 'Daftar Inventaris Alat',
            'date' => date('m/d/Y'),

            'pengajuan' => $pengajuan,
            'sekolah' => $sekolah,
            'guru' => $guru,

        ];


        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.pdf.inventarisalatPDF', $data)->setPaper('a4', 'landscape');;



        return $pdf->stream();
    }
    public function kartupeminjamanalat()
    {
        $peralatan = PeralatanAtauMesin::find(1);

        $sekolah = Sekolah::find($peralatan->ruangan->sekolah_id);
        $ruangan = Ruangan::find($peralatan->ruangan_id);



        $data = [

            'title' => 'Kartu Peminjaman Alat',

            'date' => date('m/d/Y'),

            'peralatan' => $peralatan,
            'sekolah' => $sekolah,
            'ruangan' => $ruangan,

        ];


        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.pdf.kartupeminjamanalatPDF', $data)->setPaper('a4', 'landscape');;



        return $pdf->stream();
    }
    public function bukupemeliharaanalat()
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
        $pdf->loadView('admin.pdf.bukupemeliharaanalatPDF', $data)->setPaper('a4', 'landscape');;



        return $pdf->stream();
    }
    public function kartustok()
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
    public function bukuindukbaranginventaris()
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
        $pdf->loadView('admin.pdf.bukuindukbaranginventarisPDF', $data)->setPaper('a4', 'landscape');;



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
    public function pengeluaranbarang()
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
        $pdf->loadView('admin.pdf.pengeluaranbarangPDF', $data)->setPaper('a4', 'landscape');;



        return $pdf->stream();
    }
    public function daftarruangbarang()
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
