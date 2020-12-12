<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Grade;
use App\Criteria;
use App\AnalisaKriteria;
use App\Employee;
use App\FinalScore;

class HasilController extends Controller{

    public function index(){
        $data = FinalScore::select('alternative_code')->groupBy('alternative_code')->get();
        return view('admin.hasil.index', compact(['data']));
    }

    public function hasil_result(Request $request) {
        $grade = DB::table('employees')->join('final_scores','final_scores.employee_id','=','employees.id')
                            ->where('alternative_code','=',$request->alternative_code)
                            ->select('employees.id','employees.name',DB::raw('SUM(total_criteria_alternative) as total_sum'))
                            ->groupBy('employees.id')
                            ->orderBy('total_sum','desc')
                            ->get();
        return view('admin.hasil.result', compact(['grade']));
    } 
}
