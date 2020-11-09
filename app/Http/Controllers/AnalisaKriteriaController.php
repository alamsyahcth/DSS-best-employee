<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\Criteria;
use App\AnalisaKriteria;

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
        for($i=0; $i<100; $i++) {
            for($j=0; $j<$count_kriteria; $j++) {
                // echo $request->k1[$i]."-";
                // echo $request->input('n-'.$j)[$i]."-";
                // echo $request->input('k2-'.$j)[$i]."-";
                // echo "<br>";
                $data = new AnalisaKriteria;
                $data->id_analisa_kriteria = $code;
                $data->date = date("Y-m-d");
                $data->id_kriteria_1 = $request->k1[$i];
                $data->id_kriteria_2 = $request->input('k2-'.$j)[$i];
                $data->nilai_analisa_kriteria = $request->input('n-'.$j)[$i];
                $data->hasil_analisa_kriteria = 0;
                $data->save();
            }
            $count_kriteria = $count_kriteria-1;
        }
        return redirect('admin/analisa-kriteria')->with('success','Data Berhasil Disimpan');
    }
}
