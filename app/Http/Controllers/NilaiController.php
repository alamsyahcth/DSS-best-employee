<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;

class NilaiController extends Controller {

    public function index() {
        $data = Grade::orderBy('grade_total','asc')->get();
        return view('admin.nilai.index', compact(['data']));
    }

    public function store(Request $request) {
        $rules = $this->validate($request, [
            'grade_total' => 'required|numeric',
            'description' => 'required',
            'definition' => 'required',
        ]);
        if($rules) {
            $data = New Grade;
            $data->grade_total = $request->grade_total;
            $data->description = $request->description;
            $data->definition = $request->definition;
            if($data->save()) {
                return redirect('admin/nilai')->with('success','Data Berhasil Disimpan');
            } else {
                return redirect('admin/nilai')->with('failed', 'Data Gagal Disimpan');
            }
        }
    }

    public function update(Request $request) {
        $rules = $this->validate($request, [
            'grade_total' => 'required|numeric',
            'description' => 'required',
            'definition' => 'required',
        ]);
        if($rules) {
            $data = Grade::find($request->id);
            $data->grade_total = $request->grade_total;
            $data->description = $request->description;
            $data->definition = $request->definition;
            if($data->save()) {
                return redirect('admin/nilai')->with('success','Data Berhasil Diubah');
            } else {
                return redirect('admin/nilai')->with('failed', 'Data Gagal Diubah');
            }
        }
    }

    public function destroy($id) {
        $data = Grade::find($id);
        if($data->delete()) {
            return redirect('admin/nilai')->with('success','Data Berhasil Diubah');
        } else {
            return redirect('admin/nilai')->with('failed', 'Data Gagal Dihapus');
        }
    }
}
