<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class KaryawanController extends Controller {
    public function index() {
        $data = Employee::orderBy('id','desc')->get();
        return view('admin.karyawan.index', compact(['data']));
    }

    public function store(Request $request) {
        $rules = $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'position' => 'required',
        ]);
        if($rules) {
            $data = New Employee;
            $data->name = $request->name;
            $data->gender = $request->gender;
            $data->position = $request->position;
            if($data->save()) {
                return redirect('admin/karyawan')->with('success','Data Berhasil Disimpan');
            } else {
                return redirect('admin/karyawan')->with('failed', 'Data Gagal Disimpan');
            }
        }
    }

    public function update(Request $request) {
        $rules = $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'position' => 'required',
        ]);
        if($rules) {
            $data = Employee::find($request->id);
            $data->name = $request->name;
            $data->gender = $request->gender;
            $data->position = $request->position;
            if($data->save()) {
                return redirect('admin/karyawan')->with('success','Data Berhasil Diubah');
            } else {
                return redirect('admin/karyawan')->with('failed', 'Data Gagal Diubah');
            }
        }
    }

    public function destroy($id) {
        $data = Employee::find($id);
        if($data->delete()) {
            return redirect('admin/karyawan')->with('success','Data Berhasil Diubah');
        } else {
            return redirect('admin/karyawan')->with('failed', 'Data Gagal Dihapus');
        }
    }
}
