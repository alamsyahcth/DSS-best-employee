<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Grade;
use App\Criteria;
use App\AnalisaKriteria;
use App\Employee;
use App\FinalScore;

class AnalisaAlternatifController extends Controller {

    public function index() {
        $karyawan = Employee::get();
        $kriteria = Criteria::get();
        $count_karyawan = Employee::count();
        $count_kriteria = Criteria::count();
        return view('admin.analisa-alternatif.index', compact(['karyawan','kriteria','count_karyawan','count_kriteria']));
    }

    public function check(Request $request) {
        $karyawan = Employee::get();
        $kriteria = Criteria::get();
        $count_karyawan = Employee::count();
        $count_kriteria = Criteria::count();
        $code = 'ALT-'.date("Y-m-d").rand(100,999);
        $n=0;
        for($i=0; $i<$count_karyawan; $i++) {
            for($j=0; $j<$count_kriteria; $j++) {
                // echo $request->k[$i].'-';
                // echo $request->kriteria[$j].'-';
                // echo $request->bobot[$j].'-';
                // echo $request->grades[$n].'-';
                // echo $request->grades[$n]*$request->bobot[$j].'<br>';
                $data = new FinalScore;
                $data->alternative_code = $code;
                $data->date = date("Y-m-d");
                $data->employee_id = $request->k[$i];
                $data->criteria_id = $request->kriteria[$j];
                $data->score = $request->grades[$n];
                $data->total_criteria_alternative = $request->grades[$n]*$request->bobot[$j];
                $n++;
                $data->save();
            }
        }
        return redirect('admin/analisa-alternatif/hasil/'.$code)->with('success','Data Berhasil Disimpan');
    }

    public function result($id) {
        $karyawan = Employee::get();
        $kriteria = Criteria::get();
        $grade = FinalScore::where('alternative_code','=',$id)->get();
        $id_result = $id;
        return view('admin.analisa-alternatif.result', compact(['karyawan','kriteria','grade','id_result']));
    }

    public function final_result($id) {
        // $karyawan = Employee::get();
        // foreach($karyawan as $k) {
        //     $grade[] = FinalScore::where('alternative_code','=',$id)
        //                     ->where('employee_id','=',$k->id)
        //                     ->sum('total_criteria_alternative');
        // }

        $grade = DB::table('employees')->join('final_scores','final_scores.employee_id','=','employees.id')
                            ->select('employees.id','employees.name',DB::raw('SUM(total_criteria_alternative) as total_sum'))
                            ->groupBy('employees.id')
                            ->orderBy('total_sum','desc')
                            ->get();
        return view('admin.hasil.result', compact(['grade']));
    }
}
