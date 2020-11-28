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
        $kriteria2 = Criteria::orderBy('id','asc')->get();
        $count_kriteria = Criteria::count();
        return view('admin.analisa-kriteria.index', compact(['nilai','kriteria','count_kriteria', 'kriteria2']));
    }

    public function check(Request $request) {
        $nilai = Grade::get();
        $kriteria = Criteria::get();
        $kriteria2 = Criteria::get();
        $count_kriteria = Criteria::count();

        $code = 'A-'.date("Y-m-d").rand(100,999);
        for($i=0; $i<$count_kriteria; $i++) {
            for($j=0; $j<$count_kriteria; $j++) {
                // echo $request->k1[$i]."-";
                // echo $request->input('n-'.$j)[$i]."-";
                // echo $request->k2[$j]."-";
                // echo "<br>";
                $data = new AnalisaKriteria;
                $data->id_analisa_kriteria = $code;
                $data->date = date("Y-m-d");
                $data->id_kriteria_1 = $request->k1[$i];
                $data->id_kriteria_2 = $request->k2[$j];
                $data->nilai_analisa_kriteria = $request->input('n-'.$j)[$i];
                $data->hasil_analisa_kriteria = 0;
                $data->save();
            }
        }
        return redirect('admin/analisa-kriteria')->with('success','Data Berhasil Disimpan');
    }

    public function result($id) {
        $kriteria = Criteria::get();
        $kriteria2 = Criteria::get();
        $count_kriteria = Criteria::count();
        $nilai_analisa_kriteria = AnalisaKriteria::where('id_analisa_kriteria',$id)->get();
        foreach($kriteria as $k) {
            $sum[] = AnalisaKriteria::where('id_kriteria_2','=',$k->id)->sum('nilai_analisa_kriteria');
        }
        $i=0;
        foreach($nilai_analisa_kriteria as $n) {
            // $row[] = $n->nilai_analisa_kriteria/$sum[$i++];
            $data=AnalisaKriteria::where('id',$n->id)->update(['analisa_kriterias.hasil_analisa_kriteria'=>($n->nilai_analisa_kriteria/$sum[$i++])]);
            if($i==$count_kriteria) {
                $i=0;
            }
        }
        foreach($kriteria as $k) {
            $sum2[] = AnalisaKriteria::where('id_kriteria_1','=',$k->id)->sum('hasil_analisa_kriteria');
            Criteria::where('id',$k->id)->update(['criterias.total_criteria'=>(AnalisaKriteria::where('id_kriteria_1','=',$k->id)->sum('hasil_analisa_kriteria'))]);
        }
        foreach($kriteria as $k) {
            Criteria::where('id',$k->id)->update(['criterias.weight_criteria'=>($k->total_criteria/$count_kriteria)]);
        }
        return view('admin.analisa-kriteria.result', compact(['kriteria','kriteria2','nilai_analisa_kriteria','count_kriteria','sum']));
    }
}
