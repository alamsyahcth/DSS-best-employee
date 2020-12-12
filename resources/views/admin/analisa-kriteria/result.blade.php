@extends('adminlte::page')
@section('title','Hasil Analisa Kriteria')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@section('content_header')
  <h1>Hasil Analisa Kriteria</h1>
  <h6 class="text-secondary">Hasil Analisa Kriteria Untuk Bobot Kriteria</h6>
@stop
@section('content')
<section class="mb-5">
  @include('admin/alert')
  <div class="card">
    <div class="card-header">
      <h6 class="mb-0 font-weight-bold">A. Matriks Permandingan Antar Kriteria</h6>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-hover">
        <tr>
          <td class="text-right text-secondary bg-secondary font-weight-bold">Antar Kriteria</td>
          @foreach($kriteria as $k)
            <td class="text-center font-weight-bold">{{$k->name}}</td>
          @endforeach
        </tr>
        @foreach($kriteria2 as $k2)
          <tr>
            <td class="text-right font-weight-bold">{{$k2->name}}</td>
            @foreach($nilai_analisa_kriteria as $n)
              @if($k2->id == $n->id_kriteria_1)
                <td class="text-center">{{$n->nilai_analisa_kriteria}}</td>
              @endif
            @endforeach
          </tr>
        @endforeach
        <tr>
          <td class="text-right font-weight-bold bg-warning">Jumlah</td>
          @foreach($sum as $data_sum)
            <td class="text-center font-weight-bold bg-soft-warning">
              {{ $data_sum }}
            </td>
          @endforeach
        </tr>
      </table>
    </div>
    <div class="card-footer">
      <form class="form-horizontal" method="post" action="">
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <h6 class="mb-0 font-weight-bold">B. Tabel Normalisasi</h6>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-hover">
        <tr>
          <td class="text-right text-secondary bg-secondary font-weight-bold">Antar Kriteria</td>
          @foreach($kriteria as $k)
            <td class="text-center font-weight-bold">{{$k->name}}</td>
          @endforeach
          <td class="text-center font-weight-bold bg-warning">Jumlah</td>
          <td class="text-center font-weight-bold bg-warning">Bobot Prioritas</td>
        </tr>
        @foreach($kriteria2 as $k2)
          <tr>
            <td class="text-right font-weight-bold">{{$k2->name}}</td>
            @foreach($nilai_analisa_kriteria as $n)
              @if($k2->id == $n->id_kriteria_1)
                <td class="text-center">{{ number_format((float)$n->hasil_analisa_kriteria, 3, '.', '') }}</td>
              @endif
            @endforeach
            <td class="text-center font-weight-bold bg-soft-warning">{{ number_format((float)$k2->total_criteria, 3, '.', '') }}</td>
            <td class="text-center font-weight-bold bg-soft-warning">{{ number_format((float)$k2->weight_criteria, 3, '.', '') }}</td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <h6 class="mb-0 font-weight-bold">C. Perhitungan RAsio</h6>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-hover">
        <tr>
          <td class="font-weight-bold text-center">Kriteria</td>
          <td class="font-weight-bold text-center">Jumlah</td>
          <td class="font-weight-bold text-center">Prioritas</td>
        </tr>
        @foreach($kriteria as $k)
          <tr>
            <td class="text-center">{{ $k->name }}</td>
            <td class="text-center">{{ $k->total_add_criteria }}</td>
            <td class="text-center">{{ number_format((float)$k->weight_criteria, 3, '.', '') }}</td>
          </tr>
        @endforeach
        <tr>
          <td class="bg-warning font-weight-bold text-center">Jumlah Maks</td>
          <td class="bg-soft-warning text-center" colspan="2">{{ number_format((float)$dataSumMax, 3, '.', '') }}</td>
        </tr>
        <tr>
          <td class="bg-warning font-weight-bold text-center">Index Konsistensi (CI)</td>
          <td class="bg-soft-warning text-center" colspan="2">{{ number_format((float)$ci, 3, '.', '') }}</td>
        </tr>
        <tr>
          <td class="bg-warning font-weight-bold text-center">Rasio Konsistensi (CR)</td>
          <td class="bg-soft-warning text-center" colspan="2">{{ number_format((float)$cr, 3, '.', '') }}</td>
        </tr>
      </table>
    </div>
    <div class="card-footer text-right">
      <a href="{{ url('/admin/analisa-alternatif') }}" class="btn btn-md btn-primary btn-block"><i class="fas fa-calculator"></i> Beri Nilai Alternatif</a>
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