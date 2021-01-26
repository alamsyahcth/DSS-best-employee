@extends('adminlte::page')
@section('title','Dashboard')
@section('content_header')
  <h1>Beranda</h1>
  <h6 class="text-secondary">Selamat Datang {{ Auth::user()->name }}</h6>
@stop
@section('content')
<section id="banner">
  <div class="row">
    <div class="col-md-3">
      <div class="small-box pt-2 bg-info">
        <div class="inner">
          <h5>Analisa Kriteria</h5>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{ url('admin/karyawan') }}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-md-3">
      <div class="small-box pt-2 bg-success">
        <div class="inner">
          <h5>Analisa Kriteria</h5>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{ url('admin/analisa-kriteria') }}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-md-3">
      <div class="small-box pt-2 bg-primary">
        <div class="inner">
          <h5>Analisa Alternatif</h5>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{ url('admin/analisa-alternatif') }}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-md-3">
      <div class="small-box pt-2 bg-warning">
        <div class="inner">
          <h5>Hasil Penerimaan</h5>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{ url('admin/hasil') }}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
</section>
@stop
@section('css')
  <style>
    #banner{
      height: 200px !important;
    }
  </style>
@stop
@section('js')
    <script>

    </script>
@stop