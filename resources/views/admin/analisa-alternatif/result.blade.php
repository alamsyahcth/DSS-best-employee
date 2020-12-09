@extends('adminlte::page')
@section('title','Hasil Analisa Alternatif')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@section('content_header')
  <h1>Hasil Analisa Alternatif</h1>
  <h6 class="text-secondary">Hasil Analisa Alternatif Untuk Mendapatkan Nilai Akhir</h6>
@stop
@section('content')
<section class="mb-5">
  @include('admin/alert')
  <div class="card">
    <div class="card-header">
      <h6 class="mb-0 font-weight-bold">A. Nilai Alternatif</h6>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-hover">
        <tr>
          <td class="text-right text-secondary bg-secondary font-weight-bold pt-4" rowspan="2">Prioritas Kriteria</td>
          @foreach($kriteria as $k)
            <td class="text-center font-weight-bold">{{$k->name}}</td>
          @endforeach
        </tr>
        <tr>
          @foreach($kriteria as $k)
            <td class="text-center font-weight-bold bg-soft-warning">{{ number_format((float)$k->weight_criteria, 3, '.', '') }}</td>
          @endforeach
        </tr>
        @foreach($karyawan as $karyawans)
          <tr>
            <td class="text-right font-weight-bold">{{$karyawans->name}}</td>
            @foreach($grade as $g)
              @if($karyawans->id == $g->employee_id)
                <td class="text-center">{{$g->score}}</td>
              @endif
            @endforeach
          </tr>
        @endforeach
      </table>
    </div>
    <div class="card-footer">
      <form class="form-horizontal" method="post" action="">
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <h6 class="mb-0 font-weight-bold">B. Perhitungan Nilai Alternatif</h6>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-hover">
        <tr>
          <td class="text-right text-secondary bg-secondary font-weight-bold">Prioritas Kriteria</td>
          @foreach($kriteria as $k)
            <td class="text-center font-weight-bold">{{$k->name}}</td>
          @endforeach
        </tr>
        @foreach($karyawan as $karyawans)
          <tr>
            <td class="text-right font-weight-bold">{{$karyawans->name}}</td>
            @foreach($grade as $g)
              @if($karyawans->id == $g->employee_id)
                <td class="text-center">{{ number_format((float)$g->total_criteria_alternative, 3, '.', '') }}</td>
              @endif
            @endforeach
          </tr>
        @endforeach
      </table>
    </div>
    <div class="card-footer text-right">
      <a href="{{ url('admin/hasil/'.$id_result) }}" class="btn btn-md btn-primary btn-block"><i class="fas fa-calculator"></i> Hitung Nilai Akhir</a>
    </div>
  </div>

</section>
@stop

@section('css')
  @include('admin/all-css')
@stop
@section('js')
  @include('admin/all-js')
  <script>
    
  </script>
@stop