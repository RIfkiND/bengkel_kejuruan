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
    public function kartuperalatan($id)
    {

        $peralatan = PeralatanAtauMesin::find($id);

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
        $pdf->loadView('admin.PeralatanAtauMesinPDF', $data)->setPaper('a5', 'landscape');;

        return $pdf->download('kartu-peralatan pm-0'. $peralatan->id .'.pdf');

    }

    public function kartupemeliharaan($id)
    {
        $pemeliharaan = PemeliharaanDanPerawatan::find($id);
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
        $pdf->loadView('admin.PemeliharaanPDF', $data)->setPaper('a5', 'landscape');;



        // return $pdf->download('kartu-peralatan pm-0'. $peralatan->id .'.pdf');
        return $pdf->stream();
    }

    public function kartupengajuan($id)
    {
        $pengajuan = PengajuanAlatAtauBahan::find($id);

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
        $pdf->loadView('admin.PengajuanPDF', $data)->setPaper('a5', 'landscape');;



        return $pdf->download('kartu-pengajuan-'. $pengajuan->nama_alat_atau_bahan .'.pdf');
    }

    public function kartualat($id)
    {
        $peralatan = PeralatanAtauMesin::find($id);

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
        $pdf->loadView('admin.PeralatanAtauMesinPDF', $data)->setPaper('a5', 'landscape');;



        return $pdf->download('kartu-peralatan pm-0'. $peralatan->id .'.pdf');
    }
}
