<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Ruangan;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use App\Models\PeralatanAtauMesin;
use App\Models\PengajuanAlatAtauBahan;
use App\Models\PemeliharaanDanPerawatan;

class PDFController extends Controller
{
    public function kartupemakaaianalat()
    {

        $peralatan = PeralatanAtauMesin::find(1);

        $sekolah = Sekolah::find($peralatan->ruangan->sekolah_id);
        $ruangan = Ruangan::find($peralatan->ruangan_id);



        $data = [

            'title' => 'Kartu Peralatan',

            'date' => date('m/d/Y'),

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

            'title' => 'Kartu Pemeliharaan',

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

            'title' => 'Kartu Pengajuan',
            'date' => date('m/d/Y'),

            'pengajuan' => $pengajuan,
            'sekolah' => $sekolah,
            'guru' => $guru,

        ];


        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.pdf.inventarisalatPDF', $data)->setPaper('a4', 'landscape');;



        return $pdf->stream();
    }

    public function kartualat()
    {
        $peralatan = PeralatanAtauMesin::find(1);

        $sekolah = Sekolah::find($peralatan->ruangan->sekolah_id);
        $ruangan = Ruangan::find($peralatan->ruangan_id);



        $data = [

            'title' => 'TEsting PDF',

            'date' => date('m/d/Y'),

            'peralatan' => $peralatan,
            'sekolah' => $sekolah,
            'ruangan' => $ruangan,

        ];


        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.pdf.PeralatanAtauMesinPDF', $data)->setPaper('a4', 'landscape');;



        return $pdf->stream();
    }
}
