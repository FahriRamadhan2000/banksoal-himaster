<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade as PDF;

use App\Report;
use App\Matakuliah;
use App\Mahasiswa;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }


    public function index(){
        $allreport = Report::all();
        return view('admin.report', compact('allreport'));
    }

    public function download()
    {
        $allreport = Report::all();
    	$pdf = PDF::loadview('admin.download_report', compact('allreport'));
        // return $pdf->stream();
        return $pdf->download('laporan_banksoal');
    }

    public function add (Matakuliah $matakuliah, Mahasiswa $mahasiswa) {
        if (auth::user() && auth::user()->nim == $mahasiswa->nim) {
            Report::updateOrCreate(
                ['id_mahasiswa' => $mahasiswa->id, 'id_bank' => $matakuliah->id]
            );
            return redirect()->away('https://'.$matakuliah->url);
        }
        return abort(404);
    }
}
