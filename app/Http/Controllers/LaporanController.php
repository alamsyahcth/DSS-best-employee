<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\Grade;
use App\Criteria;
use App\AnalisaKriteria;
use App\Employee;
use App\FinalScore;

class LaporanController extends Controller {

    public function laporan_hasil_keputusan() {
        $data = FinalScore::select('date','alternative_code')->groupBy('date', 'alternative_code')->get();
        return view('admin.laporan.laporan-hasil-keputusan', compact(['data']));
    }

    public function laporan_bobot_kriteria() {
        $data = AnalisaKriteria::select('date','id_analisa_kriteria')->groupBy('date', 'id_analisa_kriteria')->get();
        return view('admin.laporan.laporan-bobot-kriteria', compact(['data']));
    }

    public function cetak(Request $request) {
        if($request->id_laporan == 1) {
            $data = DB::table('employees')->join('final_scores','final_scores.employee_id','=','employees.id')
                    ->where('final_scores.alternative_code','=',$request->alternative_code)
                    ->select('employees.id','employees.name',DB::raw('SUM(total_criteria_alternative) as total_sum'))
                    ->groupBy('employees.id')
                    ->orderBy('total_sum','desc')
                    ->get();
            $pdf = PDF::loadView('admin.laporan.cetak-laporan-hasil-keputusan', compact(['data']));
            return $pdf->stream();
        } else if ($request->id_laporan == 2) {
            $data = Criteria::get();
            $pdf = PDF::loadView('admin.laporan.cetak-laporan-bobot-kriteria', compact(['data']));
            return $pdf->stream();
        }
    }
}
