<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Criteria;

class KriteriaController extends Controller {
    public function index() {
        $data = Criteria::orderBy('id','asc')->get();
        return view('admin.kriteria.index', compact(['data']));
    }

    public function store(Request $request) {
        $rules = $this->validate($request, [
            'name' => 'required',
        ]);
        if($rules) {
            $data = New Criteria;
            $data->criteria_code = 'K'.rand(10,99);;
            $data->name = $request->name;
            $data->total_criteria = 0;
            $data->weight_criteria = 0;
            if($data->save()) {
                return redirect('admin/kriteria')->with('success','Data Berhasil Disimpan');
            } else {
                return redirect('admin/kriteria')->with('failed', 'Data Gagal Disimpan');
            }
        }
    }

    public function update(Request $request) {
        $rules = $this->validate($request, [
            'name' => 'required',
        ]);
        if($rules) {
            $data = Criteria::where('id',$request->id)->update([
                'name' => $request->name,
            ]);
            if($data) {
                return redirect('admin/kriteria')->with('success','Data Berhasil Diubah');
            } else {
                return redirect('admin/kriteria')->with('failed', 'Data Gagal Diubah');
            }
        }
    }

    public function destroy($id) {
        $data = Criteria::find($id);
        if($data->delete()) {
            return redirect('admin/kriteria')->with('success','Data Berhasil Diubah');
        } else {
            return redirect('admin/kriteria')->with('failed', 'Data Gagal Dihapus');
        }
    }
}
