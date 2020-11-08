<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\Criteria;

class AnalisaKriteriaController extends Controller {

    public function index() {
        $nilai = Grade::get();
        $kriteria = Criteria::get();
        $kriteria2 = Criteria::get();
        $count_kriteria = Criteria::count();
        return view('admin.analisa-kriteria.index', compact(['nilai','kriteria','count_kriteria', 'kriteria2']));
    }

    public function check(Request $request) {
        $nilai = Grade::get();
        $kriteria = Criteria::get();
        $kriteria2 = Criteria::get();
        $count_kriteria = Criteria::count();

        $code = 'A-'.date("Y-m-d").rand(100,999);
        $k=1;
        for($i=0; $i<$count_kriteria; $i++) {
            for($j=0; $j<$count_kriteria; $j++) {
                echo $request->k1[$i]."-";
                echo $request->input('n-'.$j)[$i]."-";
                echo $request->k2[$j];
                echo "<br>";
                $k++;
            }
        }
    }
}
